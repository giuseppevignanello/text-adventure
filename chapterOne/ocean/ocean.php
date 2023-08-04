<?php

require_once "../../Classes/Playable.php";
require '../../Classes/Location.php';
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();

// create ocean location
$ocean = new Location("Ocean", "A tranquil ocean, with gentle waves, a serene atmosphere, and the occasional cry of seagulls.")

?>

<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
    <h2><?php echo $ocean->getName() ?></h2>
</div>
<div id="ocean_image">
</div>
<div class="container">
    <p> <?php echo $ocean->getDescription() ?> </p>
    <div class="d-flex gap-2 mt-4">
        <div>
            <form method="post" action="../firstSetting.php">
                <button class="hacking_green_bg border-0" type="submit">Back to shore </button>
            </form>
        </div>
    </div>
</div>

<?php include_once '../../partials/footer.php' ?>