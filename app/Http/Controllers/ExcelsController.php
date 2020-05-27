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
		
	
       
   

		  $excels =Excel::orderBy('titre', 'asc')->get() ;
                              
          return view('excels.index',  ['excels' => $excels]);        
		 


     }

  
 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             
        $parents = DB::table('users')
                  ->where('user_type','parent' )
                ->get();
        $enseignants = DB::table('users')
                  ->where('user_type','prof' )
                ->get();
          $eleves = DB::table('users')
                  ->where('user_type','eleve' )
                ->get();
    $classes = DB::table('classes')
    ->get();
    $id=Auth::id();

    
            return view('excels.create',['parents'=>$parents,'enseignants'=>$enseignants ,'eleves'=>$eleves,'classes'=>$classes ,'id'=>$id] );

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
   if( ($request->get('destinataire2'))!=0) {$destinataire=0;$destinataire=$request->get('destinataire2');}
   if( ($request->get('destinataire1'))!=0) {$destinataire=0; $destinataire=$request->get('destinataire1');}
      if( ($request->get('destinataire3'))!=0) {$destinataire=0; $destinataire=$request->get('destinataire3');}
        if( ($request->get('destinataire4'))!=0) {$destinataire=0; $destinataire=$request->get('destinataire4');}
              if( ($request->get('destinataire3'))==0 &&($request->get('destinataire2'))==0 && ($request->get('destinataire1'))==0 && ($request->get('destinataire4'))==0) {$destinataire=0; $destinataire=Auth::id();}
      $emetteur=Auth::id(); 

        $excel = new Excel([
             'titre' =>$request->get('titre'),
             'chemin'=> $name,
             'description' => $request->get('description'),
             'type' => $request->get('type'),
             'destinataire' => $destinataire,
             'emetteur' => $emetteur,
            
            // 'par'=> $request->get('p,ar'),ville

        ]);

        $excel->save();
        if($request->get('sourcepg') != null)
        {return redirect('/bienvenue');}
        else
        {return redirect('/docsenv')->with('success', ' ajouté avec succès');}

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
       
            $parents = DB::table('users')
                  ->where('user_type','parent' )
                ->get();
        $enseignants = DB::table('users')
                  ->where('user_type','prof' )
                ->get();
          $eleves = DB::table('users')
                  ->where('user_type','eleve' )
                ->get();
    $classes = DB::table('classes')
    ->get();



        //$roles = DB::table('roles')->get();

        return view('excels.view',['parents'=>$parents,'enseignants'=>$enseignants ,'eleves'=>$eleves,'classes'=>$classes ,'id'=>$id],compact('excel','id'));

    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit1($id)
    {
 
        $classe = Classe::find($id);

        return view('classes.edit1',  compact('classe','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update3(Request $request, $id)
    {
       /* $request->validate([
            'share_name'=>'required',
            'share_price'=> 'required|integer',
            'share_qty' => 'required|integer'
        ]);

        */
      /*  $user = User::find($id);
      $user->name = $request->get('name');
         $user->email = $request->get('email');
         $user->type_user = $request->get('type_user');
*/

        $excel = Excel::find($id);

  
      /*  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
         ]);
        */
 /*       $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);*/

      if( ($request->get('titre'))!=null) { $excel->titre = $request->get('titre');}
      if( ($request->get('created_at'))!=null) { $excel->created_at = $request->get('created_at');}
      if( ($request->get('description'))!=null) { $excel->description = $request->get('description');}
      if( ($request->get('type'))!=null) { $excel->type = $request->get('type');}

   
 $excel->emetteur=Auth::id();
   $excel->save();
  $chemin= $request->file('chemin');
       $name='';
         if($request->file('chemin')!=null)
          {$chemin=$request->file('chemin');
            $name = $chemin->getClientOriginalName();
        
          $path = storage_path()."/excels/";
          $chemin->move($path, $name);


        }
     
           if( ($request->get('destinataire2'))!=0) {$destinataire=$request->get('destinataire2');}
   if( ($request->get('destinataire1'))!=0) { $destinataire=$request->get('destinataire1');}
      if( ($request->get('destinataire3'))!=0) { $destinataire=$request->get('destinataire3');}
        if( ($request->get('destinataire4'))!=0) { $destinataire=$request->get('destinataire4');}
           if( ($request->get('destinataire3'))==0 &&($request->get('destinataire2'))==0 && ($request->get('destinataire1'))==0 && ($request->get('destinataire4'))==0) {$destinataire=0; $destinataire=Auth::id();}
         Excel::where('id', $excel['id'])->update(['destinataire' => $destinataire]);

     //   $user->email = $request->get('email');
      //  $user->user_type = $request->get('user_type');

        //$data['id'] = $id;
      


        return redirect('/docsenv')->with('success', ' mise à jour avec succès');    }

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

        return redirect('/docsenv')->with('success', '  supprimé avec succès');
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
