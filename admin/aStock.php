<?php require_once ('Includes/header.php'); ?>
<?php require_once ('Controllers/aStock_controller.php'); ?>

<?php
//echo '<pre>';
//var_dump($_POST);
//echo '</pre>';
?>

    <span class="message"><?= $message ?></span>
    <span class="error"><?= $error ?></span>

    <form method="get" action="aWine.php">
        <select name="wine_type">
            <option name="wine_type" value="all">All Wines</option>
            <?php foreach ($accessCat as $cat): ?>
                <option name="wine_type" value="<?= $cat->category_id ?>" <?= (isset($_GET['wine_type']) && $cat->category_id == $_GET['wine_type']) ? "selected" : "" ?>><?= $cat->wine_colour ?> <?= $cat->wine_type ?></option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="aCode" value="filter"/>
        <input type="submit" value="Filter"/>
    </form>
    <br>

    <table>
        <tr>
            <th>Wine Name</th>
            <th>Country</th>
            <th>In Stock</th>
            <th>Add Stock</th>
            <th>Add</th>
        </tr>
        <?php foreach ($accessWines as $wine): ?>
            <tr>
                <td><?= $wine->wine_name ?></td>
                <td><?= $wine->country ?></td>
                <td><?= $wine->quantity ?></td>
                <form method="POST" action="aStock.php">
                    <td>Qty : <input type="number" name="quantity" min="0" max="9999" step="1" ></td>
                        <input type="hidden" name="aCode" value="add_stock">
                        <input type="hidden" name="wine" value="<?= $wine->wine_id ?>">
                    <td><input type="submit" value="Add Stock"></td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>

<?php require_once ('Includes/footer.php'); ?>