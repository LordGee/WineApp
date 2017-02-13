<?php require_once ("Includes/header.php"); ?>

<h1>Register for a new account today and recieve a 25% discount code on your first order</h1>
  <div class = "signup">
<form method="post" action="sign_up_controller">
    <label>First Name : </label>
    <input name="first_name"/>
    <br/>
    <label>Last Name : </label>
    <input name="last_name"/>
    <br/>
    <label>Emal Address : </label>
    <input type="email" name="email_address"/>
    <br/>
    <label>Phone Number : </label>
    <input name="phone_number"/>
    <br/>
    <label>Door Number : </label>
    <input name="door_number"/>
    <br/>
    <label>Post Code : </label>
    <input name="post_code"/>
    <br/>
    <input type="submit" value="Register Now"/>
</form>
</div>

<?php require_once ("Includes/footer.php"); ?>
