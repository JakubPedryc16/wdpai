<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('mainPage', 'DefaultController');
Routing::get('searchPage', 'DefaultController');
Routing::get('cocktailPage', 'DefaultController');
Routing::get('addCocktailPage', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('addCocktail', 'CocktailController');

Routing::run($path);