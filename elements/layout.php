<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Département d'informatique</title>
    <link rel="stylesheet" href="css/tailwind.css">
</head>
<body>
    <!--insert here the top of all page-->
    <a href="/" class="text-9xl">Retour au menu</a>

    <div id="root"></div>
    <div class="flex justify-center items-center h-screen bg-cwc-gray text-9xl">
        <?= $view ?>
    </div>

<!--todo$wh-->
<!--Add script here by a variable -->
    <?= $script ?>

    <!--insert here to bottom of all page-->
</body>
</html>