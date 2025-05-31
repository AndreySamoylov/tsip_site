<?php

$files = array(
    $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/const.php',
    $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/autoload.php',
    $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/agents.php',
);


foreach ($files as $file) {

    if (file_exists($file)) {
        require_once $file;
    }
}
