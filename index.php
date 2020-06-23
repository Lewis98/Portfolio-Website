<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        renderPage('homepage', 'Lewis Stokes - Portfolio');
        break;

    default:
        http_response_code(404);
        renderPage('404');
        break;
}


function renderPage($page, $title = 'Title not Set!', $desc = 'Description not Set!'){

    
    include(__DIR__ . '/views/layout/layout.php'); // Render Layout php

    require __DIR__ . '/views/partials/header.php';  // Render Header

    require __DIR__ . '/views/' . $page . '.php';  // Render Page
    

}

?>