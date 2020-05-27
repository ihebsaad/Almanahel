<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Depense ;
    use App\User ;
 use DB;


class DepensesController extends Controller
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

        $depenses = Depense::orderBy('id', 'desc')->get();
        return view('depenses.index',[ ], compact('depenses'));
    }

   public function annee($annee)
    { 

        $depenses = Depense::orderBy('id', 'desc')->where('annee',$annee)->get();
        return view('depenses.index',[ ], compact('depenses'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('depenses.create'  );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 		$libelle = trim($request->get('libelle'));
		$montant = trim($request->get('montant'));
		$annee = trim($request->get('annee'));
        $details = trim($request->get('details'));
        $beneficiaire = trim($request->get('beneficiaire'));
		 
		  	 
        $depense  = new Depense([
              'libelle' => $libelle ,
             'montant' => $montant ,
             'details' => $details ,
             'beneficiaire' => $beneficiaire ,
             'annee' => $annee ,
              
        ]);

        $depense->save();
        return redirect('/depenses')->with('success', ' ajouté avec succès');

    }


    public function saving(Request $request)
    {
        if( ($request->get('montant'))!=null) {

            $depense = new Depense([
                'montant' => $request->get('titre')

            ]);
            if ($depense->save())
            { $id=$depense->id;

                return url('/depenses/view/'.$id)/*->with('success', 'Dossier Créé avec succès')*/;
            }

            else {
                return url('/depenses');
            }
        }

    }

    public function updating(Request $request)
    {

        $id= $request->get('depense');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
       Depense::where('id', $id)->update(array('visible' => $val));

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
  
        $depense = Depense::find($id);
        return view('depenses.view' , ['depense'=>$depense]);

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
		 
        $depense  = Depense::find($id);
		
 
		 Depense::where('id',$id)->update(
		array(
               'details' => trim($request->get('details')),
             'beneficiaire' => trim($request->get('beneficiaire')),
             'montant' => trim($request->get('montant')),
             'libelle' => trim($request->get('libelle')),
             'annee' => trim($request->get('annee')),
		)
		);	
			
		 
		
        return redirect('/depenses/view/'.$id)->with('success', ' Modifié avec succès');
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
        $depenses = Depense::find($id);
        $depenses->delete();

        return redirect('/depenses')->with('success', '  Supprimé avec succès');
    }

 
 


}

