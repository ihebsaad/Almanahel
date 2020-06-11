<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Inscriptionv ;
      use App\User ;
        use App\Classe ;
        use App\Inscription;
 use DB;
use Swift_Mailer;
 use Mail;


class InscriptionsvController extends Controller
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
  $preins = DB::table('inscriptions')->where('valide',1)->get();
  $users = DB::table('users')->where('user_type','eleve')->get();
        return view('inscriptionsv.create',['preins'=>$preins,'users'=>$users] );
    }
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
            $inscriptionv = new Inscriptionv([
                'nom' => $user['lastname'],
                'prenom' =>$user['name'] ,
                'email' => $user['email'],
                 'datenaissance' =>$user['naissance'],
                'valide' => 1,
                'user_type' => 'eleve',
                'annee' => $request->get('annee'),
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
           $inscriptionv->save();
          
 $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('lyceealmanahel@gmail.com'); //adresse email
        $swiftTransport->setPassword('lyceealmanahel2020'); // mot de passe email
        $swiftMailer = new Swift_Mailer($swiftTransport);
         Mail::setSwiftMailer($swiftMailer);
         $to=$user["email"];
         $sujet="AlManahel Academy - votre inscription est validée";
         $contenu='Bonjour ,'.$user['name'].' '.$user['lastname'].'<br>
                  Votre inscription à  Almanahel est validée.'.'<br>';
                            $fromname='Almanahel Academy';
  $from='almanahelacademy@gmail.com';
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu ,$from,$fromname   ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                         ->setFrom([$from => $fromname]);
                       

            });
        $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('lyceealmanahel@gmail.com'); //adresse email
        $swiftTransport->setPassword('lyceealmanahel2020'); // mot de passe email
        $swiftMailer = new Swift_Mailer($swiftTransport);
         Mail::setSwiftMailer($swiftMailer);
           $fromname='Almanahel Academy';
  $from='almanahelacademy@gmail.com';
         $to=$parent["email"];
          $sujet="AlManahel Academy - inscription de votre fils/fille ".$user['name'].' '.$user['lastname']. " est validée";
          $contenu='Bonjour ,'.$parent['name'].' '.$parent['lastname'].'<br>
                L"inscription de votre fils/fille '.$user['name'].' ' .$user['lastname']. ' à AlManahel est validée.'.'<br>';
                  
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu,$from,$fromname   ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)

        ->setBody($contenu, 'text/html')
          ->setFrom([$from => $fromname]);
            }); 
             $to=trim('hammalisirine120@gmail.com');
        $type='notif demande Pré-inscription';
        //$nomp=$parent->name. ' '.$parent->lastname ;
        $sujet="Notification -inscription ".$inscriptionv['prenom']." ". $inscriptionv['nom']." ";
        $contenu="Bonjour,<br>
        Nous vous informons que l'Élève ".$inscriptionv['prenom']." ". $inscriptionv['nom']." a été inscit dans votre Lycée <br>";
        
        
        $data=array('destinataire'=>$to,'sujet'=>$sujet,'contenu'=>$contenu,'type'=>$type);
        $request = new Request($data);
        //\App\Http\Controllers\EnvoyesController::sendnotif($request);
         app('\App\Http\Controllers\EnvoyesController')->sendnotif($request);
              $to=trim('lyceealmanahel@gmail.com');
        $type='notif demande Pré-inscription';
        //$nomp=$parent->name. ' '.$parent->lastname ;
        $sujet="Notification -inscription ".$inscriptionv['prenom']." ". $inscriptionv['nom']." ";
        $contenu="Bonjour,<br>
        Nous vous informons que l'Élève ".$inscriptionv['prenom']." ". $inscriptionv['nom']." a été inscit dans votre Lycée <br>";
        
        
        $data=array('destinataire'=>$to,'sujet'=>$sujet,'contenu'=>$contenu,'type'=>$type);
        $request = new Request($data);
        //\App\Http\Controllers\EnvoyesController::sendnotif($request);
         app('\App\Http\Controllers\EnvoyesController')->sendnotif($request);
              $to=trim('hammalisirine95@gmail.com');
        $type='notif demande Pré-inscription';
        //$nomp=$parent->name. ' '.$parent->lastname ;
        $sujet="Notification -inscription ".$inscriptionv['prenom']." ". $inscriptionv['nom']." ";
        $contenu="Bonjour,<br>
        Nous vous informons que l'Élève ".$inscriptionv['prenom']." ". $inscriptionv['nom']." a été inscit dans votre Lycée <br>";
        
        
        $data=array('destinataire'=>$to,'sujet'=>$sujet,'contenu'=>$contenu,'type'=>$type);
        $request = new Request($data);
        //\App\Http\Controllers\EnvoyesController::sendnotif($request);
         app('\App\Http\Controllers\EnvoyesController')->sendnotif($request);

            return redirect('/inscriptionsv')->with('success', '  ajouté  avec succès');
            
      }

   public static function checkexiste1(Request $request)
    {
        $val =  trim($request->get('val'));
     
     $count =  Inscriptionv::where('ideleve', $val)
              ->where('annee', date('Y', strtotime('0 year')))
              ->where('valide',1)
              ->count();

     return $count;

    }
      public function inscriptionsaddnov(Request $request)
    {
     
 
            $champ=$request->get('champ2');
           
            $ins= Inscription::where('id', $champ)->first();
   
               $inscriptionv = new Inscriptionv([
             'eleve' =>$ins['eleve'],
             'nom' => $ins['nom'],
             'prenom' => $ins['prenom'],
               'datenaissance' => $ins['datenaissance'],
             'etablissement' => $ins['etablissement'],
             'type_etabliss' => $ins['type_etabliss'],
             'niveau' => $ins['niveau'],
             'section' => $ins['section'],
             'frere' => $ins['frere'],
             'moyenne_1' => $ins['moyenne_1'],
             'moyenne_2' => $ins['moyenne_2'],
             'moyenne_3' => $ins['moyenne_3'],
             'moyenne_g' => $ins['moyenne_g'],
             'clubs' => $ins['clubs'],
             'nomclub'=> $ins['nomclub'],
             'nomclubautre'=> $ins['nomclubautre'],
             'heure_12h' => $ins['heure_12h'],
             'heure_17h' => $ins['heure_17h'],
             'vendredi' => $ins['vendredi'],
             'samedi' => $ins['samedi'],
             'dimanche' =>$ins['dimanche'],
             'civilite' => $ins['civilite'],
              'prenom_rep' => $ins['prenom_rep'],
              'nom_rep'=>$ins['nom_rep'],
              'ville'=>$ins['ville'],
              'tel'=> $ins['tel'],
              'tel2'=> $ins['tel2'],
              'email'=> $ins['email'],
              'email_rep'=> $ins['email_rep'],
               'annee'=> $ins['annee'],
               'bulletin1' =>  $ins['bulletin1'],
               'bulletin2' =>  $ins['bulletin2'],
               'valide' =>  1,
            // 'par'=> $request->get('p,ar'),ville


        ]);
                
           $inscriptionv->save();
$pass1=InscriptionsvController::genererMDP(8);

          $eleve = new User([
            'name' => $inscriptionv["prenom"],
            'lastname' => $inscriptionv["nom"],
                'username' =>$inscriptionv["nom"].$inscriptionv["prenom"],
               'user_type'=> "eleve",
               'password'=> bcrypt($pass1),
               "email"=>$inscriptionv["email"],
               'naissance'=>$inscriptionv["datenaissance"],
               'niveau'=>$inscriptionv["niveau"],

        ]);
                  $eleve->save();

        $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('lyceealmanahel@gmail.com'); //adresse email
        $swiftTransport->setPassword('lyceealmanahel2020'); // mot de passe email
        $swiftMailer = new Swift_Mailer($swiftTransport);
         Mail::setSwiftMailer($swiftMailer);
         $to=$eleve["email"];
          $fromname='Almanahel Academy';
            $from='almanahelacademy@gmail.com';
         $sujet="AlManahel Academy - votre inscription est validée";
         $contenu='Bonjour ,'.$eleve['name'].' '.$eleve['lastname'].'<br>
                  Votre inscription à Almanahel est validée.'.'<br>
                  Vos codes d"accès :'.'<br>
                   E-mail :'.$eleve['email'].'<br>
                   Mot de passe :'.$pass1;
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu ,$from,$fromname   ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                         ->setFrom([$from => $fromname]);
            });

