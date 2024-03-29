<?php

require_once __DIR__.'/../models/Cocktail.php';
require_once 'Repository.php';

class CocktailRepository extends Repository
{
    public function getCocktail(int $id_cocktails) {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.cocktails WHERE id_cocktails = :id_cocktails 
        ');
        $stmt->bindParam(':$id_cocktails',$id_cocktails,PDO::PARAM_INT);
        $stmt->execute();

        $cocktail = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$cocktail){
            return null;
        }
        return new Cocktail(
            $cocktail['name'],
            $cocktail['image'],
            $cocktail['image'],
            $cocktail['id_cocktails']
        );
    }

    public function addCocktail(Cocktail $cocktail): ?int {
        $pdo = $this->database->connect();

        try {
            $stmt = $pdo->prepare('
            INSERT INTO public.cocktails ("name", "image")
            VALUES (?, ?)
        ');

            $stmt->execute([
                $cocktail->getName(),
                $cocktail->getImage()
            ]);

            $lastInsertId = $pdo->lastInsertId();

            return $lastInsertId ? (int)$lastInsertId : null;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function getCocktails(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cocktails
        ');
        $stmt->execute();
        $cocktails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cocktails as $cocktail) {
            $result[] = new Cocktail(
                $cocktail['name'],
                $cocktail['image'],
                $cocktail['id_cocktails']
            );
        }
        return $result;
    }
    public function getCocktailsWithIngredients(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM cocktails_with_ingredients
    ');
        $stmt->execute();
        $cocktails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cocktails as $cocktail) {
            $result[] = [
                'name' => $cocktail['name'],
                'image' => $cocktail['image'],
                'id_cocktails' => $cocktail['id_cocktails'],
                'ingredient_name' => $cocktail['ingredient_name'],
                'ingredient_amount' => $cocktail['amount']
            ];
        }
        return $result;
    }


    public function getCocktailByName(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cocktails WHERE LOWER(name) LIKE :searchCocktails
        ');
        $stmt->bindParam(':searchCocktails', $searchString, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getLastInsertedId(): ?int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT MAX(id_cocktails) as last_id FROM public.cocktails
        ');
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['last_id'] ?? null;
    }

    public function deleteCocktail(int $idCocktail): bool
    {
        $pdo = $this->database->connect();

        try {
            $pdo->beginTransaction();

            $stmtIngredients = $pdo->prepare('DELETE FROM public.ingredients_cocktails WHERE id_cocktails = :id_cocktail');
            $stmtIngredients->bindParam(':id_cocktail', $idCocktail, PDO::PARAM_INT);
            $stmtIngredients->execute();

            $stmtCocktail = $pdo->prepare('DELETE FROM public.cocktails WHERE id_cocktails = :id_cocktail');
            $stmtCocktail->bindParam(':id_cocktail', $idCocktail, PDO::PARAM_INT);
            $stmtCocktail->execute();

            $pdo->commit();

            return true;
        } catch (PDOException $e) {
            $pdo->rollBack();

            return false;
        }
    }




}