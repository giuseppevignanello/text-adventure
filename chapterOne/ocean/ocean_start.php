<?php
require_once "../../Classes/Playable.php";
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();
?>


<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
    <p>
        You stand before the vast ocean, where endless waves roll gently onto the shore, creating a mesmerizing rhythm.
        The water stretches as far as the eye can see, blending seamlessly with the horizon. The cool sea breeze brushes
        against your skin, carrying the scent of salt and adventure. Seagulls glide gracefully in the sky, their calls
        echoing in the distance. The soothing sound of waves crashing against the rocks fills the air, inviting you to
        embrace the sense of freedom and wonder that the open sea offers.</p>
    <h4>Move: </h4>
    <div class="d-flex gap-2">
        <div>
            <form method="post" action="../beach/beachStart.php">
                <button class="hacking_green_bg border-0" type="submit">Come back</button>
            </form>
        </div>
        <div>
            <form action="ocean.php" method="post">
                <button class="hacking_green_bg border-0" type="submit">Undress and swim</button>
            </form>
        </div>
    </div>
</div>
<?php include_once '../../partials/footer.php' ?>