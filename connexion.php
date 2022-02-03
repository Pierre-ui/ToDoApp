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

if(isset($_POST['formconnexion'])) {
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect)) {
        $requser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND password = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: todo.php?id=".$_SESSION['id']);
        } else {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
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
        <a href="index.php"><img src="./assets/noun-home-1074556.svg" alt="home" class="h-10"></a>
        <a href="connexion.php"><img src="./assets/noun-user-4556567.svg" alt="user-icon" class="h-10"></a>
        <a href="#"><img src="./assets/noun-setting-4556871.svg" alt="user-icon" class="h-10"></a>
    </div>
</header>

    <div class="mt-10 flex justify-center mb-10" >
        <div class="mt-2 bg-slate-300/50 p-2">
            <h1 class="text-center text-2xl">Connexion</h1>
            <form method="POST" action="" class="flex flex-col mt-10">

                <label for="mailconnect" class="text-center mt-0">Votre mail</label>
                <input type="email" name="mailconnect" placeholder="Mail" class="mt-4 p-1"/>

                <label for="mdpconnect" class="text-center mt-10">Votre mot de passe</label>
                <input type="password" name="mdpconnect" placeholder="Mot de passe" class="mt-4 p-1"/>

                <div class="text-center mt-5">
                    <a href="inscription.php" class="">Pas de compte ? Créez en un !</a>
                </div>

                <input type="submit" name="formconnexion" value="Se connecter !" class="justify-center mt-10" />
            </form>
        </div>
    </div>

    <?php
    if(isset($erreur)) {
        echo '<div class="text-center paper-container text-rose-600">'.$erreur."</div>";
    }
    ?>
</body>
</html>
