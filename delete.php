<?php
session_start();

try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=todoapp;port=8889;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

if(isset($_GET['id']) && !empty($_GET['id'])) {

    require_once('connexion.php');

    $id = strip_tags($_GET['id']);    //permet de retirer les balises html

    $sql = 'SELECT * FROM `tasks` WHERE `id` = :id;';

    $query = $bdd->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $produit = $query->fetch();

    if(!$produit) {
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: todo.php');
        die();
    }

    $id = strip_tags($_GET['id']);    //permet de retirer les balises html

    $sql = 'DELETE FROM `tasks` WHERE `id` = :id;';

    $query = $bdd->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $_SESSION['message'] = "Le produit a été supprimé";
    header('Location: todo.php');

}

else {
    $_SESSION['erreur'] = "Url invalide";
    header('Location: todo.php');
}

?>
