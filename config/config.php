<?php
setlocale(LC_TIME, 'pt_PT', 'pt_PT.utf-8', 'portuguese');
date_default_timezone_set('Africa/Luanda');
session_start();
#Arquivos Derectorios Raizes
$pastaInterna = "projecto_cadastro";
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");

#caminho absoluto fisico 
if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {
    define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}/{$pastaInterna}/");
} else {
    define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}/{$pastaInterna}/");
}
#directorios especificos
define("IMG", DIRPAGE . "/public/img/");
define("ICON", DIRPAGE . "/public/fonts/");
define("CSS", DIRPAGE . "/public/css/");
define("JS", DIRPAGE . "/public/js/");

define("UPLOADIMG", DIRREQ . "public/storage/img/");
define("UPLOADAUDIO", DIRREQ . "public/storage/audio/");
define("UPLOADVIDEO", DIRREQ . "public/storage/audio/");

define("SHOW_ERRORS", true);

define('EMAIL_CONFIG', [
    'Host' =>  '',
    'SMTPAuth' =>  true,
    'Username' => '',
    'Password' => '',
    'SMTPSecure' => 'ssl',
    'Port' => 465,
    'CharSet' => 'utf-8',
]);
