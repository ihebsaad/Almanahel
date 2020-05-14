<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Absence ;
 use DB;


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

        $absences = ::orderBy('id', 'desc')->get();
        return view('absences.index',[ ], compact('absences'));
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
		if($vis=="on"){
			$email=1;
		}else{
			$email=0;			
		}
		
	 
                 
				 
        $absences = new Absence([
              'eleve' =>trim( $request->get('eleve')),
             'classe' => trim($request->get('classe')),
             'details' => trim($request->get('details')),
             'seance' => trim($request->get('seance')),
             'debut' => trim($request->get('debut')),
             'fin' => trim($request->get('fin')),
 
        ]);

        $absences->save();
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
		$vis=$request->get('visible');
		if($vis=="on" || $vis==1 ){
			$visible=1;
		}else{
			$visible=0;			
		}
        $absence  = Absence::find($id);
		
 
		 Absence::where('id',$id)->update(
		array(
			'eleve' =>trim( $request->get('eleve')),
             'classe' => trim($request->get('classe')),
             'details' => trim($request->get('details')),
             'seance' => trim($request->get('seance')),
             'debut' => trim($request->get('debut')),
             'fin' => trim($request->get('fin')),
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
        $absences = Absence::find($id);
        $absences->delete();

        return redirect('/absences')->with('success', '  Supprimé avec succès');
    }

 
 


}

