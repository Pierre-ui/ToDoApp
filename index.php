<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/favicon-32x32.png" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/papercss@1.8.3/dist/paper.min.css">
    <script src="./js/main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>ToDoApp</title>
</head>
<body class="bg-white">
    <header>
        <div class="flex justify-end mt-8 mr-8">
            <a href="connexion.php"><img src="./assets/noun-user-4556567.svg" alt="user-icon" class="h-10"></a>
            <a href="#"><img src="./assets/noun-setting-4556871.svg" alt="user-icon" class="h-10"></a>
        </div>
    </header>

    <main>
        <div class="bg-slate-300 mt-16 mr-10 ml-10 p-2">
            <div class="flex justify-center">
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_rvo98ufm.json"  background="transparent"  speed="1"  style="width: 200px; height: 220px;" loop autoplay></lottie-player>
            </div>

            <p class="text-center mt-5">MyToTool est une application de blabla blabla.....</p>
        </div>

        <div class="text-center mt-5">
            <a href="inscription.php" class="">Pas de compte ? Créez en un !</a>
        </div>

        <div class="mt-10 flex justify-center">
            <a href="connexion.php" class="paper-btn btn-small">Je me connecte !</a>
        </div>

        <footer class="flex justify-end">
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_sycl9imh.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay class="float-right"></lottie-player>

            <!--<lottie-player src="https://assets2.lottiefiles.com/packages/lf20_3vbOcw.json"  background="transparent"  speed="0.8"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>-->
        </footer>
    </main>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>
