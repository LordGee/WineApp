<?php require_once ('Includes/header.php'); ?>
<?php require_once ('Controllers/aUser_controller.php'); ?>

<?php
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>

    <span class="message"><?= $message ?></span>
    <span class="error"><?= $error ?></span>

    <?php if (isset($_POST['aCode']) && $_POST['aCode'] == 'details'): ?>
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
                    <form>
<!--                        TODO: Button that send email link to user to change their password -->
                    </form>
                </td>
            </tr>
            <tr>
                <th>Administrator : </th>
                <td>
                    <form>
<!--                        TODO: Checkbox to indicate if the user is an administrator or not-->
                    </form>
                </td>
            </tr>
        </table>

<!--        TODO: Another table to display users address details-->

<!--        TODO: Another table to display all the users orders-->

    <?php else: ?>
        <form method="get" action="aUser.php">
            <label for="customer_name">Search by the customers first or last name</label>
            <input type="text" name="customer_name" placeholder="Enter customers name" >
            <input type="hidden" name="aCode" value="search"/>
            <input type="submit" value="Find"/>
        </form>

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
    <?php endif;?>

<?php require_once ('Includes/footer.php'); ?>