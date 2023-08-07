<?php

require_once "../../Classes/Playable.php";
require '../../Classes/Location.php';
require '../../Classes/NPC.php';
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();

// take beach location

$beach = $_SESSION['beach'];

if (isset($_POST['fisherman']) && $_POST['fisherman'] === "explanations") {
    $fisherman = $_SESSION['fisherman'];
    $fisherman->clearDialogues();
    $fisherman->addDialogue('Are you here again?');
    $_SESSION['fisherman'] = $fisherman;
}


?>

<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
    <h2><?php echo $beach->getName() ?></h2>
</div>
<div id="beach_image">
</div>
<div class="container">
    <p> <?php echo $beach->getDescription() ?> </p>
    <div class="d-flex gap-2 mt-4">
        <div class="d-flex gap-2">
            <form action="../forest/forest_start.php" method="post">
                <button class="hacking_green_bg border-0" type="submit" name="destination" value="North">Go
                    North</button>
            </form>
            <form action="../ocean/ocean_start.php" method="post">
                <button class="hacking_green_bg border-0" type="submit" name="destination" value="South">Go
                    South</button>
            </form>
            <form action="./fisherman_dialogue.php" method="post">
                <button class="hacking_green_bg border-0" type="submit" name="destination" value="East">Go
                    East</button>
            </form>
            <form action="../MovingAfterWakingUp.php" method="post">
                <button class="hacking_green_bg border-0" type="submit" name="destination" value="West">Go
                    West</button>
            </form>
        </div>
    </div>
</div>

<?php include_once '../../partials/footer.php' ?>