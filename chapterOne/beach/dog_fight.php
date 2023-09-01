<?php
require "../../Classes/Character.php";
require "../../Classes/Playable.php";
require "../../Classes/NPC.php";
session_start();
$hero = $_SESSION['hero'];
$hero_inventory = $hero->getInventory();

// get the beach location 
$beach = $_SESSION['beach'];

?>

<?php include_once '../../partials/header.php' ?>
<div class="container">
    <?php include_once '../../partials/stats.php' ?>
</div>
<div id="image_dog">
    <div id="angry_dog_image">

    </div>
</div>
<div class="container mt-2">
    <p id="dog_description" class="mt-2">
        The dog's eyes lock onto you with a fierce intensity, its gaze unwavering. Its fur stands on end, and its lips
        curl back, revealing a set of menacing teeth. A low, guttural growl rumbles from deep within its throat, the
        sound a clear warning of its hostility. Despite its aggressive stance, you sense a spark of curiosity beneath
        the anger. Perhaps there's a way to gain its trust, a gesture that might soothe its frayed nerves.
    </p>
    <div id="dog_buttons" class="d-flex gap-2">
        <!-- run away button -->
        <form id="come_back_dog" method="post" action="../beach/beachStart.php">
            <button class="hacking_green_bg border-0" type="submit">Run Away</button>
        </form>


    </div>
</div>
</div>
<script>
    //get dog elements
    const dogDescription = document.getElementById('dog_description')
    const dogImage = document.getElementById('image_dog')
    const dogButtons = document.getElementById('dog_buttons');

    //come back 
    const comeBackOption = document.getElementById('come_back_dog');
    const comeBackHTML = `<input type="hidden" name="dog" value="sandwichEaten">
                        <button class="hacking_green_bg border-0" type="submit">Come back with the dog</button>`
    // go ahead
    const goAheadButtonHTML = `<form method="post" action="../beach/prova.php">
            <button class="hacking_green_bg border-0" type="submit">Go Ahead</button>
        </form>`
    //get sandwich item
    const sandwich = document.getElementById('item3');

    //drop button html
    const dropSandwichButton = "<button id='drop_sandwich_button' class='hacking_green_bg border-0 ms-2'>Drop</button>"

    //add the drop button to the item 
    sandwich.insertAdjacentHTML("afterend", dropSandwichButton);

    //take the drop button as DOM element 
    const dropSandwichButtonElement = document.getElementById('drop_sandwich_button')

    //pocket close btn 
    const btnClosePocket = document.getElementById('pocket_close_btn');

    //click on drop button
    dropSandwichButtonElement.addEventListener('click', function() {
        //hide the sandwich
        sandwich.classList.add('d-none');
        dropSandwichButtonElement.classList.add('d-none')
        //change dog text 
        dogDescription.innerText =
            'You offer the half-eaten sandwich that was in your pocket to the furious dog. With a hesitant sniff and a cautious glance, the canine warily approaches the offered treat. Seconds later, the irresistible aroma proves too tempting, and the dog devours the sandwich. As the last crumbs disappear, a transformation unfolds. The formerly hostile demeanor softens into a friendly wagging of the tail and a grateful gaze from warm, appreciative eyes. It seems ready to follow you anywhere.';
        //change dog image 
        dogImage.innerHTML = `<div id="friendly_dog"></div>`;
        //add new buttons 
        comeBackOption.innerHTML = comeBackHTML;
        //add go ahead button
        dogButtons.insertAdjacentHTML('beforeend', goAheadButtonHTML)
        btnClosePocket.click();
    })
</script>
<?php include_once '../../partials/footer.php' ?>