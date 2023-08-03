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
    // save the hero in the session
    $_SESSION["hero"] = $hero;

    // create starting location

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
}
?>

<?php include_once '../partials/header.php' ?>
<div class="container mt-4">
    <h5>Hi <?php echo $hero_name ?></h5>

    <!-- hero stats -->
    <div class="accordion py-2" id="accordionStats">
        <div class="accordion-item">
            <h6 id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Your stats:
                </button>
            </h6>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionStats">
                <div class="accordion-body">
                    <p> Life Points: <?php echo $hero->getCharacterData("lifePoints") ?> <br>
                        Attack: <?php echo $hero->getCharacterData("attack") ?> <br>
                        Defense: <?php echo $hero->getCharacterData("defense") ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- end hero stats -->

    <!-- location -->
    <h4><?php echo $beach->getName()  ?>, Morning</h4>
    <p> You wake up on <?php echo $beach->getDescription() ?> You don't know how you ended up here. </p>

    <!-- Button trigger modal -->
    <button type="button" class="my-2 hacking_green_bg border-0" data-bs-toggle="modal" data-bs-target="#checkYourkPocketsModal">
        Check Your Pockets
    </button>
    <!-- Modal -->
    <div class="modal fade" id="checkYourkPocketsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">The contents of your pockets</h5>
                    <button type="button" class="btn-close hacking_green_bg" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <ul>
                            <?php
                            foreach ($hero_inventory as $item) {
                                echo "<li> {$item} </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form method="post" action="MovingAfterWakingUp.php">
        <h4>Move: </h4>
        <button class="hacking_green_bg border-0" type="submit" name="destination" value="North">Go North</button>
        <button class="hacking_green_bg border-0" type="submit" name="destination" value="South">Go South</button>
        <button class="hacking_green_bg border-0" type="submit" name="destination" value="East">Go East</button>
        <button class="hacking_green_bg border-0" type="submit" name="destination" value="West">Go West</button>

    </form>


    <!-- end location -->
</div>
<?php include_once '../partials/footer.php' ?>