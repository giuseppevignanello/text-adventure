<?php
require_once "Character.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the hero is saved correctly 
    if (!isset($_SESSION["hero"])) {
        // If there isn't an hero redirect user on the creation page
        header("Location: heroCreation.php");
        exit;
    }

    // take the hero 
    $hero = $_SESSION["hero"];

    // Create the first opponent
    $firstOpponent = new Character('FirstOpponent', 'opponent', 100, 10, 10);

    // take hero data

    // take hero data
    $hero_name = $hero->getCharacterData("name");
    $hero_attack = $hero->getCharacterData("attack");
    $hero_defense = $hero->getCharacterData("defense");
    $hero_life_points = $hero->getCharacterData('lifePoints');

    // take opponent data
    $firstOpponent_name = $firstOpponent->getCharacterData('name');
    $firstOpponent_attack = $firstOpponent->getCharacterData('attack');
    $firstOpponent_defense = $firstOpponent->getCharacterData('defense');
    $firstOpponent_lifePoints = $firstOpponent->getCharacterData('lifePoints');

    // update data after fight
    if ($hero_attack > $firstOpponent_defense) {
        $damageDealt = $hero_attack - $firstOpponent_defense;
        $firstOpponent->setLifePoints($firstOpponent_lifePoints - $damageDealt);
        $result_message = "Nice shot $hero_name: $firstOpponent_name lost $damageDealt life points";
    } else if ($hero_attack <= $firstOpponent_defense) {
        $damageTaken = $firstOpponent_defense - $hero_attack;
        $hero->setLifePoints($hero_life_points - $damageTaken);
        $result_message = "Oh no, $firstOpponent_name is stronger than you. The attack backfired, you lost $damageTaken life points";
    } else {
        $result_message = "It's a tie";
    }
    // save the opponent in the session
    $_SESSION["opponent"] = $firstOpponent;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Fight</title>
</head>

<body class="bg-success">
    <div class="container">
        <?php if (isset($result_message)) : ?>
            <div class="text-white m-2">
                <h4><?php echo $result_message; ?></h4>
            </div>
        <?php endif; ?>
    </div>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>