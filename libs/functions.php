<?php
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
