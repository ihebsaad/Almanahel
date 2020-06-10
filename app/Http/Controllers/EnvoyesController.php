<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Envoye ;
    use App\Document ;
 use DB;
 use Swift_Mailer;
 use Mail;
use Illuminate\Support\Facades\Auth;

class EnvoyesController extends Controller
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
 
$user = auth()->user();
 $iduser=$user->id;
 
        $envoyes = Envoye::orderBy('id', 'desc')->where('emetteur',$iduser)->where('type','communication')
		->get();
        return view('envoyes.index',[ ], compact('envoyes'));
    }

 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
 
$user = auth()->user();
 $iduser=$user->id;
 
        $attachements=   Document::where(function ($query) use($iduser/*,$idenv*/) {
            $query->where('emetteur',$iduser );
              //  ->orWhereIn('envoye_id',$idenv );
        })->orWhere(function ($query) use($iduser) {
            $query->Where('destinataire','=',$iduser );
        })->orderBy('created_at', 'desc')
            ->distinct()
            ->get();

        return view('envoyes.send' ,['attachements'=>$attachements] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	 
	  		 
        $envoyes = new Envoye([
              'emetteur' =>trim( $request->get('emetteur')),
             'destinataire' => trim($request->get('destinataire')),
             'sujet' => trim($request->get('sujet')),
             'contenu' => trim($request->get('contenu'))
             
        ]);

        $envoyes->save();
        return redirect('/envoyes')->with('success', ' ajouté avec succès');

    }


    public function saving(Request $request)
    {
        if( ($request->get('titre'))!=null) {

            $envoye = new Envoye([
                'titre' => $request->get('titre')

            ]);
            if ($envoye->save())
            { $id=$envoye->id;

                return url('/envoyes/view/'.$id)/*->with('success', 'Dossier Créé avec succès')*/;
            }

            else {
                return url('/envoyes');
            }
        }

    }
	
	
