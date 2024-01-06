<?php

require_once __DIR__.'/../models/Ingredient.php';
require_once 'Repository.php';

class IngredientRepository extends Repository
{
    public function getIngredient(int $id_ingredients): ?Ingredient
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.ingredients WHERE id_ingredients = :id_ingredients 
        ');
        $stmt->bindParam(':$id_ingredients',$id_ingredients,PDO::PARAM_INT);
        $stmt->execute();

        $cocktail = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$cocktail){
            return null;
        }
        return new Ingredient(
            $cocktail['name'],
            $cocktail['image'],
            $cocktail['id_ingredients']
        );
    }
    public function addIngredient(Ingredient $ingredient) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.ingredients ("name", "image")
            VALUES (?, ?)
        ');
        $stmt->execute([
            $ingredient->getName(),
            $ingredient->getImage()
        ]);
    }
    public function getIngredients(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM ingredients
        ');
        $stmt->execute();
        $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ingredients as $ingredient) {
            $result[] = new Ingredient(
                $ingredient['name'],
                $ingredient['image'],
                $ingredient['id_ingredients']
            );
        }

        return $result;
    }

    public function getIngredientByName(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM ingredients WHERE LOWER(name) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getIngredientById ($searchInt){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM ingredients WHERE id_ingredients = :search
        ');
        $stmt->bindParam(':search', $searchInt, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


}