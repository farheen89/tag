<?php

include_once 'Mysql.php';

interface Conn {

    public function getConnection($config);
}