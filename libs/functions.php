<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "config.php";
function debugPrint(mixed $data): void
{
    echo "<div><pre>";
    print_r($data);
    echo "</pre></div>";
}
function varDumper(mixed $data): void
{
    echo "<div><pre>";
    var_dump($data);
    echo "</pre></div>";
}
function loadFile($dir, $file, $data = [])
{
    if ($data) {
        extract($data);
    }
    require_once ROOT_PATH . DS . $dir . DS . "$file.php";
}
function addition(float $nb1, float $nb2): float
{
    return (float)($nb1 + $nb2);
}
function salutation($name, $salutation = "Salut")
{
    return "$salutation $name";
}
function validFieldData(string $fieldValue): string
{
    return trim(strip_tags($fieldValue));
}
function isNotEmpty($value)
{
    return isset($value) && !empty($value);
}
function validUploadFile($file, $options = [
    "size" => 1_000_000,
    "extensions" => ["jpeg", "jpg", "gif", "svg", "png"]
]): bool|array
{
    if (isNotEmpty($file) && $file['error'] === 0) {
        if ($file['size'] <= $options['size']) {
            $fileInfos = pathinfo($file['name']);
            if (isNotEmpty($fileInfos) && isset($fileInfos['extension'])) {

                $extension_upload = $fileInfos['extension'];
                if (in_array($extension_upload, $options['extensions'])) {
                    return $fileInfos;
                }
            }
        }
    }
    return false;
}
function verifyAndUploadFile($file, $path = ROOT_PATH . "assets/files/")
{
    $fileInfos = validUploadFile($file);
    if (isNotEmpty($fileInfos)) {
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $fileExtension = $fileInfos['extension'];
        $filePath = $path . trim($fileInfos['filename']) . uniqid() . ".$fileExtension";
        $isUploaded = move_uploaded_file($file['tmp_name'], $filePath);
        return $isUploaded;
    }
    return false;
}
function isConnect(): bool
{
    return isset($_SESSION['user']);
}
function connectDb(): PDO
{
    $bdd = null;
    try {
        if (!$bdd) {

            $bdd = new PDO(
                "mysql:host=localhost;dbname=learn-php",
                "root",
                "7288Ndeko*",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
        }
        echo "DATABASE CONNECTION IS CORRECT";
        return $bdd;
    } catch (PDOException $e) {

        echo "DATABASE CONNECTION IS FAILED";
        debugPrint("Erreur : " . $e->getMessage());
        die();
    }
}
