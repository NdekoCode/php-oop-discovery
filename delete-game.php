<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'functions.php';
$id = (int) $_GET['id'] ?? null;

if ($id) {
    $dbb = connectDb();
    $request = $dbb->prepare("DELETE FROM jeux_video WHERE ID=?");
    $validRequest = $request->execute([$id]);
    if ($validRequest) {
        header("Location: ./games.php");
        $_SESSION['success'] = "Game deleted successfully";
    } else {
        $_SESSION['error'] = "Error on game removed";
        header("Location: ./games.php");
    }
}
