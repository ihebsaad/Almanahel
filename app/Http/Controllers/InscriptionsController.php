<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Inscription ;
      use App\User ;
 use DB;


class InscriptionsController extends Controller
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
    

 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('inscriptions.create'  );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Inscription = new Inscription([
             'eleve' =>$request->get('eleve'),
             'nom' => $request->get('nom'),
             'prenom' => $request->get('prenom'),
             'datenaissance' => $request->get('datenaissance'),
             'etablissement' => $request->get('etablissement'),
             'type_etabliss' => $request->get('type_etabliss'),
             'niveau' => $request->get('niveau'),
             'section' => $request->get('section'),
             'frere' => $request->get('frere'),
             'moyenne_1' => $request->get('moyenne_1'),
             'moyenne_2' => $request->get('moyenne_2'),
             'moyenne_3' => $request->get('moyenne_3'),
             'moyenne_g' => $request->get('moyenne_g'),
             'clubs' => $request->get('clubs'),
             'heure_12h' => $request->get('heure_12h'),
             'heure_17h' => $request->get('heure_17h'),
             'vendredi' => $request->get('vendredi'),
             'samedi' => $request->get('samedi'),
             'dimanche' => $request->get('dimanche'),
             'civilite' => $request->get('civilite'),
              'prenom_rep' => $request->get('prenom_rep'),
              'nom_rep'=> $request->get('nom_rep'),
              'ville'=> $request->get('ville'),
              'tel'=> $request->get('tel'),
              'tel2'=> $request->get('tel2'),
              'email'=> $request->get('email')
            // 'par'=> $request->get('par'),ville

        ]);

        $Inscription->save();
        return redirect('/inscriptions')->with('success', ' inscrit avec succès');

    }


    

    public function updating(Request $request)
    {

        $id= $request->get('inscription');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
          Inscription::where('id', $id)->update(array($champ => $val));

  
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    
       
   

          $inscriptions =Inscription::orderBy('eleve', 'asc')->get() ;
                              
          return view('inscriptions.index',  ['inscriptions' => $inscriptions]);        
         


     }
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy($id)
    {
        $inscription = Inscription::find($id);
         $inscription->delete();

        return redirect('/inscriptions')->with('success', '  supprimé avec succès');
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {


        $inscription = Inscription::find($id);

           
            


        //$roles = DB::table('roles')->get();

        return view('inscriptions.view',compact('inscription','id'));

    }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit2($id)
    {
 
        $inscription = Inscription::find($id);

        return view('inscriptions.edit2',  compact('inscription','id'));
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

        $inscription = Inscription::find($id);

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

if( ($request->get('eleve'))!=null) { $inscription->eleve = $request->get('eleve');}
      if( ($request->get('nom'))!=null) { $inscription->nom = $request->get('nom');}
         if( ($request->get('prenom'))!=null) { $inscription->prenom = $request->get('prenom');}
      if( ($request->get('datenaissance'))!=null) { $inscription->datenaissance = $request->get('datenaissance');}
       if( ($request->get('etablissement'))!=null) { $inscription->etablissement = $request->get('etablissement');}
      if( ($request->get('type_etabliss'))!=null) { $inscription->type_etabliss = $request->get('type_etabliss');}
        if( ($request->get('etablissement'))!=null) { $inscription->etablissement = $request->get('etablissement');}
      if( ($request->get('niveau'))!=null) { $inscription->niveau = $request->get('niveau');}
      if( ($request->get('section'))!=null) { $inscription->section = $request->get('section');}
       if( ($request->get('frere'))!=null) { $inscription->frere = $request->get('frere');}
           if( ($request->get('moyenne_1'))!=null) { $inscription->moyenne_1 = $request->get('moyenne_1');}
       if( ($request->get('moyenne_2'))!=null) { $inscription->moyenne_2 = $request->get('moyenne_2');}
           if( ($request->get('moyenne_3'))!=null) { $inscription->moyenne_3 = $request->get('moyenne_3');}
       if( ($request->get('moyenne_gmoyenne_g'))!=null) { $inscription->moyenne_g = $request->get('moyenne_g');}
        if( ($request->get('clubs'))!=null) { $inscription->clubs = $request->get('clubs');}
      if( ($request->get('heure_12h'))!=null) { $inscription->heure_12h = $request->get('heure_12h');}
    if( ($request->get('heure_17h'))!=null) { $inscription->heure_17h = $request->get('heure_17h');}

       if( ($request->get('vendredi'))!=null) { $inscription->vendredi = $request->get('vendredi');}
        if( ($request->get('samedi'))!=null) { $inscription->samedi = $request->get('samedi');}
       if( ($request->get('dimanche'))!=null) { $inscription->dimanche = $request->get('dimanche');}
           if( ($request->get('civilite'))!=null) { $inscription->civilite = $request->get('civilite');}
       if( ($request->get('prenom_rep'))!=null) { $inscription->prenom_rep = $request->get('prenom_rep');}
        if( ($request->get('nom_rep'))!=null) { $inscription->nom_rep = $request->get('nom_rep');}
       if( ($request->get('ville'))!=null) { $inscription->ville = $request->get('ville');}
           if( ($request->get('tel'))!=null) { $inscription->tel = $request->get('tel');}
       if( ($request->get('tel2'))!=null) { $inscription->tel2 = $request->get('tel2');}
       if( ($request->get('email'))!=null) { $inscription->email = $request->get('email');}
     //   $user->email = $request->get('email');
      //  $user->user_type = $request->get('user_type');

        //$data['id'] = $id;
        $inscription->save();


        return redirect('/inscriptions')->with('success', ' mise à jour avec succès');    }



      public function valide($id)
    {
        $inscription = Inscription::find($id);
        
         Inscription::where('id', $id)->update(['valide' => 1]);
          $eleve = new User([
            'name' => $inscription["prenom"],
            'lastname' => $inscription["nom"],
                'username' =>$inscription["prenom"],
               'user_type'=> "eleve",
               'password'=>  bcrypt($inscription["prenom"]),

        ]);
                  $eleve->save();
        $parent = new User([
            'name' => $inscription["prenom_rep"],
            'lastname' => $inscription["nom_rep"],
                'username' =>$inscription["prenom_rep"],
               'user_type'=> "parent",
               'password'=>  bcrypt($inscription["prenom_rep"]),

        ]);
        $parent->save();

        return redirect('/inscriptions')->with('success', '  valider avec succès');
    }

 
 


}

