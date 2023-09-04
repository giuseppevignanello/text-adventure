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
    $fisherman->addDialogue('Well, this here\'s Serenity Cove, a quiet spot tucked away from the rest of the world. Not much happens here, just a place for folks like me to fish and enjoy some peace and quiet. You won\'t find many folks around here, that\'s for sure. ');
    $fisherman->addDialogue('Well, lad, there are two ways out of this place. The forest to the north is your path if you want to head back inland. It\'s a bit of a hike, but the shade from those trees can be mighty welcoming. Alternatively, you can head south towards the ocean. But it\'s hard without a boat \n Mind you, each route has its own challenges, so be prepared. The forest can get pretty dense, and who knows what critters lurk in there. The sea, on the other hand, can be unpredictable. So, where will your journey take you?');
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
            <form <?php echo $fisherman_win ? "action = './fisherman_win.php'" : "action = './fisherman_dialogue.php'" ?> method="post">
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