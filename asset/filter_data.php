<?php include 'connect.php';
session_start();

$userp=$_SESSION["user"];

if($userp==true)
{

}else
{    header('location:admin_login.php');
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASSET</title>
    <link rel="stylesheet" href="style2.css">
    <style> nav{
            width:1750px;
            margin-right:0px;
        }
        .table1{
            margin-left:20px;
        }</style>
</head>
<body>
<nav>
            
            <img src="image/ccl_icon.png" alt="ccl icon">
            <p>CCL<br>
            A GOVERNMENT OF INDIA UNDERTAKING<br>
            A MINIRATNA COMPANY</p>
            
            <ul >
            <a   href="edit.php"><li > EDIT DATA</li></a>
            <a href="delete.php"><li>DELETE DATA</li></a>
            
            <a   href="asset.php"><li >HOME</li></a>
            <a   href="add.php"><li > ADD DATA</li></a>
                
                
                <a   href="logout.php"><li >LOGOUT</li></a>

            </ul>

        </nav>
        
        <h6>DEVICE LIST<h6>
            <hr>
            <?php
            $con=mysqli_connect("localhost","root","","testing");
             $device_query="select * from  `asset_data`";
             $device_query_run=mysqli_query($con,$device_query);

             if(mysqli_num_rows($device_query_run)>0){
                foreach($device_query_run as $device_list)
                {
                    //echo $device_list['head'];
                    ?>
                    <div>
                        <input type="checkbox" name="head[]" value="<?=$device_list['id'];?>">
                        <?=$device_list['head'];?>
                    </div>
                    <?php
                }
                   
             }
             else{
                echo"NO DATA FOUND";
             }
             ?>


           


        