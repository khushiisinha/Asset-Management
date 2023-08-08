
<?php
 include 'connect.php';
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
    <style>
      /* .table1 th{
        width:300px;
        
       }
        body{
            margin:0px;
            background:white;
        }*/


        .table1 {
    
    
    
    margin-left:10%;
    margin-right:10%%;
    
    
    
    font-size: 0.9em;
    
   /* font-family: sans-serif;*/
    
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    font-family:'Source Sans Pro', sans-serif;
    text-align:center;
}
    .full{
        width:100%;
    }
   .notifications{
    display:none;
    height:500px;
    width:400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin-top:20px;
    
   
   } 
    .full{
        display:flex;
    }

thead{
    background-color:#000;
    color:white;

}
td{
    width:10%;
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
            <a href="asset.php"><li>HOME</li></a>

            <a href="user_data.php"><li>ADD USER</li></a>
            <a href="logout.php"><li style="margin-left:150px; background-color:DARKBLUE; COLOR:WHITE; padding-top:2px; border-radius:10px;">LOGOUT  <i class="fa fa-sign-out"></i></li><li>LOGOUT</li>
            </a>

        </ul>


    </nav>
    <script>
        function goBack(){
            window.history.back();
        }
    </script>
<button  style="margin-top:10px;padding:10px;" onclick="goBack()">BACK </button>
    <br><br>
   
    <?php

$sql="select * from  `user_data`";
$result=mysqli_query($con,$sql);

$num=mysqli_num_rows($result);
$number_pages=6;

$total_pages=ceil($num/$number_pages);


 echo"<br><br>"; echo"<center>";
 
 
 
 for($btn=1;$btn<=$total_pages;$btn++){
    echo'<button class="button-page" style="margin-right:10px;" ><a style="text-decoration:none; padding-left:5px; padding-right:5px; height:5px; font-weight:700; border-radius:5;" href="printer.php?page='.$btn.'"  > '.$btn.'</a></button>'; 
}
 
 
 if(isset($_GET['page'])){
  $page=$_GET['page'];
  

 }
 else{
  $page=1;
 }
 echo"<br><br>";

 echo"</center>";
 ?>
   

<?php
 $starting_limit=($page-1)*$number_pages;
 $sql="select * from  `user_data` where asset_name='PRINTER' limit ".$starting_limit.','.$number_pages;
   
   
   $result=mysqli_query($con,$sql);


  
  if($result)
  {
    if(mysqli_num_rows($result)>0){

        echo'<div class="full">
   
        <div class="table1">
            <table  border="1" cellpadding="6" cellspacing="0">
                
                <thead >
                    <tr>
    
                        <th  width="10%" >LOT NUMBER</th>
                        <th  width="10%">ASSET NAME</th>
                        <th  width="10%">EMP ID NUMBER</th>
                        <th  width="10%">USER NAME</th>
                        <th  width="10%">MOBILE NUMBER</th>
                        <th  width="10%">AREA</th>
                        <th  width="10%">EXPECTED INSTALLATION DATE</th>
                        <th  width="10%">ACTUAL INSTALLATION DATE</th>
                        <th  width="10%">REMARKS</th>
                    </tr>
                </thead>
    
    
    
                
     <tbody>';
     $c=0;

    while( $row=mysqli_fetch_Assoc($result))
    {   
        $id=$row['id'];
        $slot_number=$row['slot_number'];
        $asset_name=$row['asset_name'];
        $emp_id=$row['emp_id'];
        $user_name=$row['user_name'];
        $mobile_number=$row['mobile_number'];
    $area=$row['area'];
        
        $expected_installation=$row['expected_installation'];
    
        $actual_installation=$row['actual_installation'];
        
        $remarks=$row['remarks'];
        
        if($c%2==0)
        echo'  <tr bgcolor="white">';
        else{
            echo'  <tr bgcolor="gray">';
        }  
    
    

   echo'
    <td  height="50px">'.$slot_number.'</td>
    <td   height="50px">'.$asset_name.'</td>
    <td   height="50px">'.$emp_id.'</td>
    <td   height="50px">'.$user_name.'</td>
    <td   height="50px">'.$mobile_number.'</td>
    <td   height="50px">'.$area.'</td>   
    <td   height="50px">'.$expected_installation.'</td>
    <td   height="50px">'.$actual_installation.'</td>
    
    <td   height="50px">'.$remarks.'</td>
             
             
             
            </tr>

            ';
            $c+=1;
}

    }
    else{
        echo"NO DATA FOUND";

    }
}

    

  
   
   

?>

            </tbody>
        </table>
    </div>
   
</div>

    
    <br><br>
</body>

</html>
