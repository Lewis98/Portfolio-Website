<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        renderPage('\views\index.php');
        break;

    default:
        http_response_code(404);
        renderPage('\views\404.php');
        break;
}


function renderPage($page){

    require __DIR__ . $page;

}

?>