public function sending(Request $request)
    {
 	 $to= $request->get('destinataire') ;
	 $sujet= $request->get('sujet') ;
	 $contenu= $request->get('contenu') ;
	 $attachs = $request->get('attachs');
	 $destination = $request->get('destination');

$user = auth()->user();
 $iduser=$user->id;
 
	
 $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('lyceealmanahel@gmail.com'); //adresse email
        $swiftTransport->setPassword('lyceealmanahel2020'); // mot de passe email
		
        $swiftMailer = new Swift_Mailer($swiftTransport);
		Mail::setSwiftMailer($swiftMailer);
		$from='almanahelacademy@gmail.com';
		$fromname='Almanahel Academy';
		
		
		if( $destination=='personne' ){
			
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu,$from,$fromname ,$attachs ,$iduser  ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                    ->setFrom([$from => $fromname]);         
		
		    $count=0;
				if(isset($attachs)){
		      foreach($attachs as $attach) {
                  $count++;
                 $path=$this->PathattachById($attach);
 				       $fullpath = storage_path()."/documents/".$path;

                    $path_parts = pathinfo($fullpath);
                    if (isset( $path_parts['extension']))
                   { $ext=  $path_parts['extension'];}else{
                $ext="";
                    }

    $name=basename($fullpath);
      $mime_content_type=mime_content_type ($fullpath);
                 $message->attach($fullpath, array(
                         'as' =>$name,
                         'mime' => $mime_content_type)
                );
              $filesize= filesize($fullpath);

                $counta2= Document::where('taille',$filesize)->where('chemin', $name )->count();

                if($counta2==0)
                {
                // DB::table('attachements')->insert([
                   $doc = new Document([


			'titre' =>$path,
             'description' =>'attachement',
             'chemin'=> $path,
             'emetteur' => $iduser,
           //  'envoye' =>  $id,
           //   'type' => $destinataire->user_type,
          //////   'destinataire' => $to,
   
			]);
                    $doc->save();

                }

            }
		
		}
		 });
		
		
	}else{
		$to='';
		$emails =array();
		 if($destination=='eleves'){
			 $emails = DB::table('users')
                  ->where('user_type','eleve' )
                ->pluck('email');
				$to='Tous les élèves';
       }
	   		 if($destination=='parents'){

          $emails = DB::table('users')
                  ->where('user_type','parent' )
                ->pluck('email');
		 $to='Tous les parents';
	
			 }
		
		if($destination=='profs'){
			 $emails = DB::table('users')
                  ->where('user_type','prof' )
                ->pluck('email');
		 $to='Tous les enseignants';
		
		}
 
	  $emails=$emails->toArray() ;
	  $chunks = array_chunk($emails, 30);

        // parcours divisions
        foreach ($chunks as $chunk)
        {
		 
		//  $to='ihebsaad@gmail.com';
		 
		 
		  Mail::send([], [], function ($message) use ($to,$sujet, $contenu,$from,$fromname ,$attachs ,$iduser,$chunk  ) {
                $message
                   // ->to($to)
					->bcc($chunk ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                    ->setFrom([$from => $fromname]);         
		
		    $count=0;
				if(isset($attachs)){

		      foreach($attachs as $attach) {
                  $count++;
                 $path=$this->PathattachById($attach);
 				       $fullpath = storage_path()."/documents/".$path;

                    $path_parts = pathinfo($fullpath);
                    if (isset( $path_parts['extension']))
                   { $ext=  $path_parts['extension'];}else{
                $ext="";
                    }

    $name=basename($fullpath);
      $mime_content_type=mime_content_type ($fullpath);
                 $message->attach($fullpath, array(
                         'as' =>$name,
                         'mime' => $mime_content_type)
                );
              $filesize= filesize($fullpath);

                $counta2= Document::where('taille',$filesize)->where('chemin', $name )->count();

                if($counta2==0)
                {
                    $doc = new Document([
 
			'titre' =>$path,
             'description' =>'attachement',
             'chemin'=> $path,
             'emetteur' => $iduser,
    
			]);
                    $doc->save();

                }

            }
		
				}
		 });
		 
		} //foreach chunk
		 

		
	}  // else envoi multiple
	 
	 
		
			$envoye  = new Envoye([
              'emetteur' => ( $request->get('emetteur')),
             'destinataire' => $to  ,
             'sujet' => trim($request->get('sujet')),
             'contenu' => trim($request->get('contenu')),
             'type' => 'communication'
								]);
			
		
		 if ($envoye->save())
            { $id=$envoye->id;
            	$des=$envoye->destinataire;
            	$destinataire = DB::table('users')
                  ->where('email',$des)
                ->first();
             $name='';
       if($request->file('document')!=null)
    {$document=$request->file('document');
     $name =$document->getClientOriginalName();
     $path = storage_path()."/documents/";
     $document->move($path, $name);
 $document = new Document([
             'titre' =>$envoye['type'],
             'description' =>$envoye['contenu'],
             'chemin'=> $name,
             'emetteur' => $envoye['emetteur'],
             'envoye' =>  $id,
              'type' => $destinataire->user_type,
             'destinataire' => $destinataire->id,
            // 'par'=> $request->get('p,ar'),ville
        ]);
     $document->save();}
                return redirect('/envoyes/view/'.$id)->with('success', 'Envoyé avec succès') ;
            }
		  else{
			  return redirect('/envoyes' )  ;
 		}
 		
		 
	
	}


   public static function PathattachById($id)
    {
        $attach = Document::find($id);

        if (isset($attach['chemin'])) {
            return $attach['chemin'];
        }else{return '';}
    }

	
	  public function sendnotif(Request $request)
    {
 	 $to= $request->get('destinataire') ;
	 $sujet= $request->get('sujet') ;
	 $contenu= $request->get('contenu') ;
	 $type= $request->get('type') ;
	 if (Auth::check()) {
		$id=Auth::id();
	 } else{$id=0;}

 $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('lyceealmanahel@gmail.com'); //adresse email
        $swiftTransport->setPassword('lyceealmanahel2020'); // mot de passe email
		
        $swiftMailer = new Swift_Mailer($swiftTransport);
		Mail::setSwiftMailer($swiftMailer);
		$from='almanahelacademy@gmail.com';
		$fromname='Almanahel Academy';
        
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu,$from,$fromname    ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                    ->setFrom([$from => $fromname]);
					   ;
            });
		 
			$envoye  = new Envoye([
              'emetteur' =>   $id  ,
             'destinataire' => trim($request->get('destinataire')),
             'sujet' => trim($request->get('sujet')),
             'contenu' => trim($request->get('contenu')),
             'type' => $type
								]);
		
		 if ($envoye->save())
            {  
                return true ;
            }
 
		  else{
			  return false  ;

 		}
		  
	
	}



	  public function sendmessage(Request $request)
    {
 	 $to= $request->get('destinataire') ;
	 $sujet= $request->get('sujet') ;
	 $nom= $request->get('nom') ;
	 $email= $request->get('email') ;
	 $tel= $request->get('tel') ;
	 $mess= $request->get('contenu') ;
	 $type= $request->get('type') ;
	 if (Auth::check()) {
		$id=Auth::id();
	 } else{$id=0;}
	 
	 $contenu='Nom : '.$nom.'<br>
			Email: '.$email.'<br>
			Tel: '.$tel.'<br>
			Message: '.$mess.'<br>';
 
 $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('lyceealmanahel@gmail.com'); //adresse email
        $swiftTransport->setPassword('lyceealmanahel2020'); // mot de passe email
		
        $swiftMailer = new Swift_Mailer($swiftTransport);
		Mail::setSwiftMailer($swiftMailer);
		$from='almanahelacademy@gmail.com';
		$fromname='Almanahel Academy';
        
		$dests = array("ihebsaad@gmail.com", "saadiheb@gmail.com" );

             Mail::send([], [], function ($message) use ($to,$sujet, $contenu,$from,$fromname ,$dests   ) {
                $message
                   // ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                    ->setFrom([$from => $fromname]);
					   ;
					  
				foreach($dests as $dest)
				{
			  $message->to($dest);
				}	  
					  
            });
			
		 
			$envoye  = new Envoye([
              'emetteur' =>   $id  ,
             'destinataire' => 'Administration',
             'sujet' => trim($request->get('sujet')),
             'contenu' => trim($request->get('contenu')),
             'type' => $type
								]);
		
		 if ($envoye->save())
            {  
             }
 
		  else{
 
 		}
		  
	
	}




 public function sendmessagef(Request $request)
    {
 	 $to= $request->get('destinataire') ;
	 $sujet= $request->get('sujet') ;
	 $nom= $request->get('nom') ;
	 $email= $request->get('email') ;
	 $tel= $request->get('tel') ;
	 $mess= $request->get('contenu') ;
	 $adresse= $request->get('adresse') ;
	 $qualification= $request->get('qualification') ;
	 $type= $request->get('type') ;
	 $diplome= $request->get('diplome') ;
	 $naissance= $request->get('naissance') ;
	 $demande= $request->get('demande') ;
	 if (Auth::check()) {
		$id=Auth::id();
	 } else{$id=0;}
	 
	 $contenu= 'Nom : '.$nom.'<br>
			Email: '.$email.'<br>
			Adresse: '.$adresse.'<br>
			Tel: '.$tel.'<br>
			Diplome: '.$diplome.'<br>
			Type de demande: '.$demande.'<br>
			Qualification: '.$qualification.'<br>
			Message: '.$mess.'<br>';
 
 $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('lyceealmanahel@gmail.com'); //adresse email
        $swiftTransport->setPassword('lyceealmanahel2020'); // mot de passe email
		
        $swiftMailer = new Swift_Mailer($swiftTransport);
		Mail::setSwiftMailer($swiftMailer);
		$from='almanahelacademy@gmail.com';
		$fromname='Almanahel Academy';
        
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu,$from,$fromname    ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                    ->setFrom([$from => $fromname]);
					   ;
            });
		 
			$envoye  = new Envoye([
              'emetteur' =>   $id  ,
             'destinataire' => trim($request->get('destinataire')),
             'sujet' => trim($request->get('sujet')),
             'contenu' => trim($request->get('contenu')),
             'type' => $type
								]);
		
		 if ($envoye->save())
            {  
             }
 
		  else{
 
 		}
		  
	
	}



    public function updating(Request $request)
    {

        $id= $request->get('envoye');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
       Envoye::where('id', $id)->update(array($champ => $val));
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
  
        $envoye = Envoye::find($id);
        return view('envoyes.view' , ['envoye'=>$envoye]);

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
		 
        $envoye  = Envoye::find($id);
		
 
		 Envoye::where('id',$id)->update(
		array(
			'eleve' =>trim( $request->get('eleve')),
             'classe' => trim($request->get('classe')),
             'details' => trim($request->get('details')),
             'seance' => trim($request->get('seance')),
             'debut' => trim($request->get('debut')),
             'fin' => trim($request->get('fin')),
		)
		);	
			
		 
		
        return redirect('/envoyes/view/'.$id)->with('success', ' Modifié avec succès');
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
        $envoyes = Envoye::find($id);
        $envoyes->delete();

        return redirect('/envoyes')->with('success', '  Supprimé avec succès');
    }

 
 


}

