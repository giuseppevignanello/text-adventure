<?php

require_once "../../Classes/Playable.php";
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();
?>

<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
    <p>You stand before a serene forest, where tall trees stand proudly, forming a peaceful and harmonious scene. The
        dappled sunlight filters through the foliage, casting a calming glow on the forest floor. Soft rustling of
        leaves and the occasional bird chirp create a tranquil ambiance. The forest's earthy fragrance embraces you,
        evoking a sense of tranquility and connection to nature. It invites you to explore its hidden paths and immerse
        yourself in the serenity of the wilderness.</p>
    <h4>Move: </h4>
    <div class="d-flex gap-2">
        <div>
            <form method="post" action="../firstSetting.php">
                <button class="hacking_green_bg border-0" type="submit">Come back</button>
            </form>
        </div>
        <div>
            <form action="forest.php" method="post">
                <button class="hacking_green_bg border-0" type="submit">Go into the forest</button>
            </form>
        </div>
    </div>
</div>
<?php include_once '../../partials/footer.php' ?>