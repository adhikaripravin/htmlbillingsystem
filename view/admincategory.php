<?php
if(isset($_GET['error'])){
    if($_GET['error'] == 1){
        echo "<script>alert('Empty Category');</script>";
    }
    elseif($_GET['error'] == 2){
        echo "<script>alert('Error deleting Category');</script>";
    }
    elseif($_GET['error'] == 'none'){
        echo "<script>alert('Category Deleted');</script>";
    }
    else{
        echo "<script>alert('Category Added');</script>";
    }
}
require "../connection/connection.php";
session_start();
if(!empty($_SESSION['adminloginid'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parts Category</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="inlineblock">
        <div class="logout">
        </div>
    </div>
    <div class="addcategory">
        <div class="addcategoryheading">
            Add Parts Category
        </div>
    
    <form action="../authen/backendcategory.php" method="POST">
        <input type="text" name="id" id="id" placeholder="id"><br>
        <input type="text" name="name" id="name" placeholder="name"><br>
        <input type="text" name="description" id="description" placeholder="description"><br>
        <input type="text" name="type" id="type" placeholder="type"><br>
        <input type="submit" value="Add" name="add" id="add">
</form>
</div>
<div class="showcategory">
    <div class="showcategoryheading">
        Show All Category
    </div>
    <table>
        <tr>
            <th> ID </th>
            <th> Category Name </th>
            <th> Description </th>
            <th> Category Type </th>
            <th> Date </th>
            <th> Action </th>
        </tr>
        <?php
        require "../connection/connection.php";
        $date=date("Y-m-d");
        $query="SELECT * FROM category";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['type']."</td>";
        echo "<td>".$row['added_on']."</td>";
        echo "<td><a href='../authen/deletecategory.php?id=".$row['id']."'>Delete</a></td>";
        echo "<td><a href='../authen/updatecategory.php?id=".$row['id']."'>Update</a></td>";
        echo "</tr>";
            }
        ?>
    </table>
</div> 
</body>
</html>
<?php
}
else{
    header("location:../adminpanel.php");
}
?>