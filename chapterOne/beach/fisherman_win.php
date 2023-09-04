<?php
require "../../Classes/Character.php";
require "../../Classes/Playable.php";
require "../../Classes/NPC.php";
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();

// get the beach location 
$beach = $_SESSION['beach'];

//get the fisherman 

$fisherman = $_SESSION['fisherman'];

?>

<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
</div>
<div id="fisherman_win_image">
</div>
<div class="container mt-2">
    <div id="text_area">
        <p> You: Hi</p>
        <p> Fisherman: You again... Please don't hurt</p>
    </div>

    <div id="buttons" class="d-flex gap-2">

    </div>
</div>
</div>

<?php include_once '../../partials/footer.php' ?>