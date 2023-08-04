<?php
require_once "../Classes/Location.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // take hero name
    $hero_name = $_POST["hero_name"];

    // create hero character
    require_once "../Classes/Playable.php";
    $hero = new  Playable($hero_name, 100, 20, 10);
    $hero->addToInventory("A dead cellphone", "An Empty Wallet", "A set of Keys");
    $hero_inventory = $hero->getInventory();
    // save the hero_data in the session
    $_SESSION["hero"] = $hero;
    $_SESSION["hero_name"] = $hero_name;

    // create beach location

    $beach = new Location("Beach", "a sandy beach with crystal-clear waters and gentle waves.");

    // Access common actions [talk, walk] for the beach
    $commonActions = $beach->getAvailableActions();

    //adding ojbects on starting location 

    $beach->addObject("Palm trees");
    $beach->addObject("Beach umbrellas");
    $beach->addObject("Seashells");

    //adding NPC 
    $beach->addNPCCharacter("Fisherman");
    $beach->addNPCCharacter("Stray Dog");

    //adding possible destinations
    $beach->addPossibleDestination("Forest");
    $beach->addPossibleDestination("Ocean");

    //adding obstacles 
    $beach->addObstacle('A large log');
    $beach->addObstacle('A small stream');
    $beach->addObstacle('A group of noisy tourists');

    $_SESSION['beach'] = $beach;
}
?>

<?php include_once '../partials/header.php' ?>
<div class="container mt-4">
    <?php include_once "../partials/stats.php" ?>
    <div id="beach_image">
    </div>
    <!-- location -->
    <h4><?php echo $beach->getName()  ?>, Morning</h4>
    <p> You wake up on <?php echo $beach->getDescription() ?> You don't know how you ended up here. </p>




    <form method="post" action="MovingAfterWakingUp.php">
        <button class="hacking_green_bg border-0" type="submit" name="destination" value="North">Go North</button>
        <button class="hacking_green_bg border-0" type="submit" name="destination" value="South">Go South</button>
        <button class="hacking_green_bg border-0" type="submit" name="destination" value="East">Go East</button>
        <button class="hacking_green_bg border-0" type="submit" name="destination" value="West">Go West</button>

    </form>


    <!-- end location -->
</div>
<?php include_once '../partials/footer.php' ?>