<?php require_once ("Includes/header.php"); ?>
<?php require_once("Includes/session.php"); ?>
    <h1>Welcome <?= $_SESSION["loggedInUser"]->first_name ?></h1>
            <h2>H2 Tag</h2>
            <h3>H3 Tag</h3>
            <p>Paragraph tag</p>
            <li>List Item Tags</li>
            <a>Ancor Tag</a>

            <img src="image/2glass.jpg" alt="Enjoy a little sparkle" title="Click here to explore more." />

<?php require_once ("Includes/footer.php"); ?>