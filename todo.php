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

    if(isset($_POST['create_task'])) {
        if(empty($_POST['create_task'])) {
            $erreur = 'Vous devez indiquer une tâche';
        } else {
            $task = $_POST['create_task'];
            $bdd->exec("INSERT INTO tasks(task) VALUES('$task')");
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
    <title>Ma ToTool</title>
</head>
<body class="bg-white">

    <header>
        <div class="flex justify-end mt-8 mr-8">
            <a href="connexion.php"><img src="./assets/noun-user-4556567.svg" alt="user-icon" class="h-10"></a>
            <a href="#"><img src="./assets/noun-setting-4556871.svg" alt="user-icon" class="h-10"></a>
            <a href="deconnexion.php"><img src="./assets/noun-power-652650.svg" alt="power-off" class="h-10"></a>
        </div>
    </header>

    <div class="p-6">
        <div class="paper container bg-slate-300/50">
            <h1 class="text-center text-2xl">Ma ToTool</h1>

            <div class="mt-16">
                <form action="" method="post">
                    <label for="create_task">Nouvelle tâche</label>
                    <input type="text" id="task" class="mt-2 w-full" name="create_task">

                    <button type="submit" class="mt-6 p-1 w-full">Ajouter une tâche</button>
                </form>

                <?php
                if(isset($erreur)) {
                    echo '<div class="text-center paper-container mt-4 text-rose-600">'.$erreur."</div>";
                }
                ?>

            </div>
        </div>

        <div class="paper container bg-slate-300/50 mt-24">
            <h1 class="text-center text-2xl">Vos tâches en cours</h1>

            <?php

            $response = $bdd->query('Select * from tasks'); // On exécute une requête visant à récupérer les tâches
            $result = $response->fetchAll();
            ?>



                <div class="mt-10 flex flex-col items-center">

                    <?php

                    foreach ($result as $task) {

                    ?>
                    <form action="">
                        <div class="form-group flex">
                            <h2><?= $task['task']?></h2>
                                <label class="paper-switch-2">
                                    <input id="paperSwitch11" name="paperSwitch11" type="checkbox" class="ml-10"/>
                                    <div class="flex">
                                        <a href="delete.php?id=<?php echo $task['ID'] ?>"><img src="./assets/noun-cross-34085.svg" alt="delete" class="img no-border h-12 absolute ml-10"></a>
                                        <span class="paper-switch-slider round"></span>
                                    </div>
                                </label>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                </div>
        </div>
    </div>

</body>
</html>
