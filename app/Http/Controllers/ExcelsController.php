<?php

namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
  use App\Excel ;
 use DB;
use Illuminate\Support\Facades\Auth;
use Session;

class ExcelsController extends Controller
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
		 
		  $excels =Excel::orderBy('mois', 'desc')->get() ;      
          return view('excels.index',  ['excels' => $excels]);        
		 
     }

     public function annee($annee)
    {
		 
		  $excels =Excel::orderBy('mois', 'desc')->where('annee',$annee)->get() ;      
          return view('excels.annee',  ['annee'=>$annee,'excels' => $excels]);        
		 
     }
 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             
       
    $id=Auth::id();

    
            return view('excels.create',[  'id'=>$id] );

    }


	 
	   
	
    public function store(Request $request)
    {
     $name='';
    if($request->file('chemin')!=null)
    {$chemin=$request->file('chemin');
     $name =  $chemin->getClientOriginalName();
     $path = storage_path()."/excels/";
 
          $chemin->move($path, $name);
    }
   /*   $name='';
    if($request->file('chemin')!=null)
    {$chemin=$request->file('chemin');
     $name =  $chemin->getClientOriginalName();
     $chemin = storage_path()."/excels/";
 
          $chemin->move($path, $name);
    }*/
       $emetteur=Auth::id(); 
	$type=	$request->get('type');
	$mois= $request->get('mois');
	$annee= $request->get('annee');
	
	// Suppression ancien fichier
		Excel::where('type',$type)
		->where('annee',$annee)
		->where('mois',$mois)
		->delete();
		
        $excel = new Excel([
             'titre' =>$request->get('titre'),
             'chemin'=> $name,
              'type' => $type,
              'mois' => $mois,
              'annee' => $annee,
              'emetteur' => $emetteur,
            
            // 'par'=> $request->get('p,ar'),ville

        ]);

        $excel->save();
        if($request->get('sourcepg') != null)
        {return redirect('/bienvenue');}
        else
        {return redirect('/excels')->with('success', ' ajouté avec succès');}

    }

  


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

		$excel = Excel::find($id);
 
        return view('excels.view',[ 'excel'=>$excel ,'id'=>$id],compact('excel','id'));

    }

   

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request )
    {
		
 	$id=	$request->get('id');
     $emetteur=Auth::id(); 
	$type=	$request->get('type');
	$mois= $request->get('mois');
	$annee= $request->get('annee');
	
    
	$name='';
		if($request->file('chemin')!=null)
		{$chemin=$request->file('chemin');
		 $name =  $chemin->getClientOriginalName();
         $path = storage_path()."/excels/";
 
          $chemin->move($path, $name);	
		  Excel::where('id',$id)->update(
		array(
		//'visible' => $visible,
		'titre' => $titre,
		'emetteur' => $emetteur,
		'chemin' => $name
		));
		}else{
		 Excel::where('id',$id)->update(
		array(
		//'visible' => $visible,
		'titre' => $titre,
		'emetteur' => $emetteur,
		)
		);	
			
		}
        return redirect('/excels')->with('success', ' mise à jour avec succès');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $excel = Excel::find($id);
        $excel->delete();

        return redirect('/excels')->with('success', '  supprimé avec succès');
    }




 

    public function updating(Request $request)
    {
        $id= $request->get('doc');
        $champ= strval($request->get('champ'));
  
            $val= $request->get('val');

        
        //  $dossier = Dossier::find($id);
        // $dossier->$champ =   $val;
        Excel::where('id', $id)->update(array($champ => $val));


    }


    public static function  ChampById($champ,$id)
    {
        $classe = CLasse::find($id);
        if (isset($classe[$champ])) {
            return $classe[$champ] ;
        }else{return '';}

    }
   
 

 }
