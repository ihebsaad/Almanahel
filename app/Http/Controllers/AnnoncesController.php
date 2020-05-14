<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Annonce ;
 use DB;


class AnnoncesController extends Controller
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

        $annonces = Annonce::orderBy('id', 'desc')->get();
        return view('annonces.index',[ ], compact('annonces'));
    }

 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('annonces.create'  );
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
                 
				 
        $annonces = new Annonce([
             'image' =>  $name ,
             'titre' =>trim( $request->get('titre')),
             'contenu' => trim($request->get('contenu')),
             'extrait' => trim($request->get('extrait')),
             'visible' => ($visible),
            // 'par'=> $request->get('par'),

        ]);

        $annonces->save();
        return redirect('/annonces')->with('success', ' ajouté avec succès');

    }


    public function saving(Request $request)
    {
        if( ($request->get('titre'))!=null) {

            $annonce = new Annonce([
                'titre' => $request->get('titre')

            ]);
            if ($annonce->save())
            { $id=$annonce->id;

                return url('/annonces/view/'.$id)/*->with('success', 'Dossier Créé avec succès')*/;
            }

            else {
                return url('/annonces');
            }
        }

    }

    public function updating(Request $request)
    {

        $id= $request->get('actus');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
       Annonce::where('id', $id)->update(array('visible' => $val));

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
  
        $annonce = Annonce::find($id);
        return view('annonces.view' , ['annonce'=>$annonce]);

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
        $annonce  = Annonce::find($id);
		
	$name='';
		if($request->file('image')!=null)
		{$image=$request->file('image');
		 $name =  $image->getClientOriginalName();
                 $path = storage_path()."/images/";
 
          $image->move($path, $name);	
		  Annonce::where('id',$id)->update(
		array(
		//'visible' => $visible,
		'titre' => $titre,
		'contenu' => $contenu,
		'extrait' => $extrait,
		'image' => $name
		));
		}else{
			Annonce::where('id',$id)->update(
		array(
		//'visible' => $visible,
		'titre' => $titre,
		'contenu' => $contenu,
		'extrait' => $extrait,
		)
		);	
			
		}
		
        return redirect('/annonces/view/'.$id)->with('success', ' Modifié avec succès');
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
        $annonces = Annonce::find($id);
        $annonces->delete();

        return redirect('/annonces')->with('success', '  Supprimé avec succès');
    }

 
 


}

