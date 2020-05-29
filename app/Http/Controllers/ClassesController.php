<?php

namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
  use App\Classe ;
  use App\Retard ;
  use App\Absence ;
 use DB;
use Illuminate\Support\Facades\Auth;
use Session;

class ClassesController extends Controller
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
		   $classes =Classe::orderBy('titre', 'asc')->get() ;
                              
          return view('classes.index',  ['classes' => $classes]);        
		  
     }

     public function annee($annee)
    {
		  $classes =Classe::orderBy('titre', 'asc')->where('annee',$annee)->get() ;
                              
          return view('classes.annee',  ['annee'=>$annee,'classes' => $classes]);        
		  
     }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      //  if(\Gate::allows('isAdmin'))
       // {
            return view('classes.create'  );

       // }
       /* else {
            // redirect
            return redirect('/')->with('success', 'droits insuffisants');

        }*/
    }


	 
	   
	
    public function store(array $data)
    {
        Classe::create([
            'titre' => $data['titre'],
            'annee' => $data['annee'],
            
        ]);
		
        return redirect('/classes')->with('success', ' ajouté avec succès');

    }

    public function saving(Request $request)
    {
        $classe = new Classe([
            'titre' => $request->get('titre'),
            'annee' => $request->get('annee'),
                

        ]);

        $classe->save();
        return redirect('/classes')->with('success', ' ajouté avec succès');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {


        $classe = Classe::find($id);

           $relations1 = DB::table('eleves_classe')->select('eleve')
            ->where('classe','=',$id)
            ->get();
            
            $eleves1 = DB::table('users')
            ->where('user_type','=','eleve')
            ->get();
            $relations2 = DB::table('profs_classe')->select('prof')
            ->where('classe','=',$id)
            ->get();
            
            $enseignants = DB::table('users')
            ->where('user_type','=','prof')
            ->get();
            


        //$roles = DB::table('roles')->get();

        return view('classes.view',['relations1'=>$relations1, 'eleves1'=>$eleves1,'relations2'=>$relations2, 'enseignants'=>$enseignants],compact('classe','id'));

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
    public function update(Request $request, $id)
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

        $classe = Classe::find($id);

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

      if( ($request->get('titre'))!=null) { $classe->titre = $request->get('titre');}
      if( ($request->get('annee'))!=null) { $classe->annee = $request->get('annee');}
      
     //   $user->email = $request->get('email');
      //  $user->user_type = $request->get('user_type');

        //$data['id'] = $id;
        $classe->save();


        return redirect('/classes')->with('success', ' mise à jour avec succès');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::find($id);
        $classe->delete();
		 Absence::where('classe',$id)->delete();
		 Retard::where('classe',$id)->delete();

        return redirect('/classes')->with('success', '  supprimé avec succès');
    }




    public  static function ListeClasses()
    {
        $classes = DB::table('classes')->select('id', 'titre')->get();

        return $classes;

    


 
    }

    

    public function updating(Request $request)
    {
        $id= $request->get('classe');
        $champ= strval($request->get('champ'));
  
            $val= $request->get('val');

        
        //  $dossier = Dossier::find($id);
        // $dossier->$champ =   $val;
        Classe::where('id', $id)->update(array($champ => $val));

    }


    public static function  ChampById($champ,$id)
    {
        $classe = CLasse::find($id);
        if (isset($classe[$champ])) {
            return $classe[$champ] ;
        }else{return '';}

    }
      public  function createeleveclass(Request $request)
    {
        $classe=$request->get('classe');
        $eleve= $request->get('eleve');

        $count=DB::table('eleves_classe')->where(
            ['classe' => $classe,
                'eleve' => $eleve]
        )->count();
        if ($count==0) {
            DB::table('eleves_classe')->insert(
               ['classe' => $classe,
                'eleve' => $eleve]
            );
            return 1;
        } else{ return 0;}



    }
    public  function removeeleveclass(Request $request)
    {
       $classe=$request->get('classe');
        $eleve= $request->get('eleve');


        DB::table('eleves_classe')
            ->where(
                ['classe' => $classe,
                'eleve' => $eleve]
            )->delete();



    }
        public  function createenseignantclass(Request $request)
    {
        $classe=$request->get('classe');
        $enseignant= $request->get('enseignant');

        $count1=DB::table('profs_classe')->where(
            ['classe' => $classe,
                'prof' => $enseignant]
        )->count();
        if ($count1==0) {
            DB::table('profs_classe')->insert(
               ['classe' => $classe,
                'prof' => $enseignant]
            );
            return 1;
        } else{ return 0;}



    }
    public  function removeenseignantclass(Request $request)
    {
       $classe=$request->get('classe');
        $enseignant= $request->get('enseignant');



        DB::table('profs_classe')
            ->where(
                ['classe' => $classe,
                'prof' => $enseignant]
            )->delete();
  
    }
 
 public  static function ClasseEleve ($eleve)
 {
	  

      $classe=  DB::table('eleves_classe')
            ->where(['eleve'=> $eleve])->get();
			
	if (isset($classe  ))
	{
		return $classe   ;
	} else{
		return null;
	}		
 }

 }
