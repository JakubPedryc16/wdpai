<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('login');
    }
    public function mainPage() {
        $this->render('mainPage');
    }
    public function cocktailPage() {
        $this->render('cocktailPage');
    }




}