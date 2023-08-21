<?php
$text = " je m'appel https://ionic.io/ionicons arick Bulakali";
$text = preg_replace(
    "#(((http(s)?:\/\/)?(w{3}\.)?)?([a-z]{2,}(\w|[\-\.\#\\\/])*)+\.[a-z]+[\/]?(\w|[\-\.\#\\\/\&\=\?])*)#i",
    "<a href=\"$0\">$6</a>",
    $text
);
var_dump($text);
