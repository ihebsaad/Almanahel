<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
    use App\Envoye ;
 use DB;
 use Swift_Mailer;
 use Mail;

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

        $envoyes = Envoye::orderBy('id', 'desc')->get();
        return view('envoyes.index',[ ], compact('envoyes'));
    }

 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
 
        return view('envoyes.send'  );
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
	 

 $swiftTransport =  new \Swift_SmtpTransport( 'smtp.gmail.com', '587', 'tls');
        $swiftTransport->setUsername('ihebs002@gmail.com'); //adresse email
        $swiftTransport->setPassword('ihebssss'); // mot de passe email
		
        $swiftMailer = new Swift_Mailer($swiftTransport);
        if (Mail::setSwiftMailer($swiftMailer);
             Mail::send([], [], function ($message) use ($to,$sujet, $contenu    ) {
                $message
                    ->to($to)
                    //   ->cc($cc  ?: [])
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html');
            });
		){
			$envoyes = new Envoye([
              'emetteur' =>trim( $request->get('emetteur')),
             'destinataire' => trim($request->get('destinataire')),
             'sujet' => trim($request->get('sujet')),
             'contenu' => trim($request->get('contenu'))
             
        ]);
		
		}
		  
	
	}

    public function updating(Request $request)
    {

        $id= $request->get('envoye');
        $champ= strval($request->get('champ'));
       $val= $request->get('val');
       Envoye::where('id', $id)->update(array('visible' => $val));

 
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

