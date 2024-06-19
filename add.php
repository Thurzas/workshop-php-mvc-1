<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

$errors = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if(!array_key_exists('title', $_POST) || $_POST['title'] =='' || preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ ,.'()\"!:?-]*$/", $_POST['title'])<1 || strlen($_POST['title'])>255)
    {
        $errors['title'] ="caractères interdits présent dans le titre, ou pas de contenu.";
    }
    if(!array_key_exists('description', $_POST) || $_POST['description'] =='' || preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ ,.'()\"\n!:?-]*$/", $_POST['description'])<1)
    {
        $errors['description'] ="caractères interdits présent dans la recette, ou pas de contenu.";
    }
    if(!empty($errors))
    {
        session_start();
        $_SESSION['errors']=$errors;
    }
    else
    {
        $title =strip_tags($_POST['title']);
        $title = htmlentities($title);
        $title=trim($title);
        $description =strip_tags($_POST['description']);
        $description = htmlspecialchars($description);
        $description=trim($description);
        $recipe = [
            'title' =>$title,
            'description' => $description
        ];

        if (empty($errors)) {
            saveRecipe($recipe);
            header('Location: /');
        }
    }
}

require __DIR__ . '/src/views/form.php';
unset($_SESSION['errors']);
