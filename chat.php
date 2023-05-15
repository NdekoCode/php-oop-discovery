<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'functions.php';
$dbb = connectDb();
$request = $dbb->query("SELECT UPPER(pseudo) as pseudo,message FROM chat ORDER BY createdAt  DESC");
$rq = $dbb->query("SELECT COUNT(*) nbr_chat FROM chat");
$count = $rq->fetch();

$messages = $request->fetchAll();
if (isNotEmpty($_POST)) {
    $pseudo = validFieldData($_POST['pseudo']) ?? "";
    $message = validFieldData($_POST['message']) ?? "";
    $schema = compact('pseudo', 'message');
    $request = $dbb->prepare("INSERT INTO chat(pseudo,message) VALUES(:pseudo,:message)");
    $validRequest = $request->execute($schema);
    if ($validRequest) {
        header("Location: ./chat.php");
        die();
    }
}
$title = "Chat a game";
loadFile("partials", "header", compact('title'));
loadFile("partials", "navbar"); ?>
<div class="container mx-auto max-w-7xl">
    <p><strong class="font-bold"><?= $count['nbr_chat'] ?? 0 ?> Nombre de discussion</strong>
    </p>
    <?php if ($messages) : ?>
        <?php
        foreach ($messages as $msg) : ?>

            <div class="p-5 shadow">
                <strong class="block p-1 mb-3 text-sm text-white bg-blue-800 rounded w-max"><?= $msg['pseudo'] ?></strong>
                <p class=""><?= $msg['message'] ?></p>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="p-3 shadow">
            <p>Not chat found</p>
        </div>
    <?php
    endif
    ?>

    <form action="" method="POST" class="max-w-5xl p-5 mx-auto mt-5 transition-all shadow hover:shadow-xl rounded-2xl">

        <div class="mb-3">
            <label for="pseudo" class="block mb-1 text-base text-gray-600">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo name" class="w-full px-3 py-2 text-sm transition-all duration-200 border border-gray-200 rounded shadow outline-none placeholder:text-gray-300 ring ring-transparent focus:ring-blue-100 focus:ring-offset-1">
        </div>
        <div class="mb-3">
            <label for="message" class="block mb-1 text-base text-gray-600">Message</label>
            <textarea type="text" name="message" id="message" placeholder="Your message" class="w-full px-3 py-2 text-sm transition-all duration-200 border border-gray-200 rounded shadow outline-none placeholder:text-gray-300 ring ring-transparent focus:ring-blue-100 focus:ring-offset-1"></textarea>
        </div>
        <button type="submit" class="px-3 py-2 my-1 text-white bg-blue-600 rounded">Add game</button>
    </form>
</div>
<?php

loadFile("partials", "footer");
