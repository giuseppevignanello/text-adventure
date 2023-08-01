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
}
