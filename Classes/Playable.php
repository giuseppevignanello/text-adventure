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

    //remove an object
    public function removeFromInventory($itemToRemove)
    {
        // Search the objects in the inventory
        $key = array_search($itemToRemove, $this->inventory);

        // Remove the object
        if ($key !== false) {
            unset($this->inventory[$key]);
        }
    }
}
