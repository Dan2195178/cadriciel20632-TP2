<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\UploadsController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;

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
    return view('welcome');
});


// route --- etudiant  route::get(URL, Action)->Alias De URL  , get - Méthod de requête(get , post , put , delete)
// La route vers la controlle qui va afficher la liste des étudiants
route::get('etudiants', [EtudiantController::class, 'index'])->name('etudiants');// L'objectif de Alias 'name()' , c'est que l'on puisse dans le différent contexte de Serveur(localhost ou Serveur d'hébergement), en utilisant cet alias qu'on peut y être rendu à la page destinée plutôt que l'on utilise 'localhost:8000/etudiants' ou 'etudiants/{etudiant}'
route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');// ou dan la situation de rédirection ou link 'location ou <a href>' etc. on utilise l'alias situé dans 'name()'
// ajout d'un étudiant
route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
route::post('etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.create.post');
// Modification d'un étudiant
route::get('etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
route::put('etudiant-edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
// Supprimer un étudiant sélectionné
route::delete('etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');


/* route ------ blog */
Route::resource('blog', 'BlogPostController',['only' =>['create','store']]);//https://blog.csdn.net/weixin_33750452/article/details/92975074
                                                                            //Route::resource('blog', 'BlogPostController',['only' =>['index','show','create','store','update','edit','destroy']]);
Route::get('blog', [BlogPostController::class, 'index'])->name('blog')->middleware('auth');
Route::get('blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('blog/create', [BlogPostController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('blog/create', [BlogPostController::class, 'store'])->name('blog.create.store')->middleware('auth');
Route::get('blog/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('blog/{blogPost}/edit', [BlogPostController::class, 'update'])->name('blog.edit.update')->middleware('auth');
Route::delete('blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog.delete')->middleware('auth');
Route::get('blog/{blogPost}/PDF', [BlogPostController::class, 'showPdf'])->name('blog.showPdf')->middleware('auth');

// authentification
Route::get('login',[CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('registration',[CustomAuthController::class, 'create'])->name('registration');
Route::post('custom-registration',[CustomAuthController::class, 'store'])->name('custom.registration');
Route::get('dashboard',[CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout',[CustomAuthController::class, 'logout'])->name('logout');

//langue
Route::get('lang/{locale}',[LocalizationController::class, 'index'])->name('lang');


// Upload
Route::get('upload', [UploadsController::class, 'index'])->name('upload.index')->middleware('auth');
Route::get('{shareFile}', [UploadsController::class, 'downloadFile'])->name('download.file')->middleware('auth');
Route::delete('upload/{shareFile}', [UploadsController::class, 'destroy'])->name('upload.delete')->middleware('auth');

Route::get('upload/create', [UploadsController::class, 'create'])->name('upload.create')->middleware('auth');
Route::post('upload/create', [UploadsController::class, 'store'])->name('upload.store')->middleware('auth');
Route::get('upload-edit/{shareFile}', [UploadsController::class, 'edit'])->name('upload.edit')->middleware('auth');
Route::put('upload-edit/{shareFile}', [UploadsController::class, 'update'])->name('upload.update')->middleware('auth');
