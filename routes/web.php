<?php

use App\Models\tasks;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\taskController;


// liste de toutes les taches
Route::get('/', function(){
    $tasks = tasks::all();
    return view('tasks.index', compact('tasks'));
});

// route vers le formulaire pour la creation d'une tâche
Route::get('/create', function(){
    return view('tasks.createTask');
});

// traitement du formulaire pour une nouvelle tâche
Route::post('/create', [taskController::class, 'createTask']);

// route vers le formulaire d'edition d'une tâche
Route::get('/edit/{id}', function($id){
    $task = tasks::find($id);
    return view('tasks.editTask', compact('task'));
});

// Route vers la mise a jour de l'etat de la tache
Route::get('/updateState', [taskController::class, 'updateState']);

// route vers la suppression d'une nouvelle tâche
Route::get('/delete', [taskController::class, 'deleteTask']);

// route vers le formulaire d'inscription
Route::get('/register', function(){
    return view('login.register');
})->name('register');

// route vers le traitement de l'inscription
Route::post('/register', [AuthController::class, 'register']);

// formulaire de connexion
Route::get('/login', function(){
    return view('login.connect');
})->name('login');

// logique de la connexion
Route::post('/login', [AuthController::class, 'login']);

Route::get('/accueil', function() {
        $tasks = tasks::all();
    return view('Accueil', compact('tasks'));
})->middleware('auth');

// groupe de routes 
// Route::middleware(['auth'])->group(function () {
//     Route::get('/tasks', function(){});
//     Route::get('/create', function(){});
// });

// logique de la deconnexion
Route::post('logout', function() {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// utilisation de breeze
// require __DIR__.'/auth.php';
