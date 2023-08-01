<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // take hero name
    $hero_name = $_POST["hero_name"];

    //create the hero character
    require_once "Character.php";
    $hero = new Character($hero_name, 'playable', 100, 20, 10);
    var_dump($hero);
}
