<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "Games database";
echo time();
$bdd = connectDb();
$response = $bdd->query("SELECT * FROM jeux_video ORDER BY prix DESC LIMIT 12");
$res = $bdd->query("SELECT COUNT(*) AS nbr_game,possesseur FROM jeux_video GROUP BY possesseur");
$result = $res->fetchAll();
debugPrint($result);
$data = $response->fetchAll();
loadFile("partials", "header", compact('title'));
loadFile("partials", "navbar");
?>
<div class="container mx-auto mt-5 max-w-7xl">
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="container p-3 mx-1 my-3 mt-5 text-red-500 bg-red-300 rounded max-w-7xl"><?= $_SESSION['error'] ?></div>
    <?php endif ?>
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="container p-3 mx-1 my-3 mt-5 text-green-500 bg-green-100 rounded"><?= $_SESSION['success'] ?></div>
    <?php endif ?>
    <a href="./add-game.php" class="px-3 py-2 my-1 text-white bg-blue-600 rounded">Add game</a>
    <div class="flex flex-wrap items-center gap-5 mt-5">
        <?php foreach ($data as $game) : ?>

            <div class="border rounded-md shadow-lg min-w-[250px] min-h-[250px] p-3">
                <h2 class="block mb-3 text-xl font-bold text-gray-700"><a href="./view-game.php?id=<?= $game['ID'] ?>" class="text-blue-500 underline"> A : <?= $game['nom'] ?></a></h2>
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

unset($_SESSION['success']);
unset($_SESSION['error']);
loadFile("partials", "footer");
