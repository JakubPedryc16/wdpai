<?php

class Cocktail
{
    private $name;
    private $image;
    private $idCocktails;

    public function __construct($name, $image, $idCocktail = null)
    {
        $this->name = $name;
        $this->image = $image;
        $this->idCocktails = $idCocktail;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
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