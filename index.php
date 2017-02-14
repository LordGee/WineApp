<?php require_once ("Includes/header.php"); ?>
<?php
//if (isset($_SESSION)) {
//    echo '<pre>';
//    var_dump($_SESSION);
//    echo '</pre>';
//    echo '<br/>';
//    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
//    echo '<br/>';
//    echo '<pre>' . print_r($currentUser, TRUE) . '</pre>';
//    echo '<br/>';
//    echo '<pre>';
//    var_dump($currentUser);
//    echo '</pre>';
//}
?>

    <h1>Welcome <?= $currentUser[0]->first_name ?></h1>

            <h1>H1 Tag</h1>
            <h2>H2 Tag</h2>
            <h3>H3 Tag</h3>
            <p>Paragraph tag</p>
            <li>List Item Tags</li>
            <a>Ancor Tag</a>

            <img src="image/2glass.jpg" alt="Enjoy a little sparkle" title="Click here to explore more."/>

<?php require_once ("Includes/footer.php"); ?>
