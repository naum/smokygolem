<?php

function __autoload($c) {
    $modulename = $_SERVER['DOCUMENT_ROOT'] . '/genus/' . strtolower($c) . '.php';
    if (file_exists($modulename)) {
        require($modulename);
    } else {
        throw_error_page('I am an object of scorn to my accusers&hellip;');
    }
}

function throw_error_page($m, $h='blunder') {
    echo "<h2>$h</h2>";
    echo "<p>$m</p>";
    exit;
}

?>
