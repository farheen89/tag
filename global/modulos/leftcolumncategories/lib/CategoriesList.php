<?php

include_once $PATH_DB_GLOBAL.'Functions.php';

class CategoriesList extends Functions {

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