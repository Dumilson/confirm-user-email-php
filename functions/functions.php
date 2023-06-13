<?php

function sanitize1($string, $sem_espaco = 'N')
{

    $string = str_replace(" or ", "", $string);
    $string = str_replace(" select ", "", $string);
    $string = str_replace(" delete ", "", $string);
    $string = str_replace("create ", "", $string);
    $string = str_replace("drop ", "", $string);
    $string = str_replace("update ", "", $string);
    $string = str_replace("drop table ", "", $string);
    $string = str_replace("show table", "", $string);
    $string = str_replace("applet", "", $string);
    $string = str_replace("object", "", $string);
    $string = str_replace(" order ", "", $string);
    $string = str_replace("by ", "", $string);
    $string = str_replace(" by", "", $string);
    $string = str_replace("'", "", $string);
    $string = str_replace("#", "", $string);
    $string = str_replace("--", "", $string);
    $string = str_replace(";", "", $string);
    $string = str_replace("*", "", $string);

    if ($sem_espaco == 'S') {
        $string = trim($string);
        $string = str_replace(" ", "", $string);
    }

    return $string;
}

foreach ($_POST as $key => $value) {
    $$key = sanitize1($value);
    $_POST[$key] = sanitize1($value);
}

foreach ($_GET as $key => $value) {
    $$key = sanitize1($value);
    $_GET[$key] = sanitize1($value);
}
