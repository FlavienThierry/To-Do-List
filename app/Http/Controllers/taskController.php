<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tasks;

class taskController extends Controller
{
    // fonction pour afficher toutes les tâches
    public function index()
    {
        // retourner la vue dans ressources//index.blade.php
        return view('tasks.index');
    }

    // fonction pour sauvegarder une tâche, utilisée aussi pour la mise à jour
    public function createTask(Request $request)
    {
        // verifier si le formulaire contient un champ appelé "id", 
        // s'il n'en contient pas, on crée une nouvelle tâche 
        // sinon on fait une  mise à jour 
        if (!$request->input('id')){
            // creation de la tâche avec les parametres du formulaire
            $task = new tasks();
        }
        else{
            // recherche de la tâche existante
            $task = tasks::find($request->input('id'));
        }
        // affectation des valeurs dans le formulaire pour la tâche
        $task->taskName = $request->input('taskName');
        $task->description = $request->input('description');
        $task->taskHour = $request->input('taskHour');
        $task->done = $request->input('done');
        
        // sauvegarder la tâche avec les parametres réçus
        $task->save();
        
        // rediriger vers la page d'accueil
        return redirect('/')->with('success', 'Tâche ajoutée !');
    }

    public function deleteTask(Request $request)
    {
        //recherche de  la tache avec l'id passé via le formulaire
        $task = tasks::find($request->input('id'));

        //suppression de la tâche
        $task->delete();

        return redirect('/accueil')->with("success", "Tâche supprimée !");
    }

    public function updateState(Request $request)
    {
        $task = tasks::find($request->input('id'));
        $task->done = $request->input('done');

        $task->save();

        return redirect('/accueil');
    }
}
