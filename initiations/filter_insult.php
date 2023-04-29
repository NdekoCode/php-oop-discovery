<?php

$insults = ['con', 'merde', 'batard', 'connard', 'baiseur', 'putain'];
$sentence = readline("Entrer une phrase: \n");

// On parcour l'ensemble des insultes
foreach ($insults as $word) {
    $str = $word[0] . str_repeat("*", strlen($word) - 1);
    $sentence = preg_replace("/\b$word\b/", $str, $sentence);
}
print $sentence . "\n";
