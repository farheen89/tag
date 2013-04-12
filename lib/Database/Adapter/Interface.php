<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mauricio
 * Date: 10/04/13
 * Time: 22:59
 * To change this template use File | Settings | File Templates.
 */

interface Database_Adapter_Interface{

    public function getConnection($dbconfig);

}