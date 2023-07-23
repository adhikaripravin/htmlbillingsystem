<?php
    require "../connection/connection.php";
    if(isset($_POST['add'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $added_on = $_POST['added_on'];
        if(!empty($id) && !empty($name) && !empty($description) && !empty($type)){
            $date = date("Y-m-d h:m:s");
            $query = "INSERT INTO category (id,name,description,type,added_on) VALUES('$id','$name','$description','$type','$date')";
            $result = mysqli_query($con,$query);
            if($result){
                header("location:../view/admincategory.php?error=false");
            }
            else{
                header("location:../view/admincategory.php?error=1");
            }
        }
        else{
            header("location:../view/admincategory.php?error=1");
        }
    }
    else{
        die('error');
    }
?>