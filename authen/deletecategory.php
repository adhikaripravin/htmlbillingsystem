<?php
    require "../connection/connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM category WHERE id = '$id'";
        $result = mysqli_query($con,$query);
        if($result){
            header("location:../view/admincategory.php?error=none");
        }
        else{
            header("location:../view/admincategory.php?error=2");
        }
    }
    else{
        die('error');
    }
?>