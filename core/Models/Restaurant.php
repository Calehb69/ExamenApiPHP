<?php

namespace Models;

class Restaurant extends AbstractModel
{
    protected string $nomDeLaTable = "restaurant";

    protected $id;
    protected $name;
    protected $adress;
    protected $city;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;

    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function setBrand($adress)
    {
        $this->adress = $adress;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

}