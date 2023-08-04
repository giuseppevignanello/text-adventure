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
<div id="fisherman_image">
</div>
<div class="container">
    <div id="dialogueContainer">
        <p id="hero_line">You: "I'm sorry... Can you tell me what happened? I don't
            remember"
            anything. What time is it</p>
        <p id="fisherman_response">Fisherman (gruffly): <?php echo $fisherman->getDialogues()[0] ?> </p>
    </div>
    <div class="d-flex gap-2">
        <div>
            <form method="post" action="../beach/beachStart.php">
                <button class="hacking_green_bg border-0" type="submit">Leave him alone</button>
            </form>
        </div>
        <div>
            <button id="insist" class="hacking_green_bg border-0" type="Type">Insist</button>
        </div>


    </div>
</div>


<script>
// fisherman dialogue

let heroLine = document.getElementById("hero_line");
let fishermanResponse = document.getElementById("fisherman_response");

// first
const insist = document.getElementById("insist");
insist.addEventListener("click", function() {
    heroLine.innerText =
        "You: I really can't remember anything. Please, could you tell me what happened? And also, do you happen to know what time it is?";
    fishermanResponse.innerText =
        "Fisherman (irritatedly): <?php echo $fisherman->getDialogues()[1] ?>";
    insist.classList.add("d-none");

    //add new choice
});

//second
// end fisherman dialogue
</script>
<?php include_once '../../partials/footer.php' ?>