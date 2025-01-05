<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\UeController;
use App\Http\Controllers\EcController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('etudiant')->name('etudiant.')->group(function () {
    // Route pour afficher la liste des étudiants
    Route::get('/', [EtudiantController::class, 'getEtudiant'])->name('getEtudiant');
    Route::get('/index', [EtudiantController::class, 'getViewEtudiant'])->name('getViewEtudiant');
    Route::post('/addEtudiant', [EtudiantController::class, 'addEtudiant'])->name('addEtudiant');
    Route::put('{id}', [EtudiantController::class, 'updateEtudiant'])->name('updateEtudiant');
    Route::delete('{id}', [EtudiantController::class, 'deleteEtudiant'])->name('deleteEtudiant');
});

Route::prefix('ue')->name('ue.')->group(function () {
    // Route pour afficher la liste des ues
    Route::get('/', [UeController::class, 'getUe'])->name('getUe');
    Route::get('/index', [UeController::class, 'getViewUe'])->name('getViewUe');
    Route::post('/addUe', [UeController::class, 'addUe'])->name('addUe');
    Route::put('{id}', [UeController::class, 'updateUe'])->name('updateUe');
    Route::delete('{id}', [UeController::class, 'deleteUe'])->name('deleteUe');
});

Route::prefix('ec')->name('ec.')->group(function () {
    // Route pour afficher la liste des ecs
    Route::get('/', [EcController::class, 'getEc'])->name('getEc');
    Route::get('/index', [EcController::class, 'getViewEc'])->name('getViewEc');
    Route::post('/addEc', [EcController::class, 'addEc'])->name('addEc');
    Route::put('{id}', [EcController::class, 'updateEc'])->name('updateEc');
    Route::delete('{id}', [EcController::class, 'deleteEc'])->name('deleteEc');
});

Route::prefix('note')->name('note.')->group(function () {
    // Route pour afficher la liste des notes
    Route::get('/', [NoteController::class, 'getNote'])->name('getNote');
    Route::get('/index', [NoteController::class, 'getViewNote'])->name('getViewNote');
    Route::get('/resultat', [NoteController::class, 'getViewResultat'])->name('getViewResultat');
    Route::post('/addNote', [NoteController::class, 'addNote'])->name('addNote');
    Route::put('{id}', [NoteController::class, 'updateNote'])->name('updateNote');
    Route::delete('{id}', [NoteController::class, 'deleteNote'])->name('deleteNote');
});

