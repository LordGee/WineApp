<?php require_once ('Includes/header.php'); ?>
<?php require_once ('Controllers/aUser_controller.php'); ?>

<?php
//echo '<pre>';
//var_dump($order_lines);
//echo '</pre>';
?>

    <span class="message"><?= $message ?></span>
    <span class="error"><?= $error ?></span>

    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12">
            <h1>User Administration</h1>
            <p>Search by first or last name to filter the users. Clicking the details button will retrieve the details
                of the customer. These details show the the following details: </p>
            <div class="col-lg-6 col-md-6 col-sm-12 listItems">
                <ul>
                    <li>Customer Details</li>
                    <li>Reset Customer Password</li>
                    <li>Allocate administrative privilege</li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 listItems">
                <ul>
                    <li>Customer Address Details</li>
                    <li>Order History (Summary)</li>
                    <li>Detailed Order Information</li>

                </ul>
            </div>
        </div>
    </div>

    <?php if (isset($_POST['aCode']) && $_POST['aCode'] == 'details'): ?>
        <h2>Customer Details</h2>
        <table>
            <tr>
                <th>First Name : </th>
                <td><?= $customer[0]->first_name ?></td>
            </tr>
            <tr>
                <th>Last Name : </th>
                <td><?= $customer[0]->last_name ?></td>
            </tr>
            <tr>
                <th>Phone Number : </th>
                <td><?= $customer[0]->phone_number ?></td>
            </tr>
            <tr>
                <th>Email Address : </th>
                <td><?= $customer[0]->email_address ?></td>
            </tr>
            <tr>
                <th>Reset Password : </th>
                <td>
                    <form method="post" action="aUser.php">
                        <input type="hidden" name="aCode" value="email_reset">
                        <input type="hidden" name="id" value="<?= $customer[0]->customer_id ?>">
                        <input type="hidden" name="name" value="<?= $customer[0]->first_name ?> <?= $customer[0]->last_name ?>">
                        <input type="hidden" name="email" value="<?= $customer[0]->email_address ?>">
                        <input type="submit" value="Reset Password">
<!--                        TODO: Button that send email link to user to change their password -->
                    </form>
                </td>
            </tr>
            <tr>
                <th>Administrator : </th>
                <td>
                    <form method="post" action="aUser.php">
                        <input type="checkbox" name="admin" <?= ($customer[0]->access == 111078) ? "checked" : "" ?>>
                        <input type="hidden" name="aCode" value="set_admin">
                        <input type="hidden" name="id" value="<?= $customer[0]->customer_id ?>">
                        <input type="submit" value="Make Admin" <?= ($customer[0]->customer_id == $_SESSION['Customer']) ? 'disabled' : '' ?>>
                    </form>
                </td>
            </tr>
        </table>
        <br>

        <h2>Customer Address</h2>

        <table>
            <tr>
                <th>Door Number : </th>
                <td><?= $address[0]->door_number_name ?></td>
            </tr>
            <tr>
                <th>Street Name : </th>
                <td><?= $address[0]->street_name ?></td>
            </tr>
            <tr>
                <th>City : </th>
                <td><?= $address[0]->city ?></td>
            </tr>
            <tr>
                <th>County : </th>
                <td><?= $address[0]->county ?></td>
            </tr>
            <tr>
                <th>Post Code : </th>
                <td><?= $address[0]->post_code ?></td>
            </tr>
        </table>
        <br>

        <h2>Customer Orders</h2>
        <table>
            <tr>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Total Value</th>
                <th>View Details</th>
            </tr>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order->customer_order_id ?></td>
                <td><?= $order->order_date ?></td>
                <td><?= $order->total_value ?></td>
                <td>
                    <form method="get" action="aUser.php">
                        <input type="hidden" name="aCode" value="order_details">
                        <input type="hidden" name="id" value="<?= $order->customer_order_id ?>">
                        <input type="submit" value="View Order">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    <?php elseif (isset($_GET['aCode']) && $_GET['aCode'] == 'order_details'): ?>

        <h2>Order Number : <?= $order_lines[0]->customer_order_id ?></h2>
        <h4>Order Date - <?= $order_lines[0]->order_date ?> || Total Value = £<?= $order_lines[0]->total_value ?></h4>
        <br>
        <table>
            <tr>
                <th>Wine Name</th>
                <th>Price Per Bottle</th>
                <th>Quantity</th>
                <th>Line Value</th>
            </tr>
            <?php foreach ($order_lines as $line): ?>
                <tr>
                    <td><?= $line->wine_name ?></td>
                    <td><?= $line->price_per_bottle ?></td>
                    <td><?= $line->quantity ?></td>
                    <td><?= $line->line_value ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <form method="post" action="aUser.php">
        <input type="hidden" name="aCode" value="details">
        <input type="hidden" name="customer" value="<?= $order_lines[0]->customer_id_fk ?>">
        <input type="submit" value="Go Back to Details">
    </form>

    <?php else: ?>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
        <form method="get" action="aUser.php">
            <div class="row">
                <label for="customer_name">Search by the customers first or last name</label>
            </div>
            <div class="row">
                <input type="text" name="customer_name" placeholder="Enter customers name" >
                <input type="hidden" name="aCode" value="search"/>
                <input type="submit" value="Find"/>
            </div>
        </form>
        <div class="tableData">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>See Details</th>
            </tr>
        <?php foreach ($customers as $user): ?>
            <tr>
                <td><?= $user->first_name ?></td>
                <td><?= $user->last_name ?></td>
                <td>
                    <form method="post" action="aUser.php">
                        <input type="hidden" name="aCode" value="details">
                        <input type="hidden" name="customer" value="<?= $user->customer_id ?>">
                        <input type="submit" value="Details">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        </div>
        </div>
    </div>
    <?php endif;?>

<?php require_once ('Includes/footer.php'); ?>