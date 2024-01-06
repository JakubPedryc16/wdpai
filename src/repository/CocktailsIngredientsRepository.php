<?php

require_once __DIR__ . '/../models/Ingredient.php';
require_once 'Repository.php';

class CocktailsIngredientsRepository extends Repository
{
    public function addIngredientToCocktail( $idIngredient, $idCocktail, $amount)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.ingredients_cocktails ("id_ingredients", "id_cocktails", "amount")
            VALUES (?, ?, ?)
        ');
        $stmt->execute([
            $idIngredient,
            $idCocktail,
            $amount
        ]);    }

    public function getIngredientIdByCocktailId (int $searchInt){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM ingredients_cocktails WHERE id_cocktails = :search
        ');
        $stmt->bindParam(':search', $searchInt, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}