<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Evenement ;
 use DB;


class EvenementsController extends Controller
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

        $evenements = Evenement::orderBy('id', 'desc')->get();
        return view('evenements.index',[ ], compact('evenements'));
    }

 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('evenements.create'  );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$vis=$request->get('visible');
		if($vis=="on"){
			$visible=1;
		}else{
			$visible=0;			
		}
		
	       
				 
        $evenements = new Evenement([
               'titre' => trim($request->get('titre')),
               'description' => trim($request->get('description')),
               'debut' => trim($request->get('debut')),
               'heure_debut' => trim($request->get('heure_debut')),
               'fin' => trim($request->get('fin')),
               'heure_fin' => trim($request->get('heure_fin')),
             'type' => trim($request->get('type')),
             'visible' => ($visible),
            // 'par'=> $request->get('par'),

        ]);

        $evenements->save();
        return redirect('/evenements')->with('success', ' ajouté avec succès');

    }


    public function saving(Request $request)
    {
        if( ($request->get('titre'))!=null) {

            $evenement = new Evenement([
                'titre' => $request->get('titre')

            ]);
            if ($evenement->save())
            { $id=$evenement->id;

                return url('/evenements/view/'.$id)/*->with('success', 'Dossier Créé avec succès')*/;
            }

            else {
                return url('/evenements');
            }
        }

    }

    public function updating(Request $request)
    {

        $id= $request->get('evenement');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
       Evenement::where('id', $id)->update(array('visible' => $val));

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
  
        $evenement = Evenement::find($id);
        return view('evenements.view' , ['evenement'=>$evenement]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
		 $id= $request->get('id');
 		 $titre= $request->get('titre');
		 $description= $request->get('description');
		 $debut= $request->get('debut');
		 $fin= $request->get('fin');
		 $heure_debut= $request->get('heure_debut');
		 $heure_fin= $request->get('heure_fin');
		 $type= $request->get('type');
		$vis=$request->get('visible');
		if($vis=="on" || $vis==1 ){
			$visible=1;
		}else{
			$visible=0;			
		}
        $evenement  = Evenement::find($id);
 
			Evenement::where('id',$id)->update(
		array(
 		'titre' => $titre,
		'description' => $description,
		'debut' => $debut,
		'fin' => $fin,
		'heure_debut' => $heure_debut,
		'heure_fin' => $heure_fin,
		'type' => $type,
		)
		);	
			
		 
        return redirect('/evenements/view/'.$id)->with('success', ' Modifié avec succès');
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
        $evenements = Evenement::find($id);
        $evenements->delete();

        return redirect('/evenements')->with('success', '  Supprimé avec succès');
    }

 
 


}

