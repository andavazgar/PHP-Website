<?php

use Core\Router;


Router::get('/', 'controllers/home.php');
Router::get('/about', 'controllers/about.php');
Router::get('/contact', 'controllers/contact.php');

Router::get('/notes', 'controllers/notes/index.php');
Router::post('/notes', 'controllers/notes/store.php');
Router::delete('/notes', 'controllers/notes/destroy.php');

Router::get('/note', 'controllers/notes/show.php');
Router::get('/note/create', 'controllers/notes/create.php');