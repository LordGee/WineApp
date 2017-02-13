<?php require_once("Includes/session.php"); ?>
<?php require_once ("Includes/header.php"); ?>
    <h1>Welcome <?= $_SESSION["User"]->first_name; ?></h1>
    <h1>Welcome <?= $currentUser->first_name; ?></h1>
    <h1>Welcome <?= $_SESSION["blah"]; ?></h1>
            <h2>H2 Tag</h2>
            <h3>H3 Tag</h3>
            <p>Paragraph tag</p>
            <li>List Item Tags</li>
            <a>Ancor Tag</a>
    <?php foreach ($_SESSION["User"] as $thisUser): ?>
        <p><?= $thisUser->first_name ?></p>
        <p><?= $balls ?></p>
    <?php endforeach; ?>

            <img src="image/2glass.jpg" alt="Enjoy a little sparkle" title="Click here to explore more." />

<?php require_once ("Includes/footer.php"); ?>