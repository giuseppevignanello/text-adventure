<?php

session_start();

require_once "Character.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // take hero name
    $hero_name = $_POST["hero_name"];

    //create the hero character
    require_once "Character.php";
    $hero = new Character($hero_name, 'playable', 100, 20, 10);


    //create the first Opponent
    require_once('Character.php');

    $firstOpponent = new Character('FirstOpponent', 'opponent', 100, 10, 10);


    // get Hero data
    $hero_attack = $hero->getCharacterData("attack");
    $hero_defense = $hero->getCharacterData("defense");
    $hero_life_points = $hero->getCharacterData('lifePoints');


    // get opponent data

    $firstOpponent_name = $firstOpponent->getCharacterData('name');
    $firstOpponent_attack = $firstOpponent->getCharacterData('attack');
    $firstOpponent_defense = $firstOpponent->getCharacterData('defense');
    $firstOpponent_lifePoints = $firstOpponent->getCharacterData('lifePoints');


    // add fighting logic

    if ($hero_attack > $firstOpponent_defense) {
        $damageDealt = $hero_attack;
        $firstOpponent_lifePoints -= $damageDealt;
        echo ("Nice shot $hero_name: $firstOpponent_name lost $hero_attack life points");
    } else if ($hero_attack < $firstOpponent_defense) {
        $damageTaken = $firstOpponent_defense - $hero_attack;
        $hero_life_points -= $damageTaken;
        echo ("oh no, $firstOpponent_name is stronger than you. The attack backfired, you lost $hero_attack life points");
    } else {
        echo ("tie");
    }

    // update the characters data
    $hero->updateCharacterData('lifePoints', $hero_life_points);
    $firstOpponent->updateCharacterData('lifePoints', $firstOpponent_lifePoints);
    $_SESSION["avversario"] = $firstOpponent;
}
