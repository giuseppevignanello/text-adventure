<?php
require "../../Classes/Character.php";
require "../../Classes/Playable.php";
require "../../Classes/NPC.php";
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();

// get the beach location 
$beach = $_SESSION['beach'];

?>

<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
</div>
<div id="angry_dog_image">

</div>
<div class="container mt-2">
    <p class="mt-2">
        The dog's eyes lock onto you with a fierce intensity, its gaze unwavering. Its fur stands on end, and its lips
        curl back, revealing a set of menacing teeth. A low, guttural growl rumbles from deep within its throat, the
        sound a clear warning of its hostility. Despite its aggressive stance, you sense a spark of curiosity beneath
        the anger. Perhaps there's a way to gain its trust, a gesture that might soothe its frayed nerves.
    </p>
    <div class="d-flex gap-2">
        <form method="post" action="../beach/beachStart.php">
            <button class="hacking_green_bg border-0" type="submit">Run Again</button>
        </form>
    </div>
</div>
</div>
<?php include_once '../../partials/footer.php' ?>