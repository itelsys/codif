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
    return redirect('/codification');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->middleware('is_admine');
// Route::post('register', 'Auth\RegisterController@register')->middleware('is_admine');



    // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



Route::get('/registeration', 'RegisterationController@index')->middleware('is_admine');
Route::post('/registeration', 'RegisterationController@store');


Route::get('/codification', 'HomeController@index');
Route::get('/plan/{document}', 'DocumentController@show');
Route::get('/recherche', 'DocumentController@index');
Route::get('/recherche', 'DocumentController@show');
Route::post('/codification', 'HomeController@index');
Route::patch('/recherche', 'DocumentController@update');

Route::get('/codifPlan', 'CodplanController@index');
Route::post('/codifPlan', 'CodplanController@index');
Route::get('/rechercheplan', 'Recherche@index');
Route::get('/rechercheplan', 'Recherche@show');
Route::patch('/rechercheplan', 'Recherche@update');

Route::get('/site', 'Sitecontroller@index')->middleware('is_sup_admine');
Route::patch('/site', 'Sitecontroller@update');
Route::post('/site', 'SiteController@store');
Route::delete('/site/{site}', 'Sitecontroller@destroy');

Route::post('/codification/insertSite', 'DocumentController@store');
Route::post('/codifPlan/insertPlan', 'CodplanController@store');

Route::get('/projet', 'ProjectController@index')->middleware('is_sup_admine');
Route::patch('/projet', 'ProjectController@update');
Route::post('/projet', 'ProjectController@store');
Route::delete('/projet/{project}', 'ProjectController@destroy');

Route::get('/departement', 'DepartementController@index')->middleware('is_sup_admine');
Route::patch('/departement', 'DepartementController@update');
Route::post('/departement', 'DepartementController@store');
Route::delete('/departement/{departement}', 'DepartementController@destroy');

Route::get('/document', 'DocumentTypeController@index')->middleware('is_sup_admine');
Route::patch('/document', 'DocumentTypeController@update');
Route::post('/document', 'DocumentTypeController@store');
Route::delete('/document/{document_type}', 'DocumentTypeController@destroy');

Route::get('/action', 'ActionsController@index')->middleware('is_admine');
Route::post('/action', 'ActionsController@show');

Route::get('/atelier', 'AtelierController@index')->middleware('is_sup_admine');
Route::patch('/atelier', 'AtelierController@update');
Route::post('/atelier', 'AtelierController@store');
Route::delete('/atelier/{atelier}', 'AtelierController@destroy');

Route::get('/ligne', 'LigneController@index')->middleware('is_sup_admine');
Route::patch('/ligne', 'LigneController@update');
Route::post('/ligne', 'LigneController@store');
Route::delete('/ligne/{ligne}', 'LigneController@destroy');

Route::get('/sous-atelier', 'SousAtelierController@index')->middleware('is_sup_admine');
Route::patch('/sous-atelier', 'SousAtelierController@update');
Route::post('/sous-atelier', 'SousAtelierController@store');
Route::delete('/sous-atelier/{sousAtelier}', 'SousAtelierController@destroy');

Route::get('/equipement', 'EquipementController@index')->middleware('is_sup_admine');
Route::patch('/equipement', 'EquipementController@update');
Route::post('/equipement', 'EquipementController@store');
Route::delete('/equipement/{equipement}', 'EquipementController@destroy');


Route::get('/plan', 'PlanController@index')->middleware('is_sup_admine');
Route::patch('/plan', 'PlanController@update');
Route::post('/plan', 'PlanController@store');
Route::delete('/plan/{plan}', 'PlanController@destroy');

Route::get('utilisateurs', 'UsersController@index')->middleware('is_admine');
Route::patch('utilisateurs', 'RegisterationController@update');
Route::delete('/utilisateurs/{user}', 'UsersController@destroy');

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

