<?php

include_once $PATH_CORE_DB.'Functions.php';

class CategoriesList extends Functions {

    protected $_table = "categories";
    protected $Title = null;


    public function setTitle($Title)
    {
        $this->Title = $Title;
    }

    public function getTitle()
    {
        return $this->Title;
    }

}