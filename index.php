<?php require_once (__DIR__) . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/app.css" />
    <title>Document</title>
</head>

<body>
    <div class="p-5 rounded bg-light">
        <h1 class="mb-3 text-3xl font-bold text-gray-600">Navbar Bum</h1>
        <p class="text-base text-gray-800">This example is a quick exercise to illustrate how the top-aligned navbar works. As you scroll, this navbar remains in its original position and moves with the rest of the page.</p>

        <?php
        $students = [
            [
                "firstName" => "Nicholas",
                "lastName" => "Birate",
                "notes" => [12, 10, 15, 12, 17, 19, 14]
            ],
            [
                "firstName" => "Winnie",
                "lastName" => "Gwiza",
                "notes" => [14, 12, 17, 11, 18, 19, 20, 10]
            ], [
                "firstName" => "Nathalie",
                "lastName" => "Byanga",
                "notes" => [12, 14, 18, 13, 17, 15, 20, 20]
            ],
        ];
        $word = "Ceci est une chaine de caractère";
        $newUser = ["Ndeko", "Marie-ange", "Jerk", "Belange"];
        $tab = ["nicolas", "guiza", "akila", "Elias"];
        debugPrint($tab, ...$newUser);
        print_r($tab);
        echo strlen("caractère") . "<br/>";
        echo substr($word, -10) . "<br/>";
        array_pop($tab);
        debugPrint(str_contains(strtolower($word), "ceci")) . "<br/>";
        varDumper(str_starts_with(strtolower($word), "Ceci")) . "<br/>";
        varDumper(str_ends_with(strtolower($word), "Ceci")) . "<br/>";
        echo str_ireplace("ceci", "cela", $word);
        debugPrint($students);


        ?>
    </div>

</body>

</html>