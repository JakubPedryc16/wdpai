<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Ingredient.php';
require_once __DIR__.'/../repository/IngredientRepository.php';
class IngredientController
{
    private $ingredientsRepository;
    private $ingredientsCocktailsRepository;
    public function __construct() {
        $this->ingredientsRepository = new IngredientRepository();
        $this->ingredientsCocktailsRepository = new CocktailsIngredientsRepository();
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

    public function getIngredients() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            $ingredients = [];
            $ingredientIds = $this->ingredientsCocktailsRepository
                ->getIngredientIdByCocktailId($decoded['search']);

            if (!empty($ingredientIds)) {
                foreach ($ingredientIds as $ingredientId) {
                    $ingredient = $this->ingredientsRepository->getIngredientById($ingredientId['id_ingredients']);
                    if ($ingredient) {
                        $ingredient['amount'] = $ingredientId['amount'];
                        $ingredients[] = $ingredient;
                    }
                }
            }
            echo json_encode($ingredients);
        }
    }



}