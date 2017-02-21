<?php require_once ('Includes/header.php'); ?>
<?php require_once ('Controllers/aWine_controller.php'); ?>

<?php
echo '<pre>';
var_dump($_POST);
echo '</pre>';
?>
    <span id="message"><?= $message ?></span>
    <span id="error"><?= $error ?></span>

    <form method="get" action="awine.php">
        <label for="addWine">Add a new wine</label>
        <input type="hidden" name="aCode" value="add_wine">
        <input type="submit" value="Add Wine">
    </form>
    <br>

    <?php if(isset($_GET["aCode"]) && $_GET["aCode"] == "wine_mod"): ?>
        <form method="post" action="aWine.php" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Wine Name : </th>
                <td>
                    <input type="text" name="wine_name" value="<?= $accessWines[0]->wine_name ?>" >
                </td>
            </tr>
            <tr>
                <th>Country : </th>
                <td>
                    <input type="text" name="country" value="<?= $accessWines[0]->country ?>" >
                </td>
            </tr>
            <tr>
                <th>Bottle Size : </th>
                <td>
                    <input type="text" name="bottle_size" value="<?= $accessWines[0]->bottle_size ?>" >ml
                </td>
            </tr>
            <tr>
                <th>Price : </th>
                <td>
                    £<input type="text" name="price_per_bottle" value="<?= $accessWines[0]->price_per_bottle ?>" >
                </td>
            </tr>
            <tr>
                <th>Current Image : </th>
                <td>
                    <input type="hidden" name="asset_current" value="<?= $accessWines[0]->asset_link ?>" >
                    <img src="../<?= $accessWines[0]->asset_link ?>" alt="Picture of <?= $accessWines[0]->wine_name ?>" height="50px">
                </td>
            </tr>
            <tr>
                <th>Upload New Image : </th>
                <td>
                    <input type="file" name="asset_link"  >
                </td>
            </tr>
            <tr>
                <th>Description : </th>
                <td>
                    <textarea name="description" rows="6" cols="50"><?= $accessWines[0]->description ?></textarea>
                </td>
            </tr>
            <tr>
                <th>Category : </th>
                <td>
                    <select name="category">
                        <?php foreach ($accessCat as $cat): ?>
                            <option name="category" value="<?= $cat->category_id ?>" <?= ($cat->category_id == $accessWines[0]->category_id_fk) ? "selected" : "" ?> ><?= $cat->wine_colour ?> <?= $cat->wine_type ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>
            <input type="hidden" name="aCode" value="update">
            <input type="hidden" name="wine" value="<?= $accessWines[0]->wine_id ?>">
            <input type="submit" name="update" value="Update">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    <?php elseif (isset($_GET["aCode"]) && $_GET["aCode"] == "add_wine"): ?>
    <form method="post" action="aWine.php" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Wine Name : </th>
                <td>
                    <input type="text" name="wine_name" placeholder="Enter Wine Name" >
                </td>
            </tr>
            <tr>
                <th>Country : </th>
                <td>
                    <input type="text" name="country" placeholder="Enter Country of Origin" >
                </td>
            </tr>
            <tr>
                <th>Bottle Size : </th>
                <td>
                    <input type="text" name="bottle_size" placeholder="Enter Size of Bottle (ml)" >ml
                </td>
            </tr>
            <tr>
                <th>Price : </th>
                <td>
                    £<input type="number" step="any" name="price_per_bottle" placeholder="Enter the Price per bottle" >
                </td>
            </tr>
            <tr>
                <th>Upload New Image : </th>
                <td>
                    <input type="file" name="asset_link"  >
                </td>
            </tr>
            <tr>
                <th>Description : </th>
                <td>
                    <textarea name="description" rows="6" cols="50" placeholder="Enter Description of this Product"></textarea>
                </td>
            </tr>
            <tr>
                <th>Category : </th>
                <td>
                    <select name="category">
                        <?php foreach ($accessCat as $cat): ?>
                            <option name="category" value="<?= $cat->category_id ?>"><?= $cat->wine_colour ?> <?= $cat->wine_type ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>
        <input type="hidden" name="aCode" value="add">
        <input type="submit" name="add" value="Add Wine">
        <input type="submit" name="cancel" value="Cancel">
    </form>
    <?php else: ?>
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
            <th>Bottle Size</th>
            <th>Price Per Bottle</th>
            <th>Category</th>
            <th>In Stock</th>
            <th>Modify</th>
        </tr>
        <?php foreach ($accessWines as $wine): ?>
        <tr>
            <td><?= $wine->wine_name ?></td>
            <td><?= $wine->country ?></td>
            <td><?= $wine->bottle_size ?></td>
            <td><?= $wine->price_per_bottle ?></td>
            <td><?= $wine->wine_colour ?> <?= $wine->wine_type ?></td>
            <td><?= $wine->quantity ?></td>
            <td>
                <form method="get" action="aWine.php">
                    <input type="hidden" name="aCode" value="wine_mod">
                    <input type="hidden" name="wine" value="<?= $wine->wine_id ?>">
                    <input type="submit" value="Modify">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

<?php require_once ('Includes/footer.php'); ?>