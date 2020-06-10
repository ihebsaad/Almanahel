<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/home', array('as' => 'home','uses' => 'HomeController@home'));
Route::get('/admin', array('as' => 'admin','uses' => 'HomeController@admin'));
Route::get('/presentation', array('as' => 'presentation','uses' => 'HomeController@presentation'));
Route::get('/formation', array('as' => 'formation','uses' => 'HomeController@formation'));
Route::get('/scolaire', array('as' => 'scolaire','uses' => 'HomeController@scolaire'));
Route::get('/inscription', array('as' => 'inscription','uses' => 'HomeController@inscription'));
Route::get('/bienvenue', array('as' => 'bienvenue','uses' => 'HomeController@bienvenue'));
Route::get('/contact', array('as' => 'contact','uses' => 'HomeController@contact'));
Route::get('/resultats', array('as' => 'resultats','uses' => 'HomeController@resultats'));
Route::get('/alumni', array('as' => 'alumni','uses' => 'HomeController@alumni'));
Route::get('/sections', array('as' => 'alumni','uses' => 'HomeController@sections'));
Route::get('/mot', array('as' => 'alumni','uses' => 'HomeController@mot'));

Route::post('/updatecontent', array('as' => 'home.updatecontent','uses' => 'HomeController@updatecontent'));

Auth::routes();



// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');
$this->post('changerposte', 'Auth\LoginController@changerposte')->name('changerposte');
$this->get('changerposte', 'Auth\LoginController@changerposte')->name('changerposte');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');


// Password Reset Routes...
$this->get('password/request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');;
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
$this->post('password/reset/{token}', 'Auth\ResetPasswordController@reset');




/*** Actualites  **/
//Route::resource('/actualites',  'ActualitesController');
Route::get('/actualites', array('as' => 'actualites','uses' => 'ActualitesController@index'));
Route::post('/actualites/saving','ActualitesController@saving')->name('actualites.saving');
Route::post('/actualites/updating','ActualitesController@updating')->name('actualites.updating');
Route::get('/actualites/view/{id}', 'ActualitesController@view');
Route::get('/actualites/show/{id}', 'HomeController@show_actualite')->name('actualites.show');
Route::get('/actualites/destroy/{id}', 'ActualitesController@destroy');
Route::get('/actualites/create/', 'ActualitesController@create')->name('actualites.create');
Route::post('/actualites/store/', 'ActualitesController@store')->name('actualites.store');
Route::post('/actualites/edit/', 'ActualitesController@edit')->name('actualites.edit');
 
  

/*** Annonces  **/
 Route::get('/annonces', array('as' => 'annonces','uses' => 'AnnoncesController@index'));
Route::post('/annonces/saving','AnnoncesController@saving')->name('annonces.saving');
Route::post('/annonces/updating','AnnoncesController@updating')->name('annonces.updating');
Route::get('/annonces/view/{id}', 'AnnoncesController@view');
Route::get('/annonces/show/{id}', 'HomeController@show_annonce')->name('annonces.show');
Route::get('/annonces/destroy/{id}', 'AnnoncesController@destroy');
Route::get('/annonces/create/', 'AnnoncesController@create')->name('annonces.create');
Route::post('/annonces/store/', 'AnnoncesController@store')->name('annonces.store');
Route::post('/annonces/edit/', 'AnnoncesController@edit')->name('annonces.edit');
 

/*** Evenements  **/
 Route::get('/evenements', array('as' => 'evenements','uses' => 'EvenementsController@index'));
Route::post('/evenements/saving','EvenementsController@saving')->name('evenements.saving');
Route::post('/evenements/updating','EvenementsController@updating')->name('evenements.updating');
Route::get('/evenements/view/{id}', 'EvenementsController@view');
Route::get('/evenements/destroy/{id}', 'EvenementsController@destroy');
Route::get('/evenements/create/', 'EvenementsController@create')->name('evenements.create');
Route::post('/evenements/store/', 'EvenementsController@store')->name('evenements.store');
Route::post('/evenements/edit/', 'EvenementsController@edit')->name('evenements.edit');
 
 
 
/*** Retards  **/
 Route::get('/retards', array('as' => 'retards','uses' => 'RetardsController@index'));
Route::post('/retards/saving','RetardsController@saving')->name('retards.saving');
Route::post('/retards/updating','RetardsController@updating')->name('retards.updating');
Route::get('/retards/view/{id}', 'RetardsController@view');
Route::get('/retards/destroy/{id}', 'RetardsController@destroy');
Route::get('/retards/create/', 'RetardsController@create')->name('retards.create');
Route::post('/retards/store/', 'RetardsController@store')->name('retards.store');
Route::post('/retards/edit/', 'RetardsController@edit')->name('retards.edit');
 Route::get('/retards/annee/{annee}', 'RetardsController@annee')->name('retards.annee');

 
 
