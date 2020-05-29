<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Paiement ;
    use App\User ;
 use DB;


class PaiementsController extends Controller
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

        $paiements = Paiement::orderBy('id', 'desc')->get();
        return view('paiements.annee',[ ], compact('paiements'));
    }

     public function annee($annee)
    { 

        $paiements = Paiement::orderBy('id', 'desc')->where('annee',$annee)->get();
        return view('paiements.index',[ ], compact('paiements'));
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('paiements.create'  );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 		$eleve=intval($request->get('eleve'));
		$libelle = trim($request->get('libelle'));
		$montant = trim($request->get('montant'));
		$annee = trim($request->get('annee'));
        $details = trim($request->get('details'));
		 
		  	 
        $paiement  = new Paiement([
              'eleve' => $eleve,
             'libelle' => $libelle ,
             'montant' => $montant ,
             'details' => $details ,
             'annee' => $annee ,
              
        ]);

        $paiement->save();
        return redirect('/paiements')->with('success', ' ajouté avec succès');

    }


    public function saving(Request $request)
    {
        if( ($request->get('montant'))!=null) {

            $paiement = new Paiement([
                'montant' => $request->get('titre')

            ]);
            if ($paiement->save())
            { $id=$paiement->id;

                return url('/paiements/view/'.$id)/*->with('success', 'Dossier Créé avec succès')*/;
            }

            else {
                return url('/paiements');
            }
        }

    }

    public function updating(Request $request)
    {

        $id= $request->get('paiement');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
       Paiement::where('id', $id)->update(array('visible' => $val));

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
  
        $paiement = Paiement::find($id);
        return view('paiements.view' , ['paiement'=>$paiement]);

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
		 
        $paiement  = Paiement::find($id);
		
 
		 Paiement::where('id',$id)->update(
		array(
			'eleve' =>trim( $request->get('eleve')),
              'details' => trim($request->get('details')),
             'montant' => trim($request->get('montant')),
             'libelle' => trim($request->get('libelle')),
             'annee' => trim($request->get('annee')),
		)
		);	
			
		 
		
        return redirect('/paiements/view/'.$id)->with('success', ' Modifié avec succès');
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
        $paiements = Paiement::find($id);
        $paiements->delete();

        return redirect('/paiements')->with('success', '  Supprimé avec succès');
    }

 
 


}

