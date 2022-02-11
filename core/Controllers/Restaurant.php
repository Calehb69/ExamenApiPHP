<?php

namespace Controllers;

class Restaurant extends AbstractController
{
    protected $defaultModelName = \Models\Restaurant::class ;

    public function index()
    {
        return $this->json($this->defaultModel->findAll() );
    }


}