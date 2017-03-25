<?php require_once ('Includes/header.php'); ?>

<?php
//echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
?>

<h1>Web Administration</h1>
<p>Any changes made will affect the entire web application, make sure you have received the appropriate training before continuing</p>

<div class="row">
    <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12">
        <h2>Database Operations</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 blockObjects">
                <h3>Manage Wine Product</h3>
                <a href="aWine.php"><button>Wine Management</button></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 blockObjects">
                <h3>Manage Stock Holding Quantities</h3>
                <a href="aStock.php"><button>Stock Management</button></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 blockObjects">
                <h3>Manage Campaigns</h3>
                <a href="aCampaign.php"><button>Campaign Management</button></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 blockObjects">
                <h3>Manage Users</h3>
                <a href="aUser.php"><button>User Management</button></a>
            </div>
        </div>
    </div>
</div>

<?php require_once ('Includes/footer.php'); ?>