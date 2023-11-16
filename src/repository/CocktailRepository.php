<?php

require_once __DIR__.'/../models/Cocktail.php';
require_once 'Repository.php';

class CocktailRepository extends Repository
{
    public function getCocktail(int $cocktails_id) {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.cocktails WHERE cocktails_id = :cocktails_id 
        ');
        $stmt->bindParam(':$cocktails_id',$cocktails_id,PDO::PARAM_INT);
        $stmt->execute();

        $cocktail = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$cocktail){
            return null;
        }
        return new Cocktail(
            $cocktail['name'],
            $cocktail['image']
        );
    }

    public function addCocktail(Cocktail $cocktail) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO cocktails (name, image)
            VALUES (?, ?)
        ');
        $stmt->execute([
            $cocktail->getName(),
            $cocktail->getImage(),
        ]);
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
                $cocktail['image']
            );
        }
        return $result;
    }
}