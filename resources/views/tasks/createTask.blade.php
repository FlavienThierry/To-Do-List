<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To- Do List</title>
</head>
<body>
    <h3>Créer une nouvelle tâche</h3>

    <a href="/">Annuler</a>
    <form action="/create" method="post">
        @csrf
        <label for="taskName">Nom de la tâche</label>
        <input type="text" name="taskName" id="taskName"><br>

        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea><br>

        <label for="taskHour">Heure de la tâche</label>
        <input type="time" name="taskHour" id="taskHour"><br>

        <input type="hidden" name="done" value="0">

        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>