/*** Absences  **/
 Route::get('/absences', array('as' => 'absences','uses' => 'AbsencesController@index'));
Route::post('/absences/saving','AbsencesController@saving')->name('absences.saving');
Route::post('/absences/updating','AbsencesController@updating')->name('absences.updating');
Route::get('/absences/view/{id}', 'AbsencesController@view');
Route::get('/absences/destroy/{id}', 'AbsencesController@destroy');
Route::get('/absences/create/', 'AbsencesController@create')->name('absences.create');
Route::post('/absences/store/', 'AbsencesController@store')->name('absences.store');
Route::post('/absences/edit/', 'AbsencesController@edit')->name('absences.edit');
 Route::get('/absences/annee/{annee}', 'AbsencesController@annee')->name('absences.annee');

  
 
/*** Paiements  **/
 Route::get('/paiements', array('as' => 'paiements','uses' => 'PaiementsController@index'));
Route::post('/paiements/saving','PaiementsController@saving')->name('paiements.saving');
Route::post('/paiements/updating','PaiementsController@updating')->name('paiements.updating');
Route::get('/paiements/view/{id}', 'PaiementsController@view');
Route::get('/paiements/destroy/{id}', 'PaiementsController@destroy');
Route::get('/paiements/create/', 'PaiementsController@create')->name('paiements.create');
Route::post('/paiements/store/', 'PaiementsController@store')->name('paiements.store');
Route::post('/paiements/edit/', 'PaiementsController@edit')->name('paiements.edit');
 Route::get('/paiements/annee/{annee}', 'PaiementsController@annee')->name('paiements.annee');

  
/*** Depenses  **/
 Route::get('/depenses', array('as' => 'depenses','uses' => 'DepensesController@index'));
Route::post('/depenses/saving','DepensesController@saving')->name('depenses.saving');
Route::post('/depenses/updating','DepensesController@updating')->name('depenses.updating');
Route::get('/depenses/view/{id}', 'DepensesController@view');
Route::get('/depenses/destroy/{id}', 'DepensesController@destroy');
Route::get('/depenses/create/', 'DepensesController@create')->name('depenses.create');
Route::post('/depenses/store/', 'DepensesController@store')->name('depenses.store');
Route::post('/depenses/edit/', 'DepensesController@edit')->name('depenses.edit');
 Route::get('/depenses/annee/{annee}', 'DepensesController@annee')->name('depenses.annee');

 
 
/*** Envoyes  **/
 Route::get('/envoyes', array('as' => 'envoyes','uses' => 'EnvoyesController@index'));
Route::post('/envoyes/saving','EnvoyesController@saving')->name('envoyes.saving');
 Route::post('/envoyes/sending','EnvoyesController@sending')->name('envoyes.sending');
 Route::post('/envoyes/sendnotif','EnvoyesController@sendnotif')->name('envoyes.sendnotif');
 Route::post('/envoyes/sendmessage','EnvoyesController@sendmessage')->name('envoyes.sendmessage');
 Route::post('/envoyes/sendmessagef','EnvoyesController@sendmessagef')->name('envoyes.sendmessagef');
Route::get('/envoyes/view/{id}', 'EnvoyesController@view');
Route::get('/envoyes/destroy/{id}', 'EnvoyesController@destroy');
Route::get('/envoyes/send/', 'EnvoyesController@send')->name('envoyes.send');
Route::post('/envoyes/store/', 'EnvoyesController@store')->name('envoyes.store');
Route::post('/envoyes/edit/', 'EnvoyesController@edit')->name('envoyes.edit');
Route::get('/envoyes/annee/{annee}', 'EnvoyesController@annee')->name('envoyes.annee');

 
 
 /*** Users **/

