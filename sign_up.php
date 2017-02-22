<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/customer_controller.php"); ?>
<?php require_once ("Includes/info.php"); ?>

<h1>Register for a new account today and receive a 25% discount code on your first order</h1>
<form method="post" action="sign_up.php">
    <div>
        <label for="first_name">First Name : </label>
        <input type="text" name="first_name" id="first_name"  />
    </div>
    <div>
        <label for="last_name">Last Name : </label>
        <input type="text" name="last_name" id="last_name"  />
    </div>
    <div>
        <label for="email_address">Email Address : </label>
        <input type="email" name="email_address" id="email_address"  />
    </div>
    <div>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password"  />
    </div>
    <div>
        <label for="phone_number">Phone Number : </label>
        <input type="text" name="phone_number" id="phone_number"  />
    </div>
    <div>
        <label for="door_number_name">Door Number : </label>
        <input type="text" name="door_number_name" id="door_number_name" required />
    </div>
    <div>
        <label for="post_code">Post Code : </label>
        <input type="text" name="post_code" id="post_code" required />
    </div>
    <div>
    <input type="hidden" name="iCode" value="register">
    <input type="submit" value="Register Now">

<?php require_once ("Includes/footer.php"); ?>
