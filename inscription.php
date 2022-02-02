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

if(isset($_POST['forminscription'])) {
    $name = htmlspecialchars($_POST['name']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);

    if(!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
        $namelength = strlen($name);
        if($namelength <= 255) {
            if($mail == $mail2) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail =?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0) {
                        if($password == $password2) {
                            $insertmbr = $bdd->prepare("INSERT INTO users(name, mail, password, first_name) VALUES(?, ?, ?, ?)");
                            $insertmbr->execute(array($name, $mail, $password, $firstName));
                            $_SESSION['erreur'] = '';
                            header("Location: ../connexion.php");
                        } else {
                            $erreur = "Vos mots de passe ne correspondent pas !";
                        }
                    } else {
                        $erreur = "Adresse mail déjà utilisée !";
                    }
                } else {
                    $erreur = "Vos adresses mail ne correspondent pas !";
                }
            } else {
                $erreur = "Votre nom de ne doit pas dépasser 255 caractères !";
            }
        } else {
            $erreur = "Tous les champs doivent être complétés !";
        }
    }
}

if (isset($erreur)) {
    $_SESSION['erreur'] = $erreur;
    header("Location: ../inscription.php");
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="./assets/favicon-32x32.png" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/papercss@1.8.3/dist/paper.min.css">
    <script src="./js/main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Connexion</title>
</head>
<body class="bg-white">

    <header>
        <div class="flex justify-end mt-8 mr-8">
            <a href="connexion.php"><img src="./assets/noun-user-4556567.svg" alt="user-icon" class="h-10"></a>
            <a href="#"><img src="./assets/noun-setting-4556871.svg" alt="user-icon" class="h-10"></a>
        </div>
    </header>

    <div class="mt-10 flex justify-center mb-10" >
        <div class="mt-2 bg-slate-300/50 p-2">
            <h1 class="text-center text-2xl">Inscrivez-vous</h1>

            <form action="" method="post" class="flex flex-col mt-10">
                <label for="name" class="text-center">Votre nom</label>
                <input type="text" id="name" name="name" class="mt-4 p-1">

                <label for="firstName" class="text-center mt-4">Votre prénom</label>
                <input type="text" id="firstName" name="firstName" class="mt-4 p-1">

                <label for="mail" class="text-center mt-4">Votre mail</label>
                <input type="email" name="mail" id="mail" name="mail" placeholder="Mail" class="mt-4 p-1">

                <label for="mail2" class="text-center mt-4">Confirmer votre mail</label>
                <input type="email" id="mail2" name="mail2" placeholder="Confirmer le mail" class="mt-4 p-1">

                <label for="password" class="text-center mt-4">Votre mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe" class="mt-4 p-1">

                <label for="password2" class="text-center mt-4">Confirmer le mot de passe</label>
                <input type="password" id="password2" name="password2" class="mt-4 p-1">

                <button type="submit" name="forminscription" class="mt-6 paper-btn btn-small">Je m'inscris</button>
            </form>
        </div>

            <?php
                if(isset($_SESSION['erreur'])) {
                echo '<font color="red">'.$_SESSION['erreur']."</font>";
            }
            ?>
        </div>
    </div>

</body>
</html>
