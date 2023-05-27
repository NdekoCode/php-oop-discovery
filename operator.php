<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "Libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "Operator";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");
$value;

$op1 = true;
$op2 = true;
$a = 58;
$b = 17;
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

?>

<div class="container mx-auto mt-5 max-w-7xl">
    <div class="flex flex-wrap items-center gap-5">


        <div class="border rounded-md shadow-lg min-w-[250px] min-h-[250px] p-3">
            <strong class="block mb-3 text-base font-bold border-b"> A : <?= $a ?></strong>
            <strong class="block mb-3 text-base font-bold border-b"> B : <?= $b ?></strong>
            <p>A <=> B </p>

            <?php
            debugPrint($a <=> $b);
            switch ($a <=> $b) {
                case 1:

                    debugPrint("A is bigger than B");
                    break;
                case 0:
                    debugPrint("A equal B");
                    break;
                case -1:
                    debugPrint("B is bigger than A");
                    break;
                default:
                    debugPrint("Give a true value");
            }
            ?>
        </div>
    </div>
    <div class="flex flex-wrap items-center gap-5 mt-5 mb-5">
        <?php foreach ($students as $k => $student) : ?>

            <div class="border rounded-md shadow-lg min-w-[250px] min-h-[250px] p-3">
                <strong class="block mb-3 text-base font-bold"> FirstName : <?= $student['firstName'] ?></strong>
                <strong class="block mb-3 text-base font-bold"> LastName : <?= $student['lastName'] ?></strong>

                <strong class="block mb-3 text-base font-bold">Notes: </strong>
                <?php foreach ($student['notes'] as $k => $note) : ?>
                    <span class=" p-1 inline-block <?= $k !== (count($student['notes']) - 1) ? "border-r" : "" ?>"> <?= $note ?></span>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php

loadFile("partials", "footer");
