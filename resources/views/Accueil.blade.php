<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>To-Do List</title>
</head>
<body>
    <div class>
        <form action="{{ route('logout') }}" method="post">
            @csrf    
            <button type="submit">Déconnecter</button>
        </form>
    </div>
    <div style=" width: 70%;margin-left:200px;">
        <div style=" border: 1px solid black; text-align:center;">
            <h1>Listes des tâches à faire.</h1>
        </div>
        <div>
            <a href="/create">Ajouter une nouvelle tâche</a>
            @if (count($tasks) > 0)
            <table style="border:1px solid black; text-align:center;">
                <tr style="font-weight:bolder;">
                    <td>Date de création</td>
                    <td>Nom de la tâche</td>
                    <td>Description</td>
                    <td>Heure de la tâche</td>
                    <td>État</td>
                    <td>Actions</td>
                </tr>
                @foreach ($tasks as $task)
                <tr style="border:1px solid black;">
                    <td style="border:1px solid black;width:25%;">{{ date_format($task->created_at, 'd/m/Y') }}</td>
                    <td style="border:1px solid black;width:25%;">{{ $task->taskName }}</td>
                    <td style="border:1px solid black;width:25%;">{{ $task->description }}</td>
                    <td style="border:1px solid black;width:25%;">{{ $task->taskHour }}</td>
                    @if ($task->done == 0)
                        <td style="border:1px solid black;width:25%;">
                            <form action="/updateState" method="get">
                                <input type="hidden" name="id" value="{{$task->id}}">
                                <input type="hidden" name="done" value="1">
                                <input type="submit" style="width: 75%;" value="Marquer fait" />
                            </form>
                            <form action="/updateState" method="get">
                                <input type="hidden" name="id" value="{{$task->id}}">
                                <input type="hidden" name="done" value="-1">
                                <input type="submit" style="width: 75%;" value="Marquer non fait" />
                            </form>
                        </td>
                    @elseif($task->done == 1)
                        <td style="border:1px solid black;width:25%;"><button type="button"  style="width: 75%;" disabled>Fait</button></td>
                    @elseif($task->done == -1)
                        <td style="border:1px solid black;width:25%;"><button type="button" disabled  style="width: 75%;">Non fait</button></td>
                    @endif
                    <td>
                        <a href="/edit/{{ $task->id }}" style="width: 97%;">Editer</a>
                        <form action="/delete" method="get">
                            <input type="hidden" name="id" value="{{$task->id}}">
                            <input type="submit" style="width: 97%;" value="Supprimer" />
                        </form>
                    </td>           
                </tr>
                @endforeach
            </table>
        @else
        <p>Aucune tâche faire.</p>
        @endif
        </div>
    </div>
</body>
</html>