<?php

include_once $PATHDB.'Functions.php';

class ListaCategorias extends Functions {

    protected $_table = "pages";
    private $title = null;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

}