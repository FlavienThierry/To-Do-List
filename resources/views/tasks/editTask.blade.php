<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To- Do List</title>
</head>
<body>
    <h1>Editer une tâche</h1>
    
    <form action="/create" method="post">
        @csrf
        <label for="taskName">Nom de la tâche</label>
        <input type="text" name="taskName" id="taskName" value="{{$task->taskName}}"><br>

        <label for="description">Description</label>
        <textarea name="description" id="description">{{$task->description}}</textarea><br>

        <label for="taskHour">Heure de la tâche</label>
        <input type="time" name="taskHour" id="taskHour" value="{{ $task->taskHour }}"><br>

        <input type="hidden" name="id" value="{{$task->id}}">

        @if ($task->done == 0)
        <input type="radio" name="done" value="0"  id="notYet" checked /><label for="notYet">Pas encore fait <br>
        <input type="radio" name="done" value="1"  id="done" /><label for="done">Marquer fait </label><br>
        <input type="radio" name="done" value="-1"  id="notDone" /><label for="notDone">Marquer non fait <br>
        @elseif ($task->done == 1)
        <p>Tâche déjà fait.</p>
        <input type="hidden" name="done" value="{{$task->done}}">
        @else
        <p>Tâche non accomplie.</p>
        <input type="hidden" name="done" value="{{$task->done}}">
        @endif
        <a href="/">Annuler</a>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>