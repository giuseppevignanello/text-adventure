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
<div id="fisherman_image">
</div>
<div class="container">
    <p class="mt-2">The gentle lapping of the ocean waves provides a soothing rhythm, while the sun's golden rays create
        a warm and
        serene atmosphere. Amidst this coastal serenity stands an elderly fisherman, hunched over his fishing rod. With
        a weathered face and eyes that seem to hold a lifetime of wisdom, he appears content in his solitude, giving off
        an aura of not wanting to be disturbed. The rhythmic sound of seagulls adds to the peaceful ambiance, their
        graceful flight complementing the tranquility of the scene. </p>
    <div class="d-flex gap-2">
        <div>
            <form method="post" action="../beach/beachStart.php">
                <button class="hacking_green_bg border-0" type="submit">Come back</button>
            </form>
        </div>
        <div>
            <form action="fisherman_dialogue.php" method="post">
                <button class="hacking_green_bg border-0" type="submit">Talk with him</button>
            </form>
        </div>
    </div>
</div>
<?php include_once '../../partials/footer.php' ?>