<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Inscription ;
      use App\User ;
 use DB;
use Swift_Mailer;
 use Mail;


class InscriptionsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
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
      public function createfront()
    {
 
        return view('inscriptions.create_front'  );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $name='';
    if($request->file('bulletin1')!=null)
    {$bulletin1=$request->file('bulletin1');
     $name =  $bulletin1->getClientOriginalName();
     $path = storage_path()."/fichiers/";
 
          $bulletin1->move($path, $name);
    }
     $nameb='';
    if($request->file('bulletin2')!=null)
    {$bulletin2=$request->file('bulletin2');
     $nameb =  $bulletin2->getClientOriginalName();
$pathb = storage_path()."/fichiers/";
    
 
          $bulletin2->move($pathb, $nameb);
    }
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
             'nomclub'=> $request->get('nomclub'),
             'nomclubautre'=> $request->get('nomclubautre'),
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
              'email'=> $request->get('email'),
              'email_rep'=> $request->get('email_rep'),
               'annee'=> $request->get('annee'),
               'bulletin1' =>  $name,
               'bulletin2' =>  $nameb,
            // 'par'=> $request->get('p,ar'),ville

        ]);

        $Inscription->save();
        if($request->get('sourcepg') != null)
        {return redirect('/bienvenue');}
        else
        {return redirect('/inscriptions')->with('success', ' inscrit avec succès');}

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
       if( ($request->get('email_rep'))!=null) { $inscription->email_rep = $request->get('email_rep');}
       if( ($request->get('annee'))!=null) { $inscription->annee = $request->get('annee');}
        if( ($request->get('nomclub'))!=null) { $inscription->nomclub = $request->get('nomclub');}
        if( ($request->get('nomclubautre'))!=null) { $inscription->nomclubautre = $request->get('nomclubautre');}
     //   $user->email = $request->get('email');
      //  $user->user_type = $request->get('user_type');

        //$data['id'] = $id;
        $inscription->save();
      
 
        $bulletin1= $request->file('bulletin1');
      
         $name1='';
         if($request->file('bulletin1')!=null)
          {$bulletin1=$request->file('bulletin1');
            $name1 = $bulletin1->getClientOriginalName();
        
          $path1 = storage_path()."/fichiers/";
          $bulletin1->move($path1, $name1);}

  
      $bulletin2= $request->file('bulletin2');
       $name2='';
         if($request->file('bulletin2')!=null)
          {$bulletin2=$request->file('bulletin2');
            $name2 = $bulletin2->getClientOriginalName();
        
          $path2 = storage_path()."/fichiers/";
          $bulletin2->move($path2, $name2);

        }
          Inscription::where('id', $inscription['id'])->update(['bulletin2' => $name2,'bulletin1' => $name1]);
         


        return redirect('/inscriptions')->with('success', ' mise à jour avec succès');    }



      public function valide($id)
    {
        $inscription = Inscription::find($id);
        
         Inscription::where('id', $id)->update(['valide' => 1]);
          $eleve = new User([
            'name' => $inscription["prenom"],
            'lastname' => $inscription["nom"],
                'username' =>$inscription["nom"].$inscription["prenom"],
               'user_type'=> "eleve",
               'password'=> InscriptionsController::genererMDP(8),
               "email"=>$inscription["email"],

        ]);
                  $eleve->save();

        $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('hammalisirine120@gmail.com'); //adresse email
        $swiftTransport->setPassword('21septembre'); // mot de passe email
        $swiftMailer = new Swift_Mailer($swiftTransport);
         Mail::setSwiftMailer($swiftMailer);
         $to=$eleve["email"];
         $sujet="Création d'un nouvel élève";
         $contenu='Création d\'un nouvel élève avec username '.$eleve['username'].'<br>
                  et Mot de passe : '.$eleve['password'];
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu    ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html');
            });

$parent = User::where('user_type','parent')
          ->where('email',$inscription["email_rep"])->first() ;
echo($parent);

if(empty($parent))

       { $parent = new User([
            'name' => $inscription["prenom_rep"],
            'lastname' => $inscription["nom_rep"],
                'username' =>$inscription["nom_rep"].$inscription["prenom_rep"],
               'user_type'=> "parent",
               'password'=>  InscriptionsController::genererMDP(8),
               "email"=>$inscription["email_rep"],

        ]);
        $parent->save();
                $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('hammalisirine120@gmail.com'); //adresse email
        $swiftTransport->setPassword('21septembre'); // mot de passe email
        $swiftMailer = new Swift_Mailer($swiftTransport);
         Mail::setSwiftMailer($swiftMailer);
         $to=$parent["email"];
         $sujet="Création d'un nouvel parent";
         $contenu='Création d\'un nouvel parent avec username '.$parent['username'].'<br>
                  et Mot de passe : '.$parent['password'];
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu    ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html');
            }); }
        Inscription::where('id', $inscription['id'])->update(['ideleve' => $eleve["id"],'idparent' => $parent["id"]]);
         DB::table('parents_eleve')->insert(
               ['parent' => $parent['id'],
                'eleve' => $eleve["id"]]

            );


        return redirect('/inscriptions')->with('success', '  valider avec succès');
    }
    public function genererMDP ($longueur){
    // initialiser la variable $mdp
    $mdp = "";
    // Définir tout les caractères possibles dans le mot de passe,
    // Il est possible de rajouter des voyelles ou bien des caractères spéciaux
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
    // obtenir le nombre de caractères dans la chaîne précédente
    // cette valeur sera utilisé plus tard
    $longueurMax = strlen($possible);
    if ($longueur > $longueurMax) {
        $longueur = $longueurMax;
    }
    // initialiser le compteur
    $i = 0;
    // ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
    while ($i < $longueur) {
        // prendre un caractère aléatoire
        $caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
        // vérifier si le caractère est déjà utilisé dans $mdp
        if (!strstr($mdp, $caractere)) {
            // Si non, ajouter le caractère à $mdp et augmenter le compteur
            $mdp .= $caractere;
            $i++;
        }
    }
 return $mdp; }
  public static function checkexiste(Request $request)
    {
        $val =  trim($request->get('val'));
        $type=trim($request->get('type'));
       

         $user= User::where('id', $val)->first();
     return json_encode($user) ;

    }
    public function inscriptionsadd(Request $request)
    {
        if( ($request->get('champ'))!=null) {

            $champ=$request->get('champ');
            $user= User::where('id', $champ)->first();
            $inscription = new Inscription([
                'nom' => $user['lastname'],
                'prenom' =>$user['name'] ,
                'email' => $user['email'],
                 'datenaissance' =>$user['naissance'],
                'valide' => 1,
                'user_type' => 'eleve',
                'annee' => date('Y', strtotime('-1 year'),
                'ideleve' => $user['id'],
                'eleve' => $user['id'],
                  


            ]);

            return redirect('/inscriptions')->with('success', '  ajouté  avec succès');
            
        } }

 
 


}

