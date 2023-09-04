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
        <button id="punch" class="hacking_green_bg border-0">Punch him</button>
        <button id="guard_yourself" class="hacking_green_bg border-0">Guard Yourself</button>
    </div>

    <div id="fisherman_fight_buttons" class="d-flex gap-2">

    </div>
</div>
</div>

<script>
    //necessary elements 
    const textAreaElement = document.getElementById('text_area');

    const punchElement = document.getElementById('punch');
    const guardElement = document.getElementById('guard_yourself');
    const fishermanButtons = document.getElementById('fisherman_fight_buttons');

    //fisherman Data
    const fishermanAttack = <?php echo json_encode($fisherman->getCharacterData("attack")); ?>;
    const fishermanDefense = <?php echo json_encode($fisherman->getCharacterData("defense")); ?>;

    //Hero Data 
    const heroAttack = <?php echo json_encode($hero->getCharacterData("attack")); ?>;
    const heroDefense = <?php echo json_encode($hero->getCharacterData("defense")); ?>;

    // output texts 

    const victoryScenario =
        `You stand triumphant over the defeated fisherman, his tough exterior finally yielding to your determination. The struggle has left both of you exhausted, but it's you who emerges victorious. As you catch your breath, you notice a subtle nod of respect in the fisherman's eyes. Perhaps you've earned his admiration, or at least a chance at a more peaceful conversation in the future.`
    const winButton = `<form method="post" action="../beach/beachStart.php">
            <button class="hacking_green_bg border-0" type="submit">Come back</button>
            <input type="hidden" name="fisherman_fight" value="win">
        </form>`;
    const defeatScenario =
        `The fisherman's rugged strength proves too much for you to handle. Despite your best efforts, you find yourself defeated, sprawled on the ground as he stands tall, victorious. He grumbles something about 'inexperienced adventurers' before walking away, leaving you to contemplate your defeat and ponder your next move.`;
    const loseButton = `<form method="post" action="../beach/defeat_fisherman.php">
            <button class="hacking_green_bg border-0" type="submit">Next</button>
            <input type="hidden" name="fisherman_fight" value="win">
        </form>`;
    const draw =
        `The battle ends in a stalemate, both you and the fisherman equally matched in strength and determination. Exhausted and bruised, you both step back, realizing that further conflict won't lead to any resolution. With a nod of mutual understanding, you both decide to go your separate ways, leaving the tension between you unresolved for now.`;

    // punche choice

    punchElement.addEventListener('click', function() {
        if (heroAttack > fishermanDefense) {
            textAreaElement.innerHTML = `<p class="mt-2">${victoryScenario}</p>`
            fishermanButtons.innerHTML = winButton
        } else if (heroAttack < fishermanDefense) {
            textAreaElement.innerHTML = `<p class="mt-2">${defeatScenario}</p>`
            fishermanButtons.innerHTML = loseButton
        } else {
            textAreaElement.innerHTML = `<p class="mt-2">${draw} </p>`
        }
    })

    // Guard choice

    guardElement.addEventListener('click', function() {
        if (fishermanAttack > heroDefense) {
            textAreaElement.innerHTML = `<p class="mt-2">${defeatScenario}</p>`
            fishermanButtons.innerHTML = loseButton
        } else if (fishermanAttack < heroDefense) {
            textAreaElement.innerHTML = `<p class="mt-2">${victoryScenario}</p>`
            fishermanButtons.innerHTML = winButton
        } else {
            textAreaElement.innerHTML = `<p class="mt-2">${draw}</p>`
        }
    })
</script>
<?php include_once '../../partials/footer.php' ?>