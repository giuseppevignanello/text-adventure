<?php

require_once "../../Classes/Playable.php";
require '../../Classes/Location.php';
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();

// take beach location

$beach = $_SESSION['beach'];
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
        <div>
            <form method="post" action="../MovingAfterWakingUp.php">
                <button class="hacking_green_bg border-0" type="submit" name="destination" value="North">Go
                    North</button>
                <button class="hacking_green_bg border-0" type="submit" name="destination" value="South">Go
                    South</button>
                <button class="hacking_green_bg border-0" type="submit" name="destination" value="East">Go East</button>
                <button class="hacking_green_bg border-0" type="submit" name="destination" value="West">Go West</button>

            </form>
        </div>
    </div>
</div>

<?php include_once '../../partials/footer.php' ?>