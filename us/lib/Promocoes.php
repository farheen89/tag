<?php

include_once 'db/Functions.php';

class Promocoes extends Functions {

    protected $_table = "promocoes";
    private $titulo = null;

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }


}