$parent = User::where('user_type','parent')
          ->where('email',$inscriptionv["email_rep"])->first() ;
echo($parent);

if(empty($parent))

       { $pass=InscriptionsvController::genererMDP(8);
        $parent = new User([
            'name' => $inscriptionv["prenom_rep"],
            'lastname' => $inscriptionv["nom_rep"],
                'username' =>$inscriptionv["nom_rep"].$inscriptionv["prenom_rep"],
               'user_type'=> "parent",
               'password'=>  bcrypt($pass) ,
               "email"=>$inscriptionv["email_rep"],
               "tel"=>$inscriptionv["tel"],
              "adresse"=>$inscriptionv["ville"],

        ]);
        $parent->save();
                $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('lyceealmanahel@gmail.com'); //adresse email
        $swiftTransport->setPassword('lyceealmanahel2020'); // mot de passe email
        $swiftMailer = new Swift_Mailer($swiftTransport);
         Mail::setSwiftMailer($swiftMailer);
         $to=$parent["email"];
            $fromname='Almanahel Academy';
           $from='almanahelacademy@gmail.com';
          $sujet="AlManahel Academy - inscription de votre fils/fille ".$eleve['name'].' '.$eleve['lastname']. " est validée";
          $contenu='Bonjour ,'.$parent['name'].' '.$parent['lastname'].'<br>
                 L"inscription de votre fils/fille '.$eleve['name'].' ' .$eleve['lastname']. ' à AlManahel est validée.'.'<br>
                  Vos codes d"accès :'.'<br>
                   E-mail :'.$parent['email'].'<br>
                   Mot de passe :'.$pass;
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu,$from,$fromname    ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                       ->setFrom([$from => $fromname]);

            }); }
             else{
                $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('lyceealmanahel@gmail.com'); //adresse email
        $swiftTransport->setPassword('lyceealmanahel2020'); // mot de passe email
        $swiftMailer = new Swift_Mailer($swiftTransport);
         Mail::setSwiftMailer($swiftMailer);
         $to=$parent["email"];
           $fromname='Almanahel Academy';
  $from='almanahelacademy@gmail.com';


         $sujet="AlManahel Academy - inscription de votre fils/fille ".$eleve['name'].' '.$eleve['lastname']. " est validée";
          $contenu='Bonjour ,'.$parent['name'].' '.$parent['lastname'].'<br>
                L"inscription de votre fils/fille '.$eleve['name'].' ' .$eleve['lastname']. ' à AlManahel est validée.'.'<br>';
                 
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu ,$from ,$fromname   ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                       ->setFrom([$from => $fromname]);
             }); }
        Inscriptionv::where('id', $inscriptionv['id'])->update(['ideleve' => $eleve["id"],'idparent' => $parent["id"]]);
         DB::table('parents_eleve')->insert(
               ['parent' => $parent['id'],
                'eleve' => $eleve["id"]]

            );
          
 Inscription::where('id', $ins['id'])->update(['ideleve' => $eleve["id"],'idparent' => $parent["id"],'valide'  => 1]);
        $to=trim('hammalisirine95@gmail.com');
        $type='notif demande Pré-inscription';
        //$nomp=$parent->name. ' '.$parent->lastname ;
        $sujet="Notification -inscription ".$inscriptionv['prenom']." ". $inscriptionv['nom']." ";
        $contenu="Bonjour,<br>
        Nous vous informons que l'Élève ".$inscriptionv['prenom']." ". $inscriptionv['nom']." a été inscit dans votre Lycée <br>";
        
        
        $data=array('destinataire'=>$to,'sujet'=>$sujet,'contenu'=>$contenu,'type'=>$type);
        $request = new Request($data);
        //\App\Http\Controllers\EnvoyesController::sendnotif($request);
         app('\App\Http\Controllers\EnvoyesController')->sendnotif($request);
        $to=trim('lyceealmanahel@gmail.com');
        $type='notif demande Pré-inscription';
        //$nomp=$parent->name. ' '.$parent->lastname ;
        $sujet="Notification -inscription ".$inscriptionv['prenom']." ". $inscriptionv['nom']." ";
        $contenu="Bonjour,<br>
        Nous vous informons que l'Élève ".$inscriptionv['prenom']." ". $inscriptionv['nom']." a été inscit dans votre Lycée <br>";
        
        
        $data=array('destinataire'=>$to,'sujet'=>$sujet,'contenu'=>$contenu,'type'=>$type);
        $request = new Request($data);
        //\App\Http\Controllers\EnvoyesController::sendnotif($request);
         app('\App\Http\Controllers\EnvoyesController')->sendnotif($request);
        $to=trim('hammalisirine120@gmail.com');
        $type='notif demande Pré-inscription';
        //$nomp=$parent->name. ' '.$parent->lastname ;
        $sujet="Notification -inscription ".$inscriptionv['prenom']." ". $inscriptionv['nom']." ";
        $contenu="Bonjour,<br>
        Nous vous informons que l'Élève ".$inscriptionv['prenom']." ". $inscriptionv['nom']." a été inscit dans votre Lycée <br>";
        
        
        $data=array('destinataire'=>$to,'sujet'=>$sujet,'contenu'=>$contenu,'type'=>$type);
        $request = new Request($data);
        //\App\Http\Controllers\EnvoyesController::sendnotif($request);
         app('\App\Http\Controllers\EnvoyesController')->sendnotif($request);

            return redirect('/inscriptionsv')->with('success', '  ajouté  avec succès');
            
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
 public static function checkexiste2(Request $request)
    {
        $val =  trim($request->get('val'));
       
     
     $count =  Inscription::where('id', $val)
              ->where('annee', date('Y', strtotime('0 year')))
              ->whereNotNull('ideleve')
               ->whereNotNull('idparent')
              ->where('valide',1)
              ->count();

     return $count;

    }
    public function view($id)
    {


        $inscriptionv = Inscriptionv::find($id);

           
            


        //$roles = DB::table('roles')->get();

        return view('inscriptionsv.view',compact('inscriptionv','id'));

    }
      public function index()
    {
    $inscriptionsv =Inscriptionv::orderBy('created_at', 'desc')->get() ;                     
         return view('inscriptionsv.index',  ['inscriptionsv' => $inscriptionsv]);        
         
  }
  
       public function annee($annee)
    {
    $inscriptionsv =Inscriptionv::orderBy('created_at', 'desc')->where('annee',$annee)->get() ;                     
         return view('inscriptionsv.index',  ['inscriptionsv' => $inscriptionsv]);        
         
  }
  
  
  public function destroy($id)
    {
        $inscriptionv = Inscriptionv::find($id);
         $inscriptionv->delete();

        return redirect('/inscriptionsv')->with('success', '  supprimé avec succès');
    }
        public function edit3($id)
    {
 
        $inscriptionv = Inscriptionv::find($id);

        return view('inscriptionsv.edit3',  compact('inscriptionv','id'));
    }