//Route::resource('/users',  'UsersController');
Route::get('/users', array('as' => 'users','uses' => 'UsersController@index'));
Route::get('/profs', array('as' => 'profs','uses' => 'UsersController@profs'));
Route::get('/eleves', array('as' => 'eleves','uses' => 'UsersController@eleves'));
Route::get('/parents', array('as' => 'parents','uses' => 'UsersController@parents'));
Route::get('/personnels', array('as' => 'personnels','uses' => 'UsersController@personnels'));
Route::get('/users', array('as' => 'users','uses' => 'UsersController@index'));
Route::get('/users/create','UsersController@create')->name('users.create');
Route::post('/users/saving','UsersController@saving')->name('users.saving');
Route::post('/users/updating','UsersController@updating')->name('users.updating');
Route::get('/users/view/{id}', 'UsersController@view');
Route::get('/users/profile/{id}', 'UsersController@profile')->name('profile');
Route::post('/users/createuserrole', 'UsersController@createuserrole')->name('users.createuserrole');
Route::post('/users/removeuserrole', 'UsersController@removeuserrole')->name('users.removeuserrole');
Route::post('/users/sessionroles', 'UsersController@sessionroles')->name('users.sessionroles');
Route::post('/changestatut', 'UsersController@changestatut')->name('users.changestatut');
Route::post('/users/createeleve','UsersController@createeleve')->name('users.createeleve');
Route::post('/users/removeeleve','UsersController@removeeleve')->name('users.removeeleve');
Route::post('/users/createparent','UsersController@createparent')->name('users.createparent');
Route::post('/users/removeparent','UsersController@removeparent')->name('users.removeparent');
Route::post('/users/createclasse','UsersController@createclasse')->name('users.createclasse');
Route::post('/users/removeclasse','UsersController@removeclasse')->name('users.removeclasse');
Route::post('/users/createclasse1','UsersController@createclasse1')->name('users.createclasse1');
Route::post('/users/removeclasse1','UsersController@removeclasse1')->name('users.removeclasse1');
Route::get('/users/destroy/{id}', 'UsersController@destroy');
Route::post('/edit/{id}','UsersController@update');

/****  Contenus  *****/

Route::get('/contenuhome', array('as' => 'contenuhome','uses' => 'HomeController@contenu_home'));
Route::get('/contenupresentation', array('as' => 'contenupresentation','uses' => 'HomeController@contenu_presentation'));
Route::get('/contenuformation', array('as' => 'contenuformation','uses' => 'HomeController@contenu_formation'));
Route::get('/contenuscolaire', array('as' => 'contenuscolaire','uses' => 'HomeController@contenu_scolaire'));
Route::get('/contenucontact', array('as' => 'contenucontact','uses' => 'HomeController@contenu_contact'));
Route::get('/contenuinscription', array('as' => 'contenuinscription','uses' => 'HomeController@contenu_inscription'));
Route::get('/contenualumni', array('as' => 'contenualumni','uses' => 'HomeController@contenu_alumni'));
Route::get('/contenuresultats', array('as' => 'contenuresultats','uses' => 'HomeController@contenu_resultats'));

/****  Messages chat  *****/
Route::get('/messagerie', 'MessageChatController@index')->name('message');
Route::get('/fetchuser/{id}', 'MessageChatController@fetchUser');
Route::get('/insertchat/', 'MessageChatController@insertchat');
Route::get('/fetch_user_chat_history/{to_user_id}', 'MessageChatController@fetch_user_chat_history');
Route::get('/update_is_type_status/{from_user_id}', 'MessageChatController@update_is_type_status');
/*** classes **/

Route::get('/classes/create','ClassesController@create')->name('classes.create');
Route::post('/classes/saving','ClassesController@saving')->name('classes.saving');
Route::get('/classes/view/{id}', 'ClassesController@view');
Route::get('/classes/destroy/{id}', 'ClassesController@destroy');
Route::get('/classes', array('as' => 'classes','uses' => 'ClassesController@index'));
Route::post('/classes/updating','ClassesController@updating')->name('classes.updating');
Route::post('/edit1/{id}','ClassesController@update');
Route::post('/classes/createeleveclass','ClassesController@createeleveclass')->name('classes.createeleveclass');
Route::post('/classes/removeeleveclass','ClassesController@removeeleveclass')->name('classes.removeeleveclass');
Route::post('/classes/createenseignantclass','ClassesController@createenseignantclass')->name('classes.createenseignantclass');
Route::post('/classes/removeenseignantclass','ClassesController@removeenseignantclass')->name('classes.removeenseignantclass');
Route::get('/classes/annee/{annee}', 'ClassesController@annee')->name('classes.annee');


