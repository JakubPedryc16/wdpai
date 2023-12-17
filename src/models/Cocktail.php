<?php

class Cocktail
{
    private $name;
    private $image;
    private $likeCount;
    private $idCocktails;

    public function __construct($name, $image, $likeCount = 0, $idCocktail = null)
    {
        $this->name = $name;
        $this->image = $image;
        $this->likeCount = $likeCount;
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
    public function getLikeCount()
    {
        return $this->likeCount;
    }

    public function setLikeCount($likeCount)
    {
        $this->likeCount = $likeCount;
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