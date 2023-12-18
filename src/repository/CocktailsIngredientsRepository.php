<?php

require_once __DIR__ . '/../models/Ingredient.php';
require_once 'Repository.php';

class CocktailsIngredientsRepository extends Repository
{
    public function addIngredientToCocktail(Ingredient $ingredient, $idCocktail)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.ingredients_cocktails ("id_ingredients", "id_cocktails")
            VALUES (?, ?)
        ');
        $stmt->execute([
            $ingredient->getIdIngredients(),
            $idCocktail
        ]);    }
}