<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une recette</title>
</head>
<body>
    <?php if(session_status() == PHP_SESSION_ACTIVE && array_key_exists('errors', $_SESSION)): ?>            
        <h3> Attention ! votre recette ne peux pas être envoyée. </h3>
        <ul>
            <li>
            <?= implode('<li>', $_SESSION['errors']); ?>
        </ul>        
    <?php endif; ?>
    <h1>Nouvelle recette.</h1>
    <form action="/add.php" method="POST">
        <label for="title">
        titre :
        </label>
        <input type="text" id="title" name="title"/>
        <label for="description">
        histoire :
        </label>
        <textarea id="description" name="description" cols="65">
        Et un peu de vitriol ? non... oh OUIIIII !! ah je savais bien que ce serait bon !
        </textarea>
        <input id="submit" type="submit" value="enregistrer la recette">
    </form>
</body>
</html>