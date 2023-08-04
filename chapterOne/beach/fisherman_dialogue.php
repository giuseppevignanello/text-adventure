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
<div id="fisherman_image">
</div>
<div class="container">
    <div id="dialogueContainer">
        <p>You: "I'm sorry... Can you tell me what happened? I don't
            remember"
            anything. What time is it</p>
        <p>Fisherman (gruffly): <?php echo $fisherman->getDialogues()[0] ?> </p>
    </div>
</div>
<?php include_once '../../partials/footer.php' ?>