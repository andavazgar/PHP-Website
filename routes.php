<?php

use Core\Middleware\Authenticated;
use Core\Middleware\Guest;
use Core\Router;


Router::get('/', 'controllers/home.php');
Router::get('/about', 'controllers/about.php');
Router::get('/contact', 'controllers/contact.php');

// Notes
Router::get('/notes', 'controllers/notes/index.php')->only(new Authenticated);
Router::post('/notes', 'controllers/notes/store.php')->only(new Authenticated);
Router::patch('/notes', 'controllers/notes/update.php')->only(new Authenticated);
Router::delete('/notes', 'controllers/notes/destroy.php')->only(new Authenticated);

Router::get('/note', 'controllers/notes/show.php')->only(new Authenticated);
Router::get('/note/create', 'controllers/notes/create.php')->only(new Authenticated);
Router::get('/note/edit', 'controllers/notes/edit.php')->only(new Authenticated);


// Registration
Router::get('/register', 'controllers/registration/create.php')->only(new Guest);
Router::post('/register', 'controllers/registration/store.php')->only(new Guest);

// Login
Router::get('/login', 'controllers/session/create.php')->only(new Guest);
Router::post('/session', 'controllers/session/store.php')->only(new Guest);
Router::delete('/session', 'controllers/session/destroy.php')->only(new Authenticated);