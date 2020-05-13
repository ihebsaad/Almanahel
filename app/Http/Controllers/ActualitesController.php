<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Actualite ;
 use DB;


class ActualitesController extends Controller
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

        $actualites = Actualite::orderBy('id', 'desc')->get();
        return view('actualites.index',[ ], compact('actualites'));
    }

 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('actualites.create'  );
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
		
		$name='';
		if($request->file('image')!=null)
		{$image=$request->file('image');
		 $name =  $image->getClientOriginalName();
                 $path = storage_path()."/images/";
 
          $image->move($path, $name);
		}
                 
				 
        $actualites = new Actualite([
             'image' =>  $name ,
             'titre' =>trim( $request->get('titre')),
             'contenu' => trim($request->get('contenu')),
             'extrait' => trim($request->get('extrait')),
             'visible' => ($visible),
            // 'par'=> $request->get('par'),

        ]);

        $actualites->save();
        return redirect('/actualites')->with('success', ' ajouté avec succès');

    }


    public function saving(Request $request)
    {
        if( ($request->get('titre'))!=null) {

            $actualite = new Actualite([
                'titre' => $request->get('titre')

            ]);
            if ($actualite->save())
            { $id=$actualite->id;

                return url('/actualites/view/'.$id)/*->with('success', 'Dossier Créé avec succès')*/;
            }

            else {
                return url('/actualites');
            }
        }

    }

    public function updating(Request $request)
    {

        $id= $request->get('actus');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
       Actualite::where('id', $id)->update(array('visible' => $val));

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
  
        $actualite = Actualite::find($id);
        return view('actualites.view' , ['actualite'=>$actualite]);

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
		 $image= $request->file('image');
		 $titre= $request->get('titre');
		 $contenu= $request->get('contenu');
		 $extrait= $request->get('extrait');
		$vis=$request->get('visible');
		if($vis=="on" || $vis==1 ){
			$visible=1;
		}else{
			$visible=0;			
		}
        $actualite  = Actualite::find($id);
		
	$name='';
		if($request->file('image')!=null)
		{$image=$request->file('image');
		 $name =  $image->getClientOriginalName();
                 $path = storage_path()."/images/";
 
          $image->move($path, $name);	
		  Actualite::where('id',$id)->update(
		array(
		'visible' => $visible,
		'titre' => $titre,
		'contenu' => $contenu,
		'extrait' => $extrait,
		'image' => $name
		));
		}else{
			Actualite::where('id',$id)->update(
		array(
		'visible' => $visible,
		'titre' => $titre,
		'contenu' => $contenu,
		'extrait' => $extrait,
		)
		);	
			
		}
		
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
        $actualites = Actualite::find($id);
        $actualites->delete();

        return redirect('/actualites')->with('success', '  Supprimé avec succès');
    }

 
 


}

