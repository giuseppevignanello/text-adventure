<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // take hero name
    $hero_name = $_POST["hero_name"];

    // create hero character
    require_once "Character.php";
    $hero = new Character($hero_name, 'playable', 100, 20, 10);

    // save the hero in the session
    $_SESSION["hero"] = $hero;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>First Fight</title>
</head>

<body class="bg-success text-white">
    <div class="container mt-4">
        <form method="post" action="firstFight.php">
            <h5>Hi <?php echo $hero_name ?></h5>
            <h6>These are your points:</h6>
            <p> Life Points: <?php echo $hero->getCharacterData("lifePoints") ?> <br>
                Attack: <?php echo $hero->getCharacterData("attack") ?> <br>
                Defense: <?php echo $hero->getCharacterData("defense") ?>
            </p>
            <h4>Enjoy your first fight</h4>
            <button class="btn btn-primary" type="submit">Fight</button>
        </form>
    </div>
</body>

</html>