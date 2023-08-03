<?php

require_once "Character.php";

class Playable extends Character
{
    // inventory for hero objects
    private $inventory;

    // parent data
    public function __construct($name, $lifePoints, $attack, $defense)
    {
        parent::__construct($name, $lifePoints, $attack, $defense);

        $this->inventory = array();
    }

    // adding a new object
    public function addToInventory(...$items)
    {
        foreach ($items as $item) {
            $this->inventory[] = $item;
        }
    }

    //getting the inventary 

    public function getInventory()
    {
        return $this->inventory;
    }
}