/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update1(Request $request, $id)
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
  $inscriptionv = Inscriptionv::find($id);
        
    

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

if( ($request->get('eleve'))!=null) { $inscriptionv->eleve = $request->get('eleve');}
      if( ($request->get('nom'))!=null) { $inscriptionv->nom = $request->get('nom');}
         if( ($request->get('prenom'))!=null) { $inscriptionv->prenom = $request->get('prenom');}
      if( ($request->get('datenaissance'))!=null) { $inscriptionv->datenaissance = $request->get('datenaissance');}
       if( ($request->get('etablissement'))!=null) { $inscriptionv->etablissement = $request->get('etablissement');}
      if( ($request->get('type_etabliss'))!=null) { $inscriptionv->type_etabliss = $request->get('type_etabliss');}
        if( ($request->get('etablissement'))!=null) { $inscriptionv->etablissement = $request->get('etablissement');}
      if( ($request->get('niveau'))!=null) { $inscriptionv->niveau = $request->get('niveau');}
      if( ($request->get('section'))!=null) { $inscriptionv->section = $request->get('section');}
       if( ($request->get('frere'))!=null) { $inscriptionv->frere = $request->get('frere');}
           if( ($request->get('moyenne_1'))!=null) { $inscriptionv->moyenne_1 = $request->get('moyenne_1');}
       if( ($request->get('moyenne_2'))!=null) { $inscriptionv->moyenne_2 = $request->get('moyenne_2');}
           if( ($request->get('moyenne_3'))!=null) { $inscriptionv->moyenne_3 = $request->get('moyenne_3');}
       if( ($request->get('moyenne_gmoyenne_g'))!=null) { $inscriptionv->moyenne_g = $request->get('moyenne_g');}
        if( ($request->get('clubs'))!=null) { $inscriptionv->clubs = $request->get('clubs');}
      if( ($request->get('heure_12h'))!=null) { $inscriptionv->heure_12h = $request->get('heure_12h');}
    if( ($request->get('heure_17h'))!=null) { $inscriptionv->heure_17h = $request->get('heure_17h');}

       if( ($request->get('vendredi'))!=null) { $inscriptionv->vendredi = $request->get('vendredi');}
        if( ($request->get('samedi'))!=null) { $inscriptionv->samedi = $request->get('samedi');}
       if( ($request->get('dimanche'))!=null) { $inscriptionv->dimanche = $request->get('dimanche');}
           if( ($request->get('civilite'))!=null) { $inscriptionv->civilite = $request->get('civilite');}
       if( ($request->get('prenom_rep'))!=null) { $inscriptionv->prenom_rep = $request->get('prenom_rep');}
        if( ($request->get('nom_rep'))!=null) { $inscriptionv->nom_rep = $request->get('nom_rep');}
       if( ($request->get('ville'))!=null) { $inscriptionv->ville = $request->get('ville');}
       if( ($request->get('tel'))!=null) { $inscriptionv->tel = $request->get('tel');}
       if( ($request->get('tel2'))!=null) { $inscriptionv->tel2 = $request->get('tel2');}
       if( ($request->get('email'))!=null) { $inscriptionv->email = $request->get('email');}
       if( ($request->get('email_rep'))!=null) { $inscriptionv->email_rep = $request->get('email_rep');}
       if( ($request->get('annee'))!=null) { $inscriptionv->annee = $request->get('annee');}
        if( ($request->get('nomclub'))!=null) { $inscriptionv->nomclub = $request->get('nomclub');}
        if( ($request->get('nomclubautre'))!=null) { $inscriptionv->nomclubautre = $request->get('nomclubautre');}
     //   $user->email = $request->get('email');
      //  $user->user_type = $request->get('user_type');

        //$data['id'] = $id;
        $inscriptionv->save();
      
 
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
          Inscriptionv::where('id', $inscriptionv['id'])->update(['bulletin2' => $name2,'bulletin1' => $name1]);
         


        return redirect('/inscriptionsv')->with('success', ' mise à jour avec succès');    }

         public function updating(Request $request)
    {

        $id= $request->get('inscription');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
          Inscriptionv::where('id', $id)->update(array($champ => $val));

  
    }
  
   


}

