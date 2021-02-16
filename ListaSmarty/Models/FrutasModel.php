<?php
class FrutasModel  
{
    private $fruits;
    public function __construct()
    {
        $this->fruits = array("apples", "pears", "bananas", "strawberries");
    }
    public function getFrutas()
    {
        return $this->fruits;
    }
}
