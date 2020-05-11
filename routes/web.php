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
Route::get('/presentation', array('as' => 'presentation','uses' => 'HomeController@presentation'));
Route::get('/formation', array('as' => 'formation','uses' => 'HomeController@formation'));
Route::get('/scolaire', array('as' => 'scolaire','uses' => 'HomeController@scolaire'));
Route::get('/inscription', array('as' => 'inscription','uses' => 'HomeController@inscription'));
Route::get('/contact', array('as' => 'contact','uses' => 'HomeController@contact'));

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
Route::get('/actualites/destroy/{id}', 'ActualitesController@destroy');
Route::get('/actualites/destroy/{id}', 'ActualitesController@destroy');
Route::get('/actualites/create/', 'ActualitesController@create')->name('actualites.create');
Route::post('/actualites/store/', 'ActualitesController@store')->name('actualites.store');
 
 
 
 /*** Users **/

//Route::resource('/users',  'UsersController');
Route::get('/users', array('as' => 'users','uses' => 'UsersController@index'));
Route::get('/profs', array('as' => 'profs','uses' => 'UsersController@profs'));
Route::get('/eleves', array('as' => 'eleves','uses' => 'UsersController@eleves'));
Route::get('/parents', array('as' => 'parents','uses' => 'UsersController@parents'));
Route::get('/personnels', array('as' => 'personnels','uses' => 'UsersController@personnels'));

Route::get('/users/create','UsersController@create')->name('users.create');
Route::post('/users/saving','UsersController@saving')->name('users.saving');
Route::post('/users/updating','UsersController@updating')->name('users.updating');
Route::get('/users/view/{id}', 'UsersController@view');
Route::get('/users/profile/{id}', 'UsersController@profile')->name('profile');
Route::post('/users/createuserrole', 'UsersController@createuserrole')->name('users.createuserrole');
Route::post('/users/removeuserrole', 'UsersController@removeuserrole')->name('users.removeuserrole');
Route::post('/users/sessionroles', 'UsersController@sessionroles')->name('users.sessionroles');
Route::post('/users/createeleve','UsersController@createeleve')->name('users.createeleve');
Route::post('/users/removeeleve','UsersController@removeeleve')->name('users.removeeleve');
Route::post('/changestatut', 'UsersController@changestatut')->name('users.changestatut');
Route::get('/users/destroy/{id}', 'UsersController@destroy');
Route::post('/edit/{id}','UsersController@update');

/****  Contenus  *****/

Route::get('/contenuhome', array('as' => 'contenuhome','uses' => 'HomeController@contenu_home'));
Route::get('/contenupresentation', array('as' => 'contenupresentation','uses' => 'HomeController@contenu_presentation'));
Route::get('/contenuformation', array('as' => 'contenuformation','uses' => 'HomeController@contenu_formation'));
Route::get('/contenuscolaire', array('as' => 'contenuscolaire','uses' => 'HomeController@contenu_scolaire'));
Route::get('/contenucontact', array('as' => 'contenucontact','uses' => 'HomeController@contenu_contact'));
Route::get('/contenuinscription', array('as' => 'contenuinscription','uses' => 'HomeController@contenu_inscription'));

/****  Messages chat  *****/
Route::get('/messagerie', 'MessageChatController@index')->name('message');
Route::get('/fetchuser/{id}', 'MessageChatController@fetchUser');
Route::get('/insertchat/', 'MessageChatController@insertchat');
Route::get('/fetch_user_chat_history/{to_user_id}', 'MessageChatController@fetch_user_chat_history');
Route::get('/update_is_type_status/{from_user_id}', 'MessageChatController@update_is_type_status');


