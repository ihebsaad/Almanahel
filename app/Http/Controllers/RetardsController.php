<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
    use App\User ;

use Illuminate\Http\Request;
    use App\Retard ;
 use DB;


class RetardsController extends Controller
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


	if($user_type=='parent'){
		
		 $ideleves= DB::table('parents_eleve')->where('parent',  $iduser)->pluck('eleve');
                           
		   $retards = Retard::orderBy('id', 'desc')->whereIn('eleve', $ideleves)->get();

	}else{
		        $retards = Retard::orderBy('id', 'desc')->get();

	}

 
        return view('retards.index',[ ], compact('retards'));
    }


    public function annee($annee)
    { 
 
 $user = auth()->user();
 $iduser=$user->id;
$user_type=$user->user_type;


	if($user_type=='parent'){
		
		 $ideleves= DB::table('parents_eleve')->where('parent',  $iduser)->pluck('eleve');
                           
		   $retards = Retard::orderBy('id', 'desc')->whereIn('eleve', $ideleves)->where('annee',$annee)->get();

	}else{
		        $retards = Retard::orderBy('id', 'desc')->where('annee',$annee)->get();

	}

 
        return view('retards.annee',[ 'annee'=>$annee], compact('retards'));
    }
 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('retards.create'  );
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
		$eleve=intval(trim($request->get('eleve')));
		$date=$request->get('date');
		$details=$request->get('details');
		$seance=$request->get('seance');
		$classe=$request->get('classe');
		$annee=$request->get('annee');
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
				$type='notif retard';
				//$nomp=$parent->name. ' '.$parent->lastname ;
				$sujet="Notification - Retard de l'éleve ".$nomeleve." ";
				$contenu="Bonjour,<br>
				Nous vous informons que votre enfant ".$nomeleve." a été en retard à l'école.<br>
				Date: ".$date." <br>
				Séance : ".$seance."<br>
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
                 
	 
                 
				 
        $retards = new Retard([
              'eleve' =>  $eleve ,
             'classe' =>  $classe  ,
             'details' =>  $details  ,
             'seance' => $seance  ,
             'date' => $date  ,
             'annee' => $annee  ,
  
        ]);

        $retards->save();
         $count=Retard::where('eleve', $eleve)
    ->where('annee',$annee)
    ->count();
    
     User::where('id', $eleve)->update(array('retards' => $count));
        return redirect('/retards')->with('success', ' ajouté avec succès');

    }


    public function saving(Request $request)
    {
        if( ($request->get('titre'))!=null) {

            $retard = new Retard([
                'titre' => $request->get('titre')

            ]);
            if ($retard->save())
            { $id=$retard->id;

                return url('/retards/view/'.$id)/*->with('success', 'Dossier Créé avec succès')*/;
            }

            else {
                return url('/retards');
            }
        }

    }

    public function updating(Request $request)
    {

        $id= $request->get('retard');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
       Retard::where('id', $id)->update(array('visible' => $val));

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
  
        $retard = Retard::find($id);
        return view('retards.view' , ['retard'=>$retard]);

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
		 
        $retard  = Retard::find($id);
		
 
		 Retard::where('id',$id)->update(
		array(
		//	'eleve' =>trim( $request->get('eleve')),
        //     'classe' => trim($request->get('classe')),
             'details' => trim($request->get('details')),
             'seance' => trim($request->get('seance')),
              'date' => trim($request->get('date')),
		)
		);	
			
		 
		
        return redirect('/retards/view/'.$id)->with('success', ' Modifié avec succès');
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
        $retards = Retard::find($id);
        $eleve=$retards->eleve;
        $retards->delete();
        $year=date('Y');$month=date('m');
    $mois=intval($month);
    $annee=intval($year);
    if($mois > 9 ){$annee=$annee-1;}
           $count=Retard::where('eleve', $eleve)
    ->where('annee',$annee)
    ->count();
     User::where('id', $eleve)->update(array('retards' => $count));

        return redirect('/retards')->with('success', '  Supprimé avec succès');
    }

 
 


}

