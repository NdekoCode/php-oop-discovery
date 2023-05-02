<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "Games database";
$bdd = connectDb();
$response = $bdd->query("SELECT * FROM jeux_video LIMIT 12");
$data = $response->fetchAll();
loadFile("partials", "header", compact('title'));
loadFile("partials", "navbar");
?>
<div class="container mx-auto mt-5 max-w-7xl">
    <div class="flex flex-wrap items-center gap-5">
        <?php foreach ($data as $game) : ?>

            <div class="border rounded-md shadow-lg min-w-[250px] min-h-[250px] p-3">
                <h2 class="block mb-3 text-xl font-bold text-gray-700"> A : <?= $game['nom'] ?></h2>
                <ul class="my-1 text-base text-gray-500">
                    <li><a class="text-blue-500 underline" href="games-details.php?user=<?= $game['possesseur'] ?>">Proprietaire: <?= $game['possesseur'] ?></a></li>
                    <li>Type d'appareil: <?= $game['console'] ?></li>
                    <li>Prix: <?= $game['prix'] ?>€</li>
                    <li>Nombre de joueur max: <?= $game['nbre_joueurs_max'] ?></li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php

loadFile("partials", "footer");
