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
        <p id="hero_line">You: I'm sorry... Can you tell me what happened? I don't
            remember anything. What time is it";
        </p>
        <p id="fisherman_response">Fisherman (gruffly): <?php echo $fisherman->getDialogues()[0] ?> </p>
    </div>
    <div class="d-flex gap-2">
        <div>
            <form method="post" action="../beach/beachStart.php">
                <div id="leave_alone">

                </div>
                <button class="hacking_green_bg border-0" type="submit">Leave him alone</button>
            </form>
        </div>
        <div id="fisherman_dialogue_buttons" class="d-flex gap-1">

            <!-- insist button -->
            <button id="insist" class="hacking_green_bg border-0" type="Type">Insist</button>
            <!-- explanations button -->
            <button id="explanations" class="hacking_green_bg border-0 d-none" type="Type">Ask for explanations</button>
            <!-- //angry button -->
            <button id="angry" class="hacking_green_bg border-0 d-none" type="Type">Get Angry</button>

            <!-- fight button -->
            <form id="fight" method="post" action="fisherman_fight.php" class="d-none">
                <button class="hacking_green_bg border-0" type="submit">Fight</button>
            </form>
        </div>
    </div>
</div>

<script>
    // fisherman dialogue

    const heroLine = document.getElementById("hero_line");
    const fishermanResponse = document.getElementById("fisherman_response");
    const leaveAlone = document.getElementById('leave_alone');

    // first
    const insist = document.getElementById("insist");
    const buttons = document.getElementById('fisherman_dialogue_buttons');

    insist.addEventListener("click", function() {
        heroLine.innerText =
            "You: I really can't remember anything. Please, could you tell me what happened? And also, do you happen to know what time it is?";
        fishermanResponse.innerText =
            "Fisherman (irritatedly): <?php echo $fisherman->getDialogues()[1] ?>";

        // show/hide button
        insist.classList.add("d-none");
        explanations.classList.remove('d-none')
        angry.classList.remove('d-none')

    });

    //second

    //the d-none is a temporary solution. The player shouldn't be able to remove it from inspector 


    // explanations logic
    const explanations = document.getElementById('explanations');

    explanations.addEventListener('click', function() {
        //add dialogue lines
        heroLine.innerText = "You: Like a piece of driftwood?"
        fishermanResponse.innerText = 'Fisherman: <?php echo $fisherman->getDialogues()[2] ?>'
        //hide buttons
        explanations.classList.add('d-none');
        angry.classList.add('d-none');
        leaveAlone.innerHTML += ` <input type="hidden" name="fisherman" value="explanations">`
    })

    // angry logic
    const angry = document.getElementById('angry');
    const fight = document.getElementById('fight')

    angry.addEventListener('click', function() {

        //add dialogue lines
        heroLine.innerText =
            "You (angry) Hey, there's no need to be so rude! I don't remember anything, and I'm just trying to figure out what happened. A little kindness wouldn't hurt, you know!";
        fishermanResponse.innerText =
            "Fisherman(angrily): <?php echo $fisherman->getDialogues()[3] ?> ";

        // hide buttons
        explanations.classList.add('d-none');
        angry.classList.add('d-none');
        leaveAlone.classList.add('d-none');
        fight.classList.remove('d-none');


    })
    // end fisherman dialogue
</script>
<?php include_once '../../partials/footer.php' ?>