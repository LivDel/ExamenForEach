<?php 

// Appel du fichier contenant les excuses pour qu'il soit accessible dans partout
include(__DIR__ . '/data/excuses.php');

$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'home':
        include(__DIR__ . '/views/home.php');
        break;
    case 'lost':
        include(__DIR__ . '/views/lost.php');
        break;
    case 'http_code':
        $code = $_GET['code'] ?? '000';
        include(__DIR__ . '/views/http_code.php');
        break;
    case '404':
        default:
            include(__DIR__ . '/views/404.php');
            break;
}