/*** pre-Inscriptions **/
Route::get('/inscriptions/create','InscriptionsController@create')->name('inscriptions.create');
Route::get('/inscriptions/eleveainscrire','InscriptionsController@eleveainscrire')->name('inscriptions.eleveainscrire');
Route::post('/inscriptions/updating','InscriptionsController@updating')->name('inscriptions.updating');
Route::post('/inscriptions/store','InscriptionsController@store')->name('inscriptions.store');
Route::get('/inscriptions/destroy/{id}', 'InscriptionsController@destroy');
Route::get('/inscriptions', array('as' => 'inscriptions','uses' => 'InscriptionsController@index'));
Route::get('/inscriptions/view/{id}', 'InscriptionsController@view');
Route::post('/update/{id}','InscriptionsController@update');
Route::get('/inscriptions/valide/{id}', 'InscriptionsController@valide');
Route::get('/inscriptions/createfront','InscriptionsController@createfront')->name('inscriptions.create_front');
Route::post('/inscriptions/checkexiste', 'InscriptionsController@checkexiste')->name('inscriptions.checkexiste');
Route::post('/inscriptions/inscriptionsadd', 'InscriptionsController@inscriptionsadd')->name('inscriptions.inscriptionsadd');
Route::post('/inscriptions/checkexiste1', 'InscriptionsController@checkexiste1')->name('inscriptions.checkexiste1');
Route::get('/inscriptions/annee/{annee}', 'InscriptionsController@annee')->name('inscriptions.annee');



 /*** Inscriptions **/
 Route::get('/inscriptionsv/create','InscriptionsvController@create')->name('inscriptionsv.create');
Route::post('/inscriptionsv/inscriptionsadd', 'InscriptionsvController@inscriptionsadd')->name('inscriptionsv.inscriptionsadd');
Route::post('/inscriptionsv/checkexiste1', 'InscriptionsvController@checkexiste1')->name('inscriptionsv.checkexiste1');
Route::post('/inscriptionsv/inscriptionsaddnov', 'InscriptionsvController@inscriptionsaddnov')->name('inscriptionsv.inscriptionsaddnov');
Route::post('/inscriptionsv/checkexiste2', 'InscriptionsvController@checkexiste2')->name('inscriptionsv.checkexiste2');
Route::get('/inscriptionsv/destroy/{id}', 'InscriptionsvController@destroy');
Route::get('/inscriptionsv', array('as' => 'inscriptionsv','uses' => 'InscriptionsvController@index'));
Route::get('/inscriptionsv/view/{id}', 'InscriptionsvController@view');
Route::post('/update1/{id}','InscriptionsvController@update1');
Route::post('/inscriptionsv/updating','InscriptionsvController@updating')->name('inscriptionsv.updating');
Route::get('/inscriptionsv/annee/{id}', 'InscriptionsvController@annee')->name('inscriptionsv.annee');


/****  Images gestion image slider carrousel  *****/
Route::get('/mettreAjourSlider', 'ImageController@mettreAjourSlider');
Route::get('/mettreAjourSliderScolaire', 'ImageController@mettreAjourSliderScolaire');
Route::post('/ExternefileUpload/upload', 'ImageController@uploadExterneFile')->name('Upload.ExterneFile');
Route::get('/modifierimageslider', 'ImageController@modifierimageslider');
Route::get('/supimageslider/{id}', 'ImageController@supimageslider');
Route::get('/ChargerTableImagesSlider', 'ImageController@ChargerTableImagesSlider');
Route::get('/ChargerTableImagesSliderScolaire', 'ImageController@ChargerTableImagesSliderScolaire');


/*** documents **/
 Route::get('/documents/create','DocumentsController@create')->name('documents.create');
Route::post('/documents/store','DocumentsController@store')->name('documents.store');
Route::post('/documents/create','DocumentsController@create')->name('documents.create');
Route::get('/documents', array('as' => 'documents','uses' => 'DocumentsController@index'));
Route::get('/documents/view/{id}', 'DocumentsController@view');
Route::get('/documents/destroy/{id}', 'DocumentsController@destroy');
Route::get('/docsrecu', array('as' => 'docsrecu','uses' => 'DocumentsController@docsrecu'));
Route::get('/docsenv', array('as' => 'docsenv','uses' => 'DocumentsController@docsenv'));
Route::get('/documents/view/{id}', 'DocumentsController@view');
Route::post('/update3/{id}','DocumentsController@update3');
Route::post('/documents/updating','DocumentsController@updating')->name('documents.updating');
Route::get('/documents/annee/{annee}', 'DocumentsController@annee')->name('documents.annee');


/*** Excels **/
 Route::get('/excels/create','ExcelsController@create')->name('excels.create');
Route::post('/excels/store','ExcelsController@store')->name('excels.store');
Route::post('/excels/create','ExcelsController@create')->name('excels.create');
Route::get('/excels', array('as' => 'excels','uses' => 'ExcelsController@index'));
Route::get('/excels/view/{id}', 'ExcelsController@view');
Route::get('/excels/destroy/{id}', 'ExcelsController@destroy');
 Route::post('/excels/edit', 'ExcelsController@edit')->name('excels.edit');
 Route::post('/excels/updating','ExcelsController@updating')->name('excels.updating');
Route::get('/excels/annee/{annee}', 'ExcelsController@annee')->name('excels.annee');
