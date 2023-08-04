<?php
require_once "../../Classes/Playable.php";
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();
?>


<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
</div>
<div id="dog_image">

</div>
<div class="container">
    <p class="mt-2"></p>You come across a lone figure standing before you – a stray dog. Its shaggy fur ripples in the
    breeze, and its
    warm, brown eyes hold a mix of weariness and curiosity. There is a certain air of independence about this canine
    wanderer, as if it has grown accustomed to the freedom of roaming on this beach. </p>
    <div class="d-flex gap-2">
        <div>
            <form method="post" action="../beach/beachStart.php">
                <button class="hacking_green_bg border-0" type="submit">Come back</button>
            </form>
        </div>
        <div>
            <form action="dog_fight.php" method="post">
                <button class="hacking_green_bg border-0" type="submit">Get close to him</button>
            </form>
        </div>
    </div>
</div>
<?php include_once '../../partials/footer.php' ?>