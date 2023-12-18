<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Ingredient.php';
require_once __DIR__.'/../repository/IngredientRepository.php';
class IngredientController
{
    private $ingredientsRepository;
    public function __construct() {
        $this->ingredientsRepository = new IngredientRepository();
    }
    public function searchIngredients(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->ingredientsRepository->getIngredientByName($decoded['search']));

        }
    }


}