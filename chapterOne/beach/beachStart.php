<?php

require_once "../../Classes/Playable.php";
require '../../Classes/Location.php';
require '../../Classes/NPC.php';
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();

// take beach location

$beach = $_SESSION['beach'];

$fisherman_win = false;

// if you have already asked the fisherman

if (isset($_POST['fisherman']) && $_POST['fisherman'] === "explanations") {
    $fisherman = $_SESSION['fisherman'];
    $fisherman->clearDialogues();
    $fisherman->addDialogue('Are you here again?');
    $fisherman->addDialogue('');
    $fisherman->addDialogue('');
    $fisherman->addDialogue("You've got some nerve, don't ya? I've had enough of your attitude! If you want a fight, you've got it!");
    $_SESSION['fisherman'] = $fisherman;
};

//if you’ve already met the dog
if (isset($_POST['dog']) && $_POST['dog'] === "sandwichEaten") {
    $hero->removeFromInventory("A half-eaten sandwich");
    $_SESSION['hero'] = $hero;
}

//if you won the fight with the fisherman 

if (isset($_POST['fisherman_fight']) && $_POST['fisherman_fight'] === "win") {
    $fisherman = $_SESSION['fisherman'];
    $fisherman->clearDialogues();
    $fisherman->addDialogue('You again... please don`t hurt me ');
    $_SESSION['fisherman'] = $fisherman;
    $fisherman_win = true;
};


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
            <form
                <?php echo $fisherman_win ? "action = './fisherman_win.php'" : "action = './fisherman_dialogue.php'" ?>
                method="post">
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
<script>
//hide the sandwich
document.getElementById('item3').classList.add('d-none')
</script>

<?php include_once '../../partials/footer.php' ?>