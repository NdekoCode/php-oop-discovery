<?php
require_once (__DIR__) . DIRECTORY_SEPARATOR . "Libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "Formulaire";
$formData = $_POST;
$filesData = null;
$total = 0;
$salutation = salutation(salutation: "Bonsoir", name: "Arick");
if (isNotEmpty($_FILES)) {
    $filesData = $_FILES;
    $testFile = verifyAndUploadFile($_FILES['avatar'], ROOT_PATH . 'public/images');
    if ($testFile) {
        debugPrint("File uploaded successfully");
    } else {

        debugPrint("File not uploaded");
    }
}
if (isset($_GET) && !empty($_GET)) {

    if (isset($_GET['number1']) && isset($_GET['number2'])) {
        $total = addition((float)validFieldData($_GET['number1']), (float)validFieldData($_GET['number2']));
    }
}

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");

?>
<div class="container mx-auto mt-5 max-w-7xl">

    <h1 class="mb-3 text-3xl font-bold text-gray-800">Formulaire</h1>
    <div class="flex flex-wrap items-center gap-5">

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="block mb-1 text-sm" for="number1">Number 1</label>
                <input type="number" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="number1" id="number1" />
            </div>
            <div class="mb-3">
                <label class="block mb-1 text-sm" for="number2">Number 2</label>
                <input type="number" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="number2" id="number2" />
            </div>

            <div class="flex gap-1 mb-3">
                <label class="block mb-1 text-sm" for="age">Age</label>
                <select name="age" id="age" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring scroll-p-3">
                    <?php for ($number = 2023; $number > 2000; $number--) : ?>
                        <option value="<?= $number ?>"><?= $number ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1 text-sm" for="agree">I AGREE</label>
                <input type="checkbox" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="agree" id="agree" />
            </div>
            <div class="mb-3">
                <p>Quelles votre sexe ?</p>

                <input type="radio" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="sexe" value="F" id="female" checked />
                <label for="female">Female</label>
                <input type="radio" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="sexe" value="M" id="male" />
                <label for="male">Male</label>
            </div>
            <div class="mb-3">
                <label for="avatar">Profile photos</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" class="px-5 py-2 text-white transition-colors bg-blue-600 rounded hover:bg-blue-800 min-w-max">Valider</button>
        </form>
        <div class="border rounded-md shadow-lg min-w-[250px] min-h-[250px] p-3">
            <?php
            echo $salutation;
            debugPrint($filesData);
            if ($total) :
            ?>
                <h4 class="mb-1 text-xl font-bold">Le total de l'addition est: <?= $total ?> </h4>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
loadFile("partials", "footer");
