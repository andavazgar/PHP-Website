<?php

use Core\Middleware\Authenticated;
use Core\Middleware\Guest;
use Core\Router;


Router::get('/', 'home.php');
Router::get('/about', 'about.php');
Router::get('/contact', 'contact.php');

// Notes
Router::get('/notes', 'notes/index.php')->only(new Authenticated);
Router::post('/notes', 'notes/store.php')->only(new Authenticated);
Router::patch('/notes', 'notes/update.php')->only(new Authenticated);
Router::delete('/notes', 'notes/destroy.php')->only(new Authenticated);

Router::get('/note', 'notes/show.php')->only(new Authenticated);
Router::get('/note/create', 'notes/create.php')->only(new Authenticated);
Router::get('/note/edit', 'notes/edit.php')->only(new Authenticated);


// Registration
Router::get('/register', 'registration/create.php')->only(new Guest);
Router::post('/register', 'registration/store.php')->only(new Guest);

// Login
Router::get('/login', 'session/create.php')->only(new Guest);
Router::post('/session', 'session/store.php')->only(new Guest);
Router::delete('/session', 'session/destroy.php')->only(new Authenticated);