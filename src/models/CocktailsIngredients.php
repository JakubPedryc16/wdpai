<?php

class CocktailsIngredients
{
    private $idIngredients;
    private $idCocktails;

    public function __construct($idIngredients, $idCocktails)
    {
        $this->$idIngredients = $idIngredients;
        $this->$idCocktails = $idCocktails;
    }

    public function getIdIngredients()
    {
        return $this->idIngredients;
    }

    public function setIdIngredients($idIngredients)
    {
        $this->idIngredients = $idIngredients;
    }
    public function getIdCocktails()
    {
        return $this->idCocktails;
    }

    public function setIdCocktails($idCocktails)
    {
        $this->idCocktails = $idCocktails;
    }
}