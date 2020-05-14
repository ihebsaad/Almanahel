<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

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

        $retards = Retard::orderBy('id', 'desc')->get();
        return view('retards.index',[ ], compact('retards'));
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
		if($vis=="on"){
			$email=1;
		}else{
			$email=0;			
		}
		
	 
                 
				 
        $retards = new Retard([
              'eleve' =>trim( $request->get('eleve')),
             'classe' => trim($request->get('classe')),
             'details' => trim($request->get('details')),
             'seance' => trim($request->get('seance')),
             'date' => trim($request->get('date')),
  
        ]);

        $retards->save();
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
			'eleve' =>trim( $request->get('eleve')),
             'classe' => trim($request->get('classe')),
             'details' => trim($request->get('details')),
             'seance' => trim($request->get('seance')),
              'date' => trim($request->get('date')),
		)
		);	
			
		 
		
        return back();
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
        $retards->delete();

        return redirect('/retards')->with('success', '  Supprimé avec succès');
    }

 
 


}

