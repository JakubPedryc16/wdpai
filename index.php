<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('mainPage', 'DefaultController');
Routing::get('searchPage', 'CocktailController');
Routing::get('cocktailPage', 'DefaultController');
Routing::get('addCocktailPage', 'CocktailController');

Routing::get('like', 'CocktailController');

Routing::post('search', 'CocktailController');
Routing::post('searchIngredients', 'IngredientController');
Routing::post('register', 'SecurityController');
Routing::post('login', 'SecurityController');
Routing::post('addCocktail', 'CocktailController');
Routing::post("upload", "CocktailController");

Routing::run($path);