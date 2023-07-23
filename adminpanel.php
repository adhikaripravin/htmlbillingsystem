<?php
session_start();
if(!isset($_SESSION['adminloginid']))
{
    header("location: adminlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body{
            margin: 0px;
        }
        div.header{
            font-family: poppins;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 60px;
            background-color: black;
            color: white;
        }
        div.header button{
            background-color: #f0f0f0;
            font-size: 16px;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
        }
    </style>

</head>
<body>
    <div class="header">
    <h1> Welcome To Two Wheeler Billing System - <?php echo $_SESSION['adminloginid']?><h1>
    <form method="POST">
    <button type="submit" name="logout">Logout</button>
    </form>

    </div>
    <div class="heading">
                    Admin Dashboard
    </div>
    <div class="adminpage">
    <div id="category" onclick="location.href='view/admincategory.php?a_id=1';">
        Category
    </div>
    <div id="parts" onclick="location.href='admincategory.php';">
        Parts
    </div>
    <div id="invoice">
        Invoice
    </div>
    <div id="Report">
        Report
    </div>
    </div>
</div>

<?php
if(isset($_POST['logout']))
{
    session_destroy();
    header("location: adminlogin.php");
}
?>
</body>
</html>