<?php

include_once $PATH_DB_CORE.'Functions.php';

class SearchEngine3 extends Functions {

    protected $_table = "tbl_products";
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