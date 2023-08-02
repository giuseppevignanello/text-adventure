<?php


// declaration of character class
class Character
{
    private $name;
    private $type;
    private $lifePoints;
    private $attack;
    private $defense;

    public function __construct($name, $type, $lifePoints, $attack, $defense)
    {
        $this->name = $name;
        $this->type = $type;
        $this->lifePoints = $lifePoints;
        $this->attack = $attack;
        $this->defense = $defense;
    }

    public function getCharacterData($data)
    {
        if (property_exists($this, $data)) {
            return $this->$data;
        } else {
            return null;
        }
    }

    public function setLifePoints($newValue)
    {
        $this->lifePoints = $newValue;
    }

    public function setAttack($newValue)
    {
        $this->attack = $newValue;
    }

    public function setDefense($newValue)
    {
        $this->defense = $newValue;
    }
}
