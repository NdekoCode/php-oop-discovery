<?php
// require_once("./setup.php");
$notes = [
    [
        "prenom" => "Gloire", "nom" => "Mutaliko", "notes" => [12, 10, 15], "class" => "CM1"
    ], [
        "prenom" => "Cedric", "nom" => "Kahungu", "notes" => [2, 30, 15], "class" => "CM3"
    ], [
        "prenom" => "Valentin", "nom" => "Nasibu", "notes" => [18, 10, 15], "class" => "CM2"
    ]
];
$classes = [
    "cm1" => ["Jean", "Marc", "Mario"],
    "cm2" => ["Emilie", "Marcelin"],
    "cm3" => ["Cedric", "Joy"]
];
for ($i = 0; $i < 5; $i++) {
    print "- $i \n";
}
// Afficher une classe et la liste des eleves;
foreach ($classes as $classe => $eleves) {
    echo "Classe: $classe \n";
    echo "Eleves: \n";
    foreach ($eleves as $eleve) {
        echo "- $eleve \n";
    }
}
// Afficher le nom et prenom des eleves et leurs noms :
foreach ($notes as $note) {
    echo "{$note['prenom']} {$note['nom']} \n";
    echo "Notes: \n ";
    foreach ($note['notes'] as $n) {
        echo "- $n \n ";
    }
    echo "Total des notes: " . array_sum($note['notes']) . " \n";
}
