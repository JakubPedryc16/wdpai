<?php

class Cocktail
{
    private $name;
    private $image;
    private $likeCount;
    private $cocktails_id;

    public function __construct($name, $image, $likeCount = 0, $cocktails_id = null)
    {
        $this->name = $name;
        $this->image = $image;
        $this->likeCount = $likeCount;
        $this->cocktails_id = $cocktails_id;
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

    public function getCocktailsId()
    {
        return $this->cocktails_id;
    }

    public function setCocktailsId($cocktails_id)
    {
        $this->cocktails_id = $cocktails_id;
    }

}