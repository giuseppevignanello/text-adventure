<?php

require_once "Character.php";

class NPC extends Character
{
    private $dialogues;
    private $tradeInventory;
    private $reactionToActions;

    public function __construct($name, $lifePoints, $attack, $defense)
    {
        parent::__construct($name, $lifePoints, $attack, $defense);
        $this->dialogues = array();
        $this->tradeInventory = array();
        $this->reactionToActions = array();
    }

    // Dialogues
    public function addDialogue($dialogue)
    {
        $this->dialogues[] = $dialogue;
    }

    public function getDialogues()
    {
        return $this->dialogues;
    }

    // Trade Inventory
    public function addToTradeInventory($item)
    {
        $this->tradeInventory[] = $item;
    }

    public function getTradeInventory()
    {
        return $this->tradeInventory;
    }

    // Reaction to Actions
    public function addReactionToAction($action, $reaction)
    {
        $this->reactionToActions[$action] = $reaction;
    }

    public function getReactionToAction($action)
    {
        return isset($this->reactionToActions[$action]) ? $this->reactionToActions[$action] : "";
    }
}
