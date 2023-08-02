<?php

class Locaction
{

    // attributes
    private $name;
    private $description;
    private $objectsPresent;
    private $npcCharacters;
    private $availableActions;
    private $obstacles;
    private $possibleDestinations;
    private $choiceResults;

    //constructor 
    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
        $this->objectsPresent = array();
        $this->npcCharacters = array();
        $this->availableActions = array();
        $this->obstacles = array();
        $this->possibleDestinations = array();
        $this->choiceResults = array();
    }

    //adding methods 

    public function addObject($object)
    {
        $this->objectsPresent[] = $object;
    }

    public function addNPCCharacter($character)
    {
        $this->npcCharacters[] = $character;
    }

    public function addAvailableAction($action)
    {
        $this->availableActions[] = $action;
    }

    public function addObstacle($obstacle)
    {
        $this->obstacles[] = $obstacle;
    }

    public function addPossibleDestination($destination)
    {
        $this->possibleDestinations[] = $destination;
    }

    public function addChoiceResult($choice, $result)
    {
        $this->choiceResults[$choice] = $result;
    }

    //getting methods 

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getObjectsPresent()
    {
        return $this->objectsPresent;
    }

    public function getNPCCharacters()
    {
        return $this->npcCharacters;
    }

    public function getAvailableActions()
    {
        return $this->availableActions;
    }

    public function getObstacles()
    {
        return $this->obstacles;
    }

    public function getPossibleDestinations()
    {
        return $this->possibleDestinations;
    }

    public function getChoiceResult($choice)
    {
        return isset($this->choiceResults[$choice]) ? $this->choiceResults[$choice] : null;
    }
}
