<?php

define("DS", DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__DIR__) . DS);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
