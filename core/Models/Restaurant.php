<?php

namespace Models;

class Restaurant extends AbstractModel implements \JsonSerializable
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

    public function setAdress($adress)
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

    public function save(Restaurant $restaurant)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}
                (name, adress, city) VALUES (:name, :adress, :city)
        ");
        $sql->execute([
            "name"=>$restaurant->name ,
            "adress"=>$restaurant->adress,
            "city"=>$restaurant->city
        ]);

    }

    public function jsonSerialize():mixed
    {
        return[
            "id" => $this->id,
            "name"=> $this->name,
            "adress"=> $this->adress,
            "city"=> $this->city,
        ];

    }

}