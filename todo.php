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
        </div>
    </header>

    <div class="p-6">
        <div class="paper container bg-slate-300/50">
            <h1 class="text-center text-2xl">Ma ToTool</h1>

            <div class="mt-16">
                <label for="task">Nouvelle tâche</label>
                <input type="text" id="task" class="mt-2 w-full">

                <button class="mt-6 p-1 w-full">Ajouter une tâche</button>
            </div>
        </div>

        <div class="paper container bg-slate-300/50 mt-24">
            <h1 class="text-center text-2xl">Vos tâches en cours</h1>

                <div class="flex">
                    <h2>Faire l'aspirateur</h2>
                    <fieldset class="form-group ml-10 mt-1">
                        <label class="paper-switch-2">
                            <input id="paperSwitch11" name="paperSwitch11" type="checkbox" />
                            <span class="paper-switch-slider round"></span>
                        </label>
                    </fieldset>
                    <a href="#"><img src="./assets/noun-cross-34085.svg" alt="delete" class="img no-border h-12"></a>
                </div>
        </div>
    </div>

</body>
</html>
