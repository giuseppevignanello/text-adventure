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
    <div id="text_area">
        <button id="punch" class="hacking_green_bg border-0" type="submit">Punch him</button>
        <button id="guard_yourself" class="hacking_green_bg border-0" type="submit">Guard Yourself</button>
    </div>

    <div class="d-flex gap-2">
        <!-- <form method="post" action="../beach/beachStart.php">
        </form> -->

    </div>
</div>
</div>

<script>
const textAreaElement = document.getElementById('text_area');

const punchElement = document.getElementById('punch');
const guardElement = document.getElementById('guard_yourself');

//fisherman Data
const fishermanAttack = <?php echo json_encode($fisherman->getCharacterData("attack")); ?>;
const fishermanDefense = <?php echo json_encode($fisherman->getCharacterData("defense")); ?>;

//Hero Data 
const heroAttack = <?php echo json_encode($hero->getCharacterData("attack")); ?>;
const heroDefense = <?php echo json_encode($hero->getCharacterData("defense")); ?>;


// punche choice

punchElement.addEventListener('click', function() {
    if (heroAttack > fishermanDefense) {
        textAreaElement.innerHTML = `<p class="mt-2">Hai vinto</p>`
    } else if (heroAttack < fishermanDefense) {
        textAreaElement.innerHTML = `<p class="mt-2">Hai perso</p>`
    } else {
        textAreaElement.innerHTML = `<p class="mt-2">Pareggio </p>`
    }
})

// Guard choice

guardElement.addEventListener('click', function() {
    if (fishermanAttack > heroDefense) {
        textAreaElement.innerHTML = `<p class="mt-2">Hai perso</p>`
    } else if (fishermanAttack < heroDefense) {
        textAreaElement.innerHTML = `<p class="mt-2">Hai vinto</p>`
    } else {
        textAreaElement.innerHTML = `<p class="mt-2">Pareggio</p>`
    }
})
</script>
<?php include_once '../../partials/footer.php' ?>