<?php

namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
  use App\User ;
  use App\Retard ;
  use App\Absence ;
  use App\Paiement ;
   use App\Inscriptionv ;
 use DB;
use Illuminate\Support\Facades\Auth;
use Session;

class UsersController extends Controller
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
    /*
        if(\Gate::allows('isAdmin'))
        {
            $users = User::orderBy('name', 'asc')->get() ;
            return view('users.index',['dossiers' => $dossiers], compact('users'));        }
        else {
            // redirect
            return redirect('/home')->with('success', 'droits insuffisants');
        }
    */
         $id=Auth::id();
           $user = User::find($id);
         

      $users = User::orderBy('name', 'asc')->get() ;
                              
         
             if ( $user->user_type==='parent')
            {
                 $idseleves = DB::table('parents_eleve')->where('parent','=',$id)->pluck('eleve');
               
               
               $users = User::orderBy('name', 'asc')
               ->whereIn('id', $idseleves)
               ->get() ;
              
            }

            return view('users.index',  ['users' => $users]);        
     


     }

 
 
 public function parents()
    {
      
      $users = User::where('user_type','parent')->orderBy('name', 'asc')->get() ;
              
           return view('users.parents',  ['users' => $users]);        
      
     }
 
 
  public function eleves()
    {
      
      $users = User::where('user_type','eleve')->orderBy('name', 'asc')->get() ;
              
           return view('users.eleves',  ['users' => $users]);        
      
     }
   
     public function profs()
    {
      
      $users = User::where('user_type','prof')->orderBy('name', 'asc')->get() ;
              
           return view('users.profs',  ['users' => $users]);        
      
     }
   
       public function personnels()
    {
      
      $users = User::where('user_type','membre')
      ->orWhere('user_type','suivi')
      ->orWhere('user_type','admin')
      ->orWhere('user_type','conseil')
      ->orWhere('user_type','financier')
      ->orderBy('name', 'asc')->get() ;
              
           return view('users.personnels',  ['users' => $users]);        
      
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
            return view('users.create'  );

       // }
       /* else {
            // redirect
            return redirect('/')->with('success', 'droits insuffisants');
        }*/
    }


   
       protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
  
    public function store(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    
        return redirect('/users')->with('success', ' ajouté avec succès');

    }

    public function saving(Request $request)
    {
        $user = new User([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
                'username' => $request->get('username'),
               'user_type'=> $request->get('user_type'),
               'password'=>  bcrypt($request->get('password')),

        ]);

        $user->save();
        return redirect('/users')->with('success', ' ajouté avec succès');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
public function view($id)
    {
    $user = User::find($id);
    //ANNEE
    $year=date('Y');$month=date('m');
    $mois=intval($month);
    $annee=intval($year);
    if($mois > 9 ){$annee=$annee-1;}
    $this->countPaiements($id,$annee);
    $this->countRetards($id,$annee);
    $this->countAbsences($id,$annee);

    $relations = DB::table('parents_eleve')->select('eleve')
            ->where('parent','=',$id)
            ->get();
            $eleves = DB::table('users')
            ->where('user_type','=','eleve')
            ->get();
          $relations1 = DB::table('parents_eleve')->select('parent')
            ->where('eleve','=',$id)
            ->get();
            $parents = DB::table('users')
            ->where('user_type','=','parent')
            ->get();
             $relations2 = DB::table('eleves_classe')->select('classe')
            ->where('eleve','=',$id)
            ->get();
            $classes = DB::table('classes')
            ->get();
             $relations3 = DB::table('profs_classe')->select('classe')
            ->where('prof','=',$id)
            ->get();
            $classes1 = DB::table('classes')
            ->get();
        //$roles = DB::table('roles')->get();
        return view('users.view',['relations'=>$relations, 'eleves'=>$eleves,'relations1'=>$relations1, 'parents'=>$parents,'relations2'=>$relations2, 'classes'=>$classes,'relations3'=>$relations3, 'classes1'=>$classes1] ,compact('user','id'));
    }

 

    public function profile($id)
    {
        if(  Auth::id() ==$id )

        { 
          $user = User::find($id);

           $relations = DB::table('parents_eleve')->select('eleve')
            ->where('parent','=',$id)
            ->get();
            $eleves = DB::table('users')
            ->where('user_type','=','eleve')
            ->get();
          $relations1 = DB::table('parents_eleve')->select('parent')
            ->where('eleve','=',$id)
            ->get();
            $parents = DB::table('users')
            ->where('user_type','=','parent')
            ->get();
             $relations2 = DB::table('eleves_classe')->select('classe')
            ->where('eleve','=',$id)
            ->get();
            $classes = DB::table('classes')
            ->get();
             $relations3 = DB::table('profs_classe')->select('classe')
            ->where('prof','=',$id)
            ->get();
            $classes1 = DB::table('classes')
            ->get();
         
        return view('users.profile',['relations'=>$relations, 'eleves'=>$eleves,'relations1'=>$relations1, 'parents'=>$parents,'relations2'=>$relations2, 'classes'=>$classes,'relations3'=>$relations3, 'classes1'=>$classes1] , compact('user','id'));
        }
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
     
        $user  = User::find($id);
    
    $usertype=$request->get('user_type');
    if($usertype=="eleve")
        {
     User::where('id',$id)->update(
    array(
    //  'eleve' =>trim( $request->get('eleve')),
        //     'classe' => trim($request->get('classe')),
             'name' => trim($request->get('name')),
             'lastname' => trim($request->get('lastname')),
             'email' => trim($request->get('email')),
              'naissance' => trim($request->get('naissance')),
              'tel' => trim($request->get('tel')),
              'adresse' => trim($request->get('adresse')),
                'niveau' => trim($request->get('niveau')),
             'user_type' => trim($request->get('user_type')),
              'remarques' => trim($request->get('remarques')),
              'paiements' => trim($request->get('paiements')),
             
             
    
    )
    );  
     if($request->get('password')!="")
    {User::where('id', $id)->update(array('password' => bcrypt(trim($request->get('password')))));}}
       if($usertype=="parent")
        {
     User::where('id',$id)->update(
    array(
    //  'eleve' =>trim( $request->get('eleve')),
        //     'classe' => trim($request->get('classe')),
             'name' => trim($request->get('name')),
             'lastname' => trim($request->get('lastname')),
             'email' => trim($request->get('email')),
              'naissance' => trim($request->get('naissance')),
              'tel' => trim($request->get('tel')),
              'user_type' => trim($request->get('user_type')),
             
    
    )
    ); 
     if($request->get('password')!="")
    {User::where('id', $id)->update(array('password' => bcrypt(trim($request->get('password')))));} }
      if($usertype=="prof")
        {
     User::where('id',$id)->update(
    array(
    //  'eleve' =>trim( $request->get('eleve')),
        //     'classe' => trim($request->get('classe')),
             'name' => trim($request->get('name')),
             'lastname' => trim($request->get('lastname')),
             'email' => trim($request->get('email')),
              'naissance' => trim($request->get('naissance')),
              'tel' => trim($request->get('tel')),
              'user_type' => trim($request->get('user_type')),
              
    
    )
    );  
  if($request->get('password')!="")
    {User::where('id', $id)->update(array('password' => bcrypt(trim($request->get('password')))));}}
      if($usertype=="suivi" || $usertype=="financier"|| $usertype=="membre" || $usertype=="conseil" | $usertype=="admin")
        {
     User::where('id',$id)->update(
    array(
    //  'eleve' =>trim( $request->get('eleve')),
        //     'classe' => trim($request->get('classe')),
             'name' => trim($request->get('name')),
             'lastname' => trim($request->get('lastname')),
             'email' => trim($request->get('email')),
              'naissance' => trim($request->get('naissance')),
              'tel' => trim($request->get('tel')),
              'user_type' => trim($request->get('user_type')),
             
    )
    ); 
     if($request->get('password')!="")
    {User::where('id', $id)->update(array('password' => bcrypt(trim($request->get('password')))));} }

      
     
    
        return redirect('/users')->with('success', ' Modifié avec succès');
    }
      public function edit1(Request $request)
    {
 
    $id=$request->get('iduser');
     
        $user  = User::find($id);
    $user = auth()->user();
    $usertype=$user['user_type'];
    if($usertype=="eleve")
        {
     User::where('id',$id)->update(
    array(
    //  'eleve' =>trim( $request->get('eleve')),
        //     'classe' => trim($request->get('classe')),
             'name' => trim($request->get('name')),
             'lastname' => trim($request->get('lastname')),
             'email' => trim($request->get('email')),
              'naissance' => trim($request->get('naissance')),
              'tel' => trim($request->get('tel')),
              'adresse' => trim($request->get('adresse')),
                'niveau' => trim($request->get('niveau')),
            
             
             
    
    )
    );  
     if($request->get('password')!="")
    {User::where('id', $id)->update(array('password' => bcrypt(trim($request->get('password')))));}}
       if($usertype=="parent")
        {
     User::where('id',$id)->update(
    array(
    //  'eleve' =>trim( $request->get('eleve')),
        //     'classe' => trim($request->get('classe')),
             'name' => trim($request->get('name')),
             'lastname' => trim($request->get('lastname')),
             'email' => trim($request->get('email')),
              'naissance' => trim($request->get('naissance')),
              'tel' => trim($request->get('tel')),
              
             
    
    )
    ); 
     if($request->get('password')!="")
    {User::where('id', $id)->update(array('password' => bcrypt(trim($request->get('password')))));} }
      if($usertype=="prof")
        {
     User::where('id',$id)->update(
    array(
    //  'eleve' =>trim( $request->get('eleve')),
        //     'classe' => trim($request->get('classe')),
             'name' => trim($request->get('name')),
             'lastname' => trim($request->get('lastname')),
             'email' => trim($request->get('email')),
              'naissance' => trim($request->get('naissance')),
              'tel' => trim($request->get('tel')),
             
              
    
    )
    );  
  if($request->get('password')!="")
    {User::where('id', $id)->update(array('password' => bcrypt(trim($request->get('password')))));}}
      if($usertype=="suivi" || $usertype=="financier"|| $usertype=="membre" || $usertype=="conseil" | $usertype=="admin")
        {
     User::where('id',$id)->update(
    array(
    //  'eleve' =>trim( $request->get('eleve')),
        //     'classe' => trim($request->get('classe')),
             'name' => trim($request->get('name')),
             'lastname' => trim($request->get('lastname')),
             'email' => trim($request->get('email')),
              'naissance' => trim($request->get('naissance')),
              'tel' => trim($request->get('tel')),
             
             
    )
    ); 
     if($request->get('password')!="")
    {User::where('id', $id)->update(array('password' => bcrypt(trim($request->get('password')))));} }

      
     
    
       return redirect('/users/profile/'.$id)->with('success', ' Modifié avec succès');
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

        $user = User::find($id);

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

      if( ($request->get('name'))!=null) { $user->name = $request->get('name');}
      if( ($request->get('email'))!=null) { $user->email = $request->get('email');}
      if( ($request->get('user_type'))!=null) { $user->user_type = $request->get('user_type');}
     //   $user->email = $request->get('email');
      //  $user->user_type = $request->get('user_type');

        //$data['id'] = $id;
        $user->save();


        return redirect('/users')->with('success', ' mise à jour avec succès');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
         Paiement::where('eleve', $id)->delete();
          Retard::where('eleve', $id)->delete();
           Absence::where('eleve', $id)->delete();
            Inscriptionv::where('ideleve', $id)->delete();
            DB::table('eleves_classe')->where('eleve' , $id)->delete();
             DB::table('parents_eleve')->where('eleve' , $id)->delete();
        return redirect('/users')->with('success', '  supprimé avec succès');
    }




    public  static function ListeUsers()
    {
        $users = DB::table('users')->select('id', 'name')->get();

        return $users;

    }


 
    public static function CheckRoleUser($user,$role)
    {

      $find =   DB::table('roles_users')
            ->where( ['role_id' => $role  , 'user_id' => $user])
            ->count();

       return $find  ;

    }

    public function changestatut(Request $request)
    {
        $user = auth()->user();
        $iduser=$user->id;
        $nomuser=$user->name.' '.$user->lastname;

        User::where('id', $iduser)->update(array('statut' => '0'));
        Log::info('[Agent: '.$nomuser.'] Retour de pause ' );

    }

    public function updating(Request $request)
    {
        $id= $request->get('user');
        $champ= strval($request->get('champ'));
        if($champ=='password'){
            $val= bcrypt(trim($request->get('val')));

        }else{
            $val= $request->get('val');

        }
        //  $dossier = Dossier::find($id);
        // $dossier->$champ =   $val;
        User::where('id', $id)->update(array($champ => $val));

    }


    public static function  ChampById($champ,$id)
    {
        $user = User::find($id);
        if (isset($user[$champ])) {
            return $user[$champ] ;
        }else{return '';}

    }
     public  function createeleve(Request $request)
    {
        $parent=$request->get('parent');
        $eleve= $request->get('eleve');

        $count=DB::table('parents_eleve')->where(
            ['parent' => $parent,
                'eleve' => $eleve]
        )->count();
        if ($count==0) {
            DB::table('parents_eleve')->insert(
               ['parent' => $parent,
                'eleve' => $eleve]
            );
            return 1;
        } else{ return 0;}



    }
  
  
    public  function removeeleve(Request $request)
    {
        $parent=$request->get('parent');
        $eleve= $request->get('eleve');


        DB::table('parents_eleve')
            ->where(
                ['parent' => $parent,
                'eleve' => $eleve]
            )->delete();
 
    }
 
     public  function countRetards(  $user,$annee)
    {
    $count=Retard::where('eleve', $user)
    ->where('annee',$annee)
    ->count();
    
     User::where('id', $user)->update(array('retards' => $count));
 
    }
  
      public  function countAbsences(  $user,$annee)
    {
    $count=Absence::where('eleve', $user)
    ->where('annee',$annee)
    ->count();
    
     User::where('id', $user)->update(array('absences' => $count));
 
    }
  
      public  function countPaiements(  $user,$annee)
    {
    $count=Paiement::where('eleve', $user)
    ->where('annee',$annee)
    ->sum('montant');
    
     User::where('id', $user)->update(array('totalpaiement' => $count));
 
    }
  


public  function createparent(Request $request)
    {
        $eleve=$request->get('eleve');
        $parent= $request->get('parent');
        $count=DB::table('parents_eleve')->where(
            ['parent' => $parent,
                'eleve' => $eleve]
        )->count();
        if ($count==0) {
            DB::table('parents_eleve')->insert(
               ['parent' => $parent,
                'eleve' => $eleve]
            );
            return 1;
        } else{ return 0;}
    }
    public  function removeparent(Request $request)
    {
        $parent=$request->get('parent');
        $eleve= $request->get('eleve');
        DB::table('parents_eleve')
            ->where(
                ['parent' => $parent,
                'eleve' => $eleve]
            )->delete();
    }
      public  function createclasse(Request $request)
    {
        $eleve=$request->get('eleve');
        $classe= $request->get('classe');
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
    public  function removeclasse(Request $request)
    {
       $eleve=$request->get('eleve');
        $classe= $request->get('classe');
        DB::table('eleves_classe')
            ->where(
                ['classe' => $classe,
                'eleve' => $eleve]
            )->delete();
    }
     public  function createclasse1(Request $request)
    {
        $prof=$request->get('prof');
        $classe1= $request->get('classe1');
        $count=DB::table('profs_classe')->where(
            ['classe' => $classe1,
                'prof' => $prof]
        )->count();
        if ($count==0) {
            DB::table('profs_classe')->insert(
               ['classe' => $classe1,
                'prof' => $prof]
            );
            return 1;
        } else{ return 0;}
    }
    public  function removeclasse1(Request $request)
    {
        $prof=$request->get('prof');
        $classe1= $request->get('classe1');
        DB::table('profs_classe')
            ->where(
                ['classe' => $classe1,
                'prof' => $prof]
            )->delete();
    }


 }