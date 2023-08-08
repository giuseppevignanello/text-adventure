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
<div id="fisherman_fight_image">
</div>
<div class="container mt-2">
    <p class="mt-2">

    </p>
    <div class="d-flex gap-2">
        <form method="post" action="../beach/beachStart.php">
            <button class="hacking_green_bg border-0" type="submit">Temporary button</button>
        </form>
    </div>
</div>
</div>
<?php include_once '../../partials/footer.php' ?>