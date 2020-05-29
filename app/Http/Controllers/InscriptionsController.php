<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Inscription ;
      use App\User ;
        use App\Classe ;
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
    /*public function eleveainscrire()
    {
 
        return view('inscriptions.eleveainscrire'  );
    }*/
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
      $srcpage = $request->get('sourcepg');
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
      $annee=  $request->get('annee');
 
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
               'annee'=> $annee,
               'bulletin1' =>  $name,
               'bulletin2' =>  $nameb,
            // 'par'=> $request->get('p,ar'),ville

        ]);

        $Inscription->save();
        $to=trim('hammalisirine120@gmail.com');
        $type='notif demande Pré-inscription';
        //$nomp=$parent->name. ' '.$parent->lastname ;
        $sujet="Notification - demande de Pré-inscription ".$Inscription['prenom']." ".$Inscription['nom']." ";
        $contenu="Bonjour,<br>
        Nous vous informons que l'Élève ".$Inscription['prenom']." ".$Inscription['nom']." a envoyé une demande de Pré-inscription <br>";
        
        
        $data=array('destinataire'=>$to,'sujet'=>$sujet,'contenu'=>$contenu,'type'=>$type);
        $request = new Request($data);
        //\App\Http\Controllers\EnvoyesController::sendnotif($request);
         app('\App\Http\Controllers\EnvoyesController')->sendnotif($request);
           $to=trim('hammalisirine95@gmail.com');
        $type='notif demande inscription';
        //$nomp=$parent->name. ' '.$parent->lastname ;
        $sujet="Notification - demande de Pré-inscription ".$Inscription['prenom']." ".$Inscription['nom']." ";
        $contenu="Bonjour,<br>
        Nous vous informons que l'Élève ".$Inscription['prenom']." ".$Inscription['nom']." a envoyé une demande de Pré-inscription <br>";
        
        
        $data=array('destinataire'=>$to,'sujet'=>$sujet,'contenu'=>$contenu,'type'=>$type);
        $request = new Request($data);
        //\App\Http\Controllers\EnvoyesController::sendnotif($request);
         app('\App\Http\Controllers\EnvoyesController')->sendnotif($request);
        if($srcpage != null)
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
	 
	   public function annee($annee)
    {  
          $inscriptions =Inscription::orderBy('eleve', 'asc')->where('annee',$annee)->get() ;              
          return view('inscriptions.annee',  ['annee'=>$annee,'inscriptions' => $inscriptions]);        

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
         

        $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('hammalisirine120@gmail.com'); //adresse email
        $swiftTransport->setPassword('21septembre'); // mot de passe email
        $swiftMailer = new Swift_Mailer($swiftTransport);
         Mail::setSwiftMailer($swiftMailer);
         $to=$inscription["email"];
         $sujet="AlManahel Academy - votre préinscription est validée";
         $contenu='BONJOUR ,'.$inscription['prenom'].' '.$inscription['nom'].'<br>
                  VOTRE PRÉINSCRIPTION À  ALMANAHEL EST VALIDÉE.'.'<br>';
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu    ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html');
            });

     $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('hammalisirine120@gmail.com'); //adresse email
        $swiftTransport->setPassword('21septembre'); // mot de passe email
        $swiftMailer = new Swift_Mailer($swiftTransport);
         Mail::setSwiftMailer($swiftMailer);
         $to=$inscription["email_rep"];
         $sujet="AlManahel Academy - la préinscription de votre fils/fille ".$inscription['prenom']." " .$inscription['nom']." est validée";
          $contenu='BONJOUR ,'.$inscription['prenom_rep'].' '.$inscription['nom_rep'].'<br>
                LA PRÉINSCRIPTION DE VOTRE FILS/FILLE '.$inscription['prenom'].' ' .$inscription['nom']. ' À  ALMANAHEL EST VALIDÉE.'.'<br>';
                  
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu    ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html');
            }); 


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
       

         $user= User::where('id', $val)
		 ->where('user_type', 'eleve')
		 ->first();
     return json_encode($user) ;

    }
    public function inscriptionsadd(Request $request)
    {
     

            $champ=$request->get('champ1');
           
            $user= User::where('id', $champ)->first();
             $relation = DB::table('parents_eleve')
                                         ->where([
                                            ['eleve', '=', $user['id']],
                                            ])->first();
            $relation1 = DB::table('eleves_classe')
                                         ->where([
                                            ['eleve', '=', $user['id']],
                                            ])->first();
 $parent= User::where('id',  $relation->parent)->first();
 $classe= Classe::where('id',  $relation1->classe)->first();
            $inscription = new Inscription([
                'nom' => $user['lastname'],
                'prenom' =>$user['name'] ,
                'email' => $user['email'],
                 'datenaissance' =>$user['naissance'],
                'valide' => 1,
                'user_type' => 'eleve',
                'annee' => date('Y', strtotime('0 year')),
                  'eleve' => $user['id'],
                  'ideleve' => $user['id'],
                  'nom_rep' => $parent['lastname'],
                  'prenom_rep' =>$parent['name'] ,
                  'email_rep' => $parent['email'],
                  'tel'=> $parent['tel'],
                  'ville'=> $parent['adresse'],
                  'idparent'=> $parent['id'],
                  'niveau'=> $classe['titre'],
                  'etablissement'=> 'ELManahel',
                  'type_etabliss'=> 1,
                  ]);
           $inscription->save();
          


            return redirect('/inscriptions')->with('success', '  ajouté  avec succès');
            
      }

   public static function checkexiste1(Request $request)
    {
        $val =  trim($request->get('val'));
     
     $count =  Inscription::where('ideleve', $val)
              ->where('annee', date('Y', strtotime('0 year')))
              ->where('valide',1)
              ->count();

     return $count;

    }
 


}

