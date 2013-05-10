<?php

include_once $PATHDB.'Functions.php';

class LeftColumnCategories extends Functions{

    protected $_table = "categories";

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }



}