<?php require_once ('Includes/header.php'); ?>
<?php require_once ('Controllers/aWine_controller.php'); ?>

<?php
//echo '<pre>';
//var_dump($_POST);
//echo '</pre>';
?>
    <span class="message"><?= $message ?></span>
    <span class="error"><?= $error ?></span>

    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h1>Product Management</h1>
            <form method="get" action="awine.php">
                <label for="addWine">Add a new wine</label>
                <input type="hidden" name="aCode" value="add_wine">
                <input type="submit" id="addWine" value="Add Wine">
            </form>
        </div>
    </div>
    <br>

    <?php if(isset($_GET["aCode"]) && $_GET["aCode"] == "wine_mod"): ?>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h1>Product Update</h1>
            <form method="post" action="aWine.php" enctype="multipart/form-data">
                <label for="wine_nameU">Wine Name : </label>
                <input type="text" id="wine_nameU" name="wine_name" value="<?= $accessWines[0]->wine_name ?>" >
                <br><br>
                <label for="countryU">Country : </label>
                <input type="text" id="countryU" name="country" value="<?= $accessWines[0]->country ?>" >
                <br><br>
                <label for="bottle_sizeU">Bottle Size : </label>
                <input type="text" id="bottle_sizeU" name="bottle_size" value="<?= $accessWines[0]->bottle_size ?>" >
                <br><br>
                <label for="price_per_bottleU">Price : </label>
                <input type="text" id="price_per_bottleU" name="price_per_bottle" value="<?= $accessWines[0]->price_per_bottle ?>" >
                <br><br>
                <label for="asset_current">Current Image : </label>
                <input type="hidden" id="asset_current" name="asset_current" value="<?= $accessWines[0]->asset_link ?>" >
                <img src="../<?= $accessWines[0]->asset_link ?>" alt="Picture of <?= $accessWines[0]->wine_name ?>" height="50px">
                <br><br>
                <label for="asset_linkU">Upload New Image : </label>
                <input type="file" id="asset_linkU" name="asset_link" >
                <br><br>
                <label for="descriptionU">Description : </label>
                <textarea name="description" id="descriptionU" rows="6" cols="50"><?= $accessWines[0]->description ?></textarea>
                <br><br>
                <label for="categoryU">Category : </label>
                <select name="category" id="categoryU">
                    <?php foreach ($accessCat as $cat): ?>
                        <option name="category" value="<?= $cat->category_id ?>" <?= ($cat->category_id == $accessWines[0]->category_id_fk) ? "selected" : "" ?> ><?= $cat->wine_colour ?> <?= $cat->wine_type ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="categoryU"></div>
                <input type="hidden" name="aCode" value="update">
                <input type="hidden" name="wine" value="<?= $accessWines[0]->wine_id ?>">
                <br><br>
                <input type="submit" name="update" value="Update">
                <input type="submit" name="cancel" value="Cancel">
                <div class="warning">
                    <input type="button" name="remove" value="Remove">
                </div>
            </form>
        </div>
    </div>
    <?php elseif (isset($_GET["aCode"]) && $_GET["aCode"] == "add_wine"): ?>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h2>Add New Product</h2>
            <form method="post" action="aWine.php" enctype="multipart/form-data">
                <label for="wine_name">Wine Name : </label>
                <input type="text" id="wine_name" name="wine_name" placeholder="Enter Wine Name" >
                <br><br>
                <label for="country">Country : </label>
                <input type="text" id="country" name="country" placeholder="Enter Country of Origin" >
                <br><br>
                <label for="bottle_size">Bottle Size : </label>
                <input type="number" step="1" id="bottle_size" name="bottle_size" placeholder="Enter Size of Bottle (ml)" >
                <br><br>
                <label for="price_per_bottle">Price : </label>
                <input type="number" step="any" id="price_per_bottle" name="price_per_bottle" placeholder="Enter the Price per bottle (£)" >
                <br><br>
                <label for="asset_link">Upload New Image : </label>
                <input type="file" id="asset_link" name="asset_link"  >
                <br><br>
                <label for="description">Description : </label>
                <textarea name="description" id="description" rows="5" cols="50" placeholder="Enter Description of this Product"></textarea>
                <br><br>
                <label for="category">Category : </label>
                <select name="category" id="category">
                    <option name="category" disabled selected>Choose a Category</option>
                    <?php foreach ($accessCat as $cat): ?>
                        <option name="category" value="<?= $cat->category_id ?>"><?= $cat->wine_colour ?> <?= $cat->wine_type ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="category">
                    <br><br>
                    <select name="lvl" id="level">
                        <label for="level">Level Indicator : </label>
                        <option name="lvl" value="" >Select a Category First</option>
                    </select>
                </div>
                <br><br>
                <input type="hidden" name="aCode" value="add">
                <input type="submit" name="add" value="Add Wine">
                <input type="submit" name="cancel" value="Cancel">
            </form>
        </div>
    </div>
    <?php else: ?>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h2>Wine Products</h2>
            <form method="get" action="aWine.php">
                <select name="wine_type">
                    <option name="wine_type" value="all">All Wines</option>
                    <?php foreach ($accessCat as $cat): ?>
                        <option name="wine_type" value="<?= $cat->category_id ?>" <?= (isset($_GET['wine_type']) && $cat->category_id == $_GET['wine_type']) ? "selected" : "" ?>><?= $cat->wine_colour ?> <?= $cat->wine_type ?></option>
                    <?php endforeach; ?>
                </select>
                <br><br>
                <input type="hidden" name="aCode" value="filter"/>
                <input type="submit" value="Filter"/>
            </form>
            <br>
            <div class="tableData">
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
            </div>
        </div>
    </div>
    <?php endif; ?>
    <script src="../JavaScript/WineLevel.js"></script>
    <script src="../JavaScript/warning.js"></script>
<?php require_once ('Includes/footer.php'); ?>