<?php include_once 'partials/header.php' ?>
<header class="p-2">
    <h2>Text adventure</h2>
    <small>made by Giuseppe Vignanello</small>
</header>
<div class="container mt-4">
    <form method="post" action="firstSetting.php">
        <div class="d-flex flex-column">
            <label for="hero_name">Insert your hero name</label>
            <input class="border-0 hacking_green bg-black blinking-placeholder p-1" ype="text" name="hero_name" id="hero_name" required placeholder="|">
        </div>
        <button class="hacking_green_bg border-0 mt-2" type="submit">Confirm</button>
    </form>
</div>

<?php include_once 'partials/footer.php' ?>