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
<div id="fisherman_win_image">
</div>
<div class="container mt-2">
    <div id="text_area">
        <p id="hero_line"> You: Hi...</p>
        <p id="fisherman_line"> Fisherman: You again... Please don't hurt me</p>
    </div>

    <div id="buttons" class="d-flex gap-2">
        <button id="informations" class="hacking_green_bg border-0">Ask for
            informations</button>
        <button id="informations2" class="hacking_green_bg border-0 d-none">
            Ask more
        </button>
        <div id='selections' class="d-flex gap-2 d-none">
            <form id='ocean' action="../ocean/ocean_start.php" method="post">
                <button class="hacking_green_bg border-0" type="submit">
                    Ocean
                </button>
            </form>
            <form id='forest' action="../forest//forest_start.php" method="post">
                <button class="hacking_green_bg border-0" type="submit">
                    Forest
                </button>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    //necessary elements 
    const textAreaElement = document.getElementById('text_area');
    const heroLineElement = document.getElementById('hero_line');
    const fishermanLineElement = document.getElementById('fisherman_line');

    //buttons 
    const informationsButton = document.getElementById('informations');
    const informationsButton2 = document.getElementById('informations2');
    const selectionsButton = document.getElementById('selections');

    informationsButton.addEventListener('click', function() {
        heroLineElement.innerText = 'You: What place is this? Where am I?';
        fishermanLineElement.innerText = "Fisherman: <?php echo $fisherman->getDialogues()[1]; ?>"
        informationsButton.classList.add('d-none');
        informationsButton2.classList.remove('d-none')
    })

    informationsButton2.addEventListener('click', function() {
        heroLineElement.innerText = 'You: How do I get out of here?'
        fishermanLineElement.innerText = "Fisherman: <?php echo $fisherman->getDialogues()[2]; ?>"
        informationsButton2.classList.add('d-none');
        selectionsButton.classList.remove('d-none');
    })
</script>

<?php include_once '../../partials/footer.php' ?>