<?php require_once ("Includes/header.php"); ?>

<h1>Register for a new account today and recieve a 25% discount code on your first order</h1>
<form method="post" action="sign_up_controller">
    <label>First Name : </label>
    <input name="first_name"/>
    <label>Last Name : </label>
    <input name="last_name"/>
    <label>Email Address : </label>
    <input type="email" name="email_address"
    <label>Phone Number : </label>
    <input name="phone_number">
    <label>Door Number : </label>
    <input name="door_number">
    <label>Post Code : </label>
    <input name="post_code">
    <input type="submit" value="Register Now">
</form>


<?php require_once ("Includes/footer.php"); ?>