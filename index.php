<?php

$request = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

switch ($request) {
    case '/' :
        renderPage('homepage', 'Lewis Stokes - Portfolio');
        break;

    case '/Projects' :
        renderPage('projects', 'Lewis Stokes - Portfolio');
        break;
    
    case '/PrjList' :
        renderPage('project_list', 'Lewis Stokes - Portfolio');
        break;
    
    case '/About' :
        renderPage('aboutme', 'About Me');
        break;

    case '/Contact' :
        renderPage('contact', 'Contact Me');
        break;


    
    // - - - - - Error codes - - - - - 

    // Internal server error
    case '/500' :
        http_response_code(500);
        renderPage('500', '500');
        break;
    
    // Bad Request
    case '/400' :
    http_response_code(500);
        renderPage('400', $request);
        break;

    // Not found
    default:
        http_response_code(404);
        renderPage('404', $request);
        break;
}


function renderPage($page, $title = 'Title not Set!', $desc = 'Description not Set!'){

    include(__DIR__ . '/views/layout/layout.php'); // Render Layout php

    require __DIR__ . '/views/partials/header.php';  // Render Header
    
    require __DIR__ . '/views/' . $page . '.php';  // Render Page
    
    include(__DIR__ . '/views/layout/layoutEnd.php'); // Render Layout php

    

}

?>