<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["destination"])) {
        $selectedDirection = $_POST["destination"];


        switch ($selectedDirection) {
            case "North":
                header("Location: forest/forest_start.php");
                break;
            case "South":
                header("Location: ocean/ocean_start.php");
                break;
            case "East":
                header("Location: beach/fisherman_meeting.php");
                break;
            case "West":
                header("Location: beach/stray_dog_meeting.php");
                break;
            default:
                // invalid direction
                break;
        }
    }
}
