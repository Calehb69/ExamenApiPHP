<?php

namespace Controllers;

class Restaurant extends AbstractController
{
    protected $defaultModelName = \Models\Restaurant::class ;

    public function index()
    {
        return $this->json($this->defaultModel->findAll() );
    }

    public function new()
    {
        $request = $this->post('json', ['name'=>'text', 'adress'=>'text', 'city'=>'text']);

        if(!$request){
            return $this->json('formulaire mal soumis');
        }


        $restaurant = new \Models\Restaurant();
        $restaurant->setName($request['name']);
        $restaurant->setAdress($request['adress']);
        $restaurant->setCity($request['city']);
        $this->defaultModel->save($restaurant);


        return $this->json("bien crée ton restaurant");
    }


}