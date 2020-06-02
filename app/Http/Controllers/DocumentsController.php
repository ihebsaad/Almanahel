<?php

namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
  use App\Document ;
 use DB;
use Illuminate\Support\Facades\Auth;
use Session;

class DocumentsController extends Controller
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
     
      $documents =Document::orderBy('created_at', 'desc')->get() ;
                              
          return view('documents.index',  ['documents' => $documents]);        
     
     }
   
  public function annee($annee)
    {
     $documents =Document::orderBy('created_at', 'desc')->where('annee',$annee)->get() ;                              
          return view('documents.annee',  ['annee'=>$annee,'documents' => $documents]);        

  }
 public function docsrecu()
    {
        $id=Auth::id();
   $idclasses = DB::table('eleves_classe')->where('eleve','=',$id)->pluck('classe');

          $documents = Document::orderBy('created_at', 'desc')->where('type', '!=' , 'classe')->where('destinataire',$id)
          ->orWhere('type','classe')->whereIn('destinataire', $idclasses)->orderBy('titre', 'asc')->get() ;
        
          
                
           return view('documents.docsrecu',  ['documents' => $documents]);        
          
     }
      public function docsenv()
    {
        $id=Auth::id();
 

          $documents = Document::orderBy('created_at', 'desc')->where('emetteur',$id)
          ->get() ;
        
          
                
           return view('documents.docsenv',  ['documents' => $documents]);        
          
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

    
            return view('documents.create',['parents'=>$parents,'enseignants'=>$enseignants ,'eleves'=>$eleves,'classes'=>$classes ,'id'=>$id] );

    }


   
     
  
    public function store(Request $request)
    {
     $name='';
    if($request->file('chemin')!=null)
    {$chemin=$request->file('chemin');
     $name =  $chemin->getClientOriginalName();
     $path = storage_path()."/documents/";
 
          $chemin->move($path, $name);
    }
   /*   $name='';
    if($request->file('chemin')!=null)
    {$chemin=$request->file('chemin');
     $name =  $chemin->getClientOriginalName();
     $chemin = storage_path()."/documents/";
 
          $chemin->move($path, $name);
    }*/
    if(($request->get('destinataire5'))==1)
{

     $classes = DB::table('classes')
    ->get();
          $emetteur=Auth::id(); 
  foreach ($classes as $classe) {
     $document = new Document([
             'titre' =>$request->get('titre'),
             'chemin'=> $name,
             'description' => $request->get('description'),
             'annee' => $request->get('annee'),
             'type' => 'classe',
             'destinataire' => $classe->id,
             'emetteur' => $emetteur,
            
            // 'par'=> $request->get('p,ar'),ville

        ]);


        $document->save();


}

}
  else if (($request->get('destinataire6'))==1)
{

     $users = DB::table('users')
    ->get();
          $emetteur=Auth::id(); 
  foreach ($users as $user) {
     $document = new Document([
             'titre' =>$request->get('titre'),
             'chemin'=> $name,
             'description' => $request->get('description'),
             'annee' => $request->get('annee'),
             'type' => $user->user_type,
             'destinataire' => $user->id,
             'emetteur' => $emetteur,
            
            // 'par'=> $request->get('p,ar'),ville

        ]);


        $document->save();


}

}
  
  else 

  { if( ($request->get('destinataire2'))!=0) {$destinataire=0;$destinataire=$request->get('destinataire2');}
   if( ($request->get('destinataire1'))!=0) {$destinataire=0; $destinataire=$request->get('destinataire1');}
      if( ($request->get('destinataire3'))!=0) {$destinataire=0; $destinataire=$request->get('destinataire3');}
        if( ($request->get('destinataire4'))!=0) {$destinataire=0; $destinataire=$request->get('destinataire4');}
              if( ($request->get('destinataire3'))==0 &&($request->get('destinataire2'))==0 && ($request->get('destinataire1'))==0 && ($request->get('destinataire4'))==0  && ($request->get('destinataire5'))==0  ) {$destinataire=0; $destinataire=Auth::id();}
      $emetteur=Auth::id(); 

        $document = new Document([
             'titre' =>$request->get('titre'),
             'chemin'=> $name,
             'description' => $request->get('description'),
             'annee' => $request->get('annee'),
             'type' => $request->get('type'),
             'destinataire' => $destinataire,
             'emetteur' => $emetteur,
            
            // 'par'=> $request->get('p,ar'),ville

        ]);


        $document->save();
       }
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

 $document = Document::find($id);
       
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

        return view('documents.view',['parents'=>$parents,'enseignants'=>$enseignants ,'eleves'=>$eleves,'classes'=>$classes ,'id'=>$id],compact('document','id'));

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

        $document = Document::find($id);

  
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

      if( ($request->get('titre'))!=null) { $document->titre = $request->get('titre');}
      if( ($request->get('created_at'))!=null) { $document->created_at = $request->get('created_at');}
      if( ($request->get('description'))!=null) { $document->description = $request->get('description');}
      if( ($request->get('type'))!=null) { $document->type = $request->get('type');}

   
 $document->emetteur=Auth::id();
   $document->save();
  $chemin= $request->file('chemin');
       $name='';
         if($request->file('chemin')!=null)
          {$chemin=$request->file('chemin');
            $name = $chemin->getClientOriginalName();
        
          $path = storage_path()."/documents/";
          $chemin->move($path, $name);


        }
     
           if( ($request->get('destinataire2'))!=0) {$destinataire=$request->get('destinataire2');}
   if( ($request->get('destinataire1'))!=0) { $destinataire=$request->get('destinataire1');}
      if( ($request->get('destinataire3'))!=0) { $destinataire=$request->get('destinataire3');}
        if( ($request->get('destinataire4'))!=0) { $destinataire=$request->get('destinataire4');}
           if( ($request->get('destinataire3'))==0 &&($request->get('destinataire2'))==0 && ($request->get('destinataire1'))==0 && ($request->get('destinataire4'))==0) {$destinataire=0; $destinataire=Auth::id();}
         Document::where('id', $document['id'])->update(['destinataire' => $destinataire,'chemin' => $name]);

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
        $document = Document::find($id);
        $document->delete();

        return redirect('/docsenv')->with('success', '  supprimé avec succès');
    }




 

    public function updating(Request $request)
    {
        $id= $request->get('doc');
        $champ= strval($request->get('champ'));
  
            $val= $request->get('val');

        
        //  $dossier = Dossier::find($id);
        // $dossier->$champ =   $val;
        Document::where('id', $id)->update(array($champ => $val));


    }


    public static function  ChampById($champ,$id)
    {
        $classe = CLasse::find($id);
        if (isset($classe[$champ])) {
            return $classe[$champ] ;
        }else{return '';}

    }
   
 

 }