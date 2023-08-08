<?php 
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        body{
            padding:0;
            margin:0;
        }
        .img{
            
            margin-left:15%;
            margin-right:30%;
        }
        .img img{
            width:1000px;
            height:530px;
            
        }
        
        a{
            text-decoration:none;
            color:black;
            font-weight:700;
            
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav>

<img src="image/ccl_icon.png" alt="ccl icon">
<p>CCL<br>
    A GOVERNMENT OF INDIA UNDERTAKING<br>
    A MINIRATNA COMPANY</p>

<ul>
    <a href="edit.php" class="active">
        <li>EDIT DATA</li>
    </a>
    <a href="delete.php">
        <li>DELETE DATA</li>
    </a>
    <a href="view.php">
        <li> FILTER DATA</li>
    </a>

    
    </a>
    <a href="add.php">
        <li>ADD DATA</li>
    </a>
    
    <a href="user.php">
        <li>USER DATA</li>
    </a>
    <a href="user_data.php"><li>ADD USER</li></a>
    <a href="logout.php">
    <li style="margin-left:150px; background-color:DARKBLUE; COLOR:WHITE; padding-top:2px; border-radius:10px;">LOGOUT  <i class="fa fa-sign-out"></i></li>
    </a>

</ul>


</nav>
<script>
function goBack(){
    window.history.back();
}
</script>
<button  style="margin-top:10px;padding:10px;" onclick="goBack()">BACK </button>
<?php
if(isset($_GET['doc_id'])){
    $id=$_GET['doc_id'];
    

    $sql="select * from  `asset_data` where id=$id ";
    $result=mysqli_query($con,$sql);
 
 
   
   if($result)
   {
   $row_count=mysqli_num_rows($result);
 
     while( $row=mysqli_fetch_Assoc($result)){
         
         $file=$row['doc'];
         echo"<div class='img'>
        
         <a href='uploads/$file'
download> 
<h2>DOWNLOAD IMAGE  <i class='fa fa-download' style='font-size:30px; color:red;'></i> </h2>
</a><br>
<img src='uploads/$file'>

         
         
         </div>";
     }
     }
}
?>

</body>
</html>