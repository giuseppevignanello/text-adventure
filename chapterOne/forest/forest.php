<?php

require_once "../../Classes/Playable.php";
require '../../Classes/Location.php';
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();

// create forest location
$forest = new Location('Forest', 'A serene forest, filled with towering trees and a peaceful ambiance.')

?>

<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
    <h2><?php echo $forest->getName() ?></h2>
</div>
<div id="forest_image">
</div>
<div class="container">
    <p> <?php echo $forest->getDescription() ?> </p>
    <div class="d-flex gap-2 mt-4">
        <div>
            <form method="post" action="../beach/beachStart.php">
                <button class="hacking_green_bg border-0" type="submit">Get out of the forest </button>
            </form>
        </div>
    </div>
</div>

<?php include_once '../../partials/footer.php' ?>