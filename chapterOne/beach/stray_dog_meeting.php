<?php
require_once "../../Classes/Playable.php";
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();
?>


<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
    <h2>Stray Dog</h2>
    <form method="post" action="../firstSetting.php">
        <h4>Move: </h4>
        <button class="hacking_green_bg border-0" type="submit">Come back</button>
    </form>
</div>
<?php include_once '../../partials/footer.php' ?>