<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Absence ;
    use App\User ;
 use DB;
 use Session;

class AbsencesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

 
 $user = auth()->user();
 $iduser=$user->id;
$user_type=$user->user_type;
$isparent=$user->isparent;

	if($user_type=='parent' || (Session::get('parent')=='true')){
		
		 $ideleves= DB::table('parents_eleve')->where('parent',  $iduser)->pluck('eleve');
                           
		        $absences = Absence::orderBy('id', 'desc')->whereIn('eleve', $ideleves)->get();

	}else{
        $absences = Absence::orderBy('id', 'desc')->get();

	}

        return view('absences.index',[ ], compact('absences'));
    }

     public function annee($annee)
    { 

 
 $user = auth()->user();
 $iduser=$user->id;
$user_type=$user->user_type;
$isparent=$user->isparent;

	if($user_type=='parent' ||  (Session::get('parent')=='true')){
		
		 $ideleves= DB::table('parents_eleve')->where('parent',  $iduser)->pluck('eleve');
                           
		        $absences = Absence::orderBy('id', 'desc')->whereIn('eleve', $ideleves)->where('annee',$annee)->get();

	}else{
        $absences = Absence::orderBy('id', 'desc')->where('annee',$annee)->get();

	}

        return view('absences.annee',[ 'annee'=>$annee], compact('absences'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('absences.create'  );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$vis=$request->get('email');
		$eleve=intval($request->get('eleve'));
		$classe = trim($request->get('classe'));
		$seance = trim($request->get('seance'));
		$details = trim($request->get('details'));
        $debut = trim($request->get('debut'));
        $fin = trim($request->get('fin'));
        $heure_debut = trim($request->get('heure_debut'));
        $heure_fin = trim($request->get('heure_fin'));
        $annee = trim($request->get('annee'));
 		$leleve=DB::table('users')->where('id',$eleve)->first();
 		$nomeleve=$leleve->name .' '.$leleve->lastname;
		if($vis=="on" || $vis==1 ){
			$email=1;
		}else{
			$email=0;			
		}
		
		if($email==1){
			// Envoi Email aux parents
			// get liste parents
			 $idsparents = DB::table('parents_eleve')->where('eleve','=',$eleve)->pluck('parent');
         
               $parents = DB::table('users')
               ->whereIn('id', $idsparents)
               ->get() ;
			   $countP=count($parents);
			if($countP>0)
			{	
			foreach($parents as $parent)
			{  
				$to=trim($parent->email);
				$type='notif absence';
				//$nomp=$parent->name. ' '.$parent->lastname ;
				$sujet="Notification - Absence de l'éleve ".$nomeleve." ";
				$contenu="Bonjour,<br>
				Nous vous informons que votre enfant ".$nomeleve." a été absent à l'école.<br>
				De: ".$debut." ".$heure_debut." A: ".$fin." ".$heure_fin."<br>
				Séance(s): ".$seance."<br>
				".$details."<br><br>
				
				Pour toutes informations supplémentaires, veillez contacter l'administration de l'école.<br><br>
				
				Cordialement.<br><br>
				
				AL MANAHEL Academy.
				" ;
				
				$data=array('destinataire'=>$to,'sujet'=>$sujet,'contenu'=>$contenu,'type'=>$type);
				$request = new Request($data);

				//\App\Http\Controllers\EnvoyesController::sendnotif($request);
				 app('\App\Http\Controllers\EnvoyesController')->sendnotif($request);
				
			}
			
			}// count
		}
                 
				 
        $absences = new Absence([
              'eleve' => $eleve,
             'classe' => $classe ,
             'seance' => $seance ,
             'details' => $details ,
             'debut' => $debut ,
             'fin' => $fin ,
             'heure_debut' => $heure_debut ,
             'heure_fin' => $heure_fin ,
             'annee' => $annee 
             
        ]);

        $absences->save();
         $count=Absence::where('eleve', $eleve)
    ->where('annee',$annee)
    ->count();
    
     User::where('id', $eleve)->update(array('absences' => $count));
        return redirect('/absences')->with('success', ' ajouté avec succès');

    }


    public function saving(Request $request)
    {
        if( ($request->get('titre'))!=null) {

            $absence = new Absence([
                'titre' => $request->get('titre')

            ]);
            if ($absence->save())
            { $id=$absence->id;

                return url('/absences/view/'.$id)/*->with('success', 'Dossier Créé avec succès')*/;
            }

            else {
                return url('/absences');
            }
        }

    }

    public function updating(Request $request)
    {

        $id= $request->get('absence');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
       Absence::where('id', $id)->update(array('visible' => $val));

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
  
        $absence = Absence::find($id);
        return view('absences.view' , ['absence'=>$absence]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
 
		$id=$request->get('id');
		 
        $absence  = Absence::find($id);
		
 
		 Absence::where('id',$id)->update(
		array(
		//	'eleve' =>trim( $request->get('eleve')),
         //    'classe' => trim($request->get('classe')),
             'details' => trim($request->get('details')),
             'seance' => trim($request->get('seance')),
             'debut' => trim($request->get('debut')),
             'heure_debut' => trim($request->get('heure_debut')),
             'fin' => trim($request->get('fin')),
             'heure_fin' => trim($request->get('heure_fin')),
		)
		);	
			
		 
		
        return redirect('/absences/view/'.$id)->with('success', ' Modifié avec succès');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absences = Absence::find($id);
        $eleve=$absences['eleve'];
        $absences->delete();
 $year=date('Y');$month=date('m');
    $mois=intval($month);
    $annee=intval($year);
    if($mois > 9 ){$annee=$annee-1;}
        $count=Absence::where('eleve', $eleve)
    ->where('annee',$annee)
    ->count();
    
     User::where('id', $eleve)->update(array('absences' => $count));

        return redirect('/absences')->with('success', '  Supprimé avec succès');
          }

 
 


}

