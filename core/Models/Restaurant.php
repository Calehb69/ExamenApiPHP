<?php

namespace Models;

class Restaurant extends AbstractModel implements \JsonSerializable
{
    protected string $nomDeLaTable = "restaurant";

    protected $id;
    protected $name;
    protected $address;
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

    public function getAddress()
    {
        return $this->adress;
    }

    public function setAddress($address)
    {
        $this->address = $address;
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
                (name, address, city) VALUES (:name, :address, :city)
        ");
        $sql->execute([
            "name"=>$restaurant->name ,
            "address"=>$restaurant->address,
            "city"=>$restaurant->city
        ]);

    }

    public function jsonSerialize():mixed
    {
        return[
            "id" => $this->id,
            "name"=> $this->name,
            "address"=> $this->address,
            "city"=> $this->city,
        ];

    }

}