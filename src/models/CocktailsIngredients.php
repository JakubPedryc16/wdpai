<?php

class CocktailsIngredients
{
    private $idIngredients;
    private $idCocktails;
    private $amount;

    public function __construct($idIngredients, $idCocktails, $amount)
    {
        $this->$idIngredients = $idIngredients;
        $this->$idCocktails = $idCocktails;
        $this->amount = $amount;
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

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }
}