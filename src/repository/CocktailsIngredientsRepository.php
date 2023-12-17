<?php

namespace repository;
use Cocktail;
use models\Ingredient;
use Repository;

require_once __DIR__ . '/../models/Cocktail.php';
require_once __DIR__ . '/../models/Ingredient.php';
require_once __DIR__ . '/../models/CocktailsIngredients.php';
require_once 'Repository.php';

class CocktailsIngredientsRepository extends Repository
{
    public function addIngredientToCocktail(Ingredient $ingredient, Cocktail $cocktail)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.ingredients_cocktails ("id_ingredients", "id_cocktails")
            VALUES (?, ?)
        ');
        $stmt->execute([
            $ingredient->getIdIngredients(),
            $cocktail->getIdCocktails()
        ]);    }

    public function getAll(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM ingredients_cocktails
        ');
        $stmt->execute();
        $ingredientsToCocktails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ingredientsToCocktails as $ingredientsToCocktail) {
            $result[] = new Cocktail(
                $ingredientsToCocktail['id_ingredient'],
                $ingredientsToCocktail['id_cocktail']
            );
        }
        return $result;
    }
    

}