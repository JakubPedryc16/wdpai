<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('login');
    }

    public function mainPage() {
        $this->render('mainPage');
    }
    public function searchPage() {
        $this->render('searchPage');
    }
    public function addCocktailPage() {
        $this->render('addCocktailPage');
    }
    public function cocktailPage() {
        $this->render('cocktailPage');
    }

}