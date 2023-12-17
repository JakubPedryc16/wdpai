<?php

namespace models;

class Ingredient
{
    private $name;
    private $image;
    private $idIngredients;

    public function __construct($name, $image, $idIngredients = null)
    {
        $this->name = $name;
        $this->image = $image;
        $this->idIngredients = $idIngredients;
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
    public function getIdIngredients()
    {
        return $this->idIngredients;
    }

    public function setIdIngredients($idIngredients)
    {
        $this->idIngredients = $idIngredients;
    }

}