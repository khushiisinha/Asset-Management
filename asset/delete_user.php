<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `user_data` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       //echo"<script>alert('ITEM DELETED...... GO TO HOME PAGE TO VIEW REFRESHED TABLE')</SCRIPT>";
       header("location:user.php");
    }
    else{
        die(mysqli_error($con));
    }
}
?>