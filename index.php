<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        renderPage('homepage');
        break;

    default:
        http_response_code(404);
        renderPage('404');
        break;
}


function renderPage($page, $title = 'Title not Set!', $desc = 'Description not Set!'){

    
    include(__DIR__ . '/views/layout/layout.php');

    require __DIR__ . '/views/' . $page . '.php';

}

?>