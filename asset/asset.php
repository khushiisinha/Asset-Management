
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

body{
     /*background: url('image/dhouse.jpg');*/
/*background-color: #C1D0B5;
    
background-size: cover;*/

font-family:sans-serif;
margin:0;
padding:0;

}
        
.table1 {
    overflow:scroll;
    overflow-y: hidden;
    
    width:81%;
    margin-left:10%;
    padding-left:7px;
    padding-right:7px;
    
    
    
    font-size: 0.9em;
    font-size: 0.9em;
    font-family: sans-serif;
    
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    text-align:center;
}
    .full{
        width:100%;
       
    }
   .notifications{
    display:flex;
    height:250px;
    width:80%;
    
    margin-top:5%;;
    
    padding-left:5%;
    
   
   } 
   .images img{
    height:150px;
    width:150px;
    margin:10px;
   }
    
    nav li{
      padding-left:10px;
      padding-right:10px;
      font-weight: bold;
      color: black;
      
  }
  nav ul{
       
       list-style-type: none;
       display:inline-flex;
       padding-left: 10%;
       padding-top:30px;
       color:black;
   
   }
 nav li:hover{
   border:1px solid grey;
   background-color:white;

    font-weight:700;
    box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.15);
    
    
} a{
    text-decoration:none;
    color:black;
}
 a:hover{
    color:green;
    font-weight:700;
}
th:hover{
    font-weight:700;
    color:blue;
}
th{
    
}
.images h3{
    text-align:center;
    
}
.details li:hover{
color:white;
font-weight:700;
}
.details{
    width:30%;
    height:400px;
    
    margin-left:35%;
    margin-right:40%;
    
    box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.15);
    padding-left:10px;
    padding-top:5px;
    border-radius:10px;
    margin-top:5%;
}
.details h3{
    text-align:center;
}
.images:hover{
   /* background-color:yellow;*/
   box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.15);
}
.images h3:hover{
    color:blue;
}
.notifications a{
    text-decoration:none;
    color:black;
}
.details a{
    text-decoration:none;
    color:black;
    font-weight:700;
}
.details li:hover{
    color:GREEN;
}
.details a:hover{
    color:green;
    
}
.details:hover{
    border:2px solid lightgreen;
    color:PURPLE;
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
    <?php

  $sql="select * from  `asset_data`";
  $result=mysqli_query($con,$sql);

  $num=mysqli_num_rows($result);
  $number_pages=6;
  
  $total_pages=ceil($num/$number_pages);
 
  
   echo"<br><br>"; echo"<center>";
   
   
   
   for($btn=1;$btn<=$total_pages;$btn++){
      echo'<button class="button-page" style="margin-right:10px;" ><a style="text-decoration:none; padding-left:5px; padding-right:5px; height:5px; font-weight:700; border-radius:5;" href="asset.php?page='.$btn.'"  > '.$btn.'</a></button>'; 
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
   <div class="full">
   
    <div class="table1">
        <table bgcolor="white" border="1" cellpadding="6" cellspacing="0">
            
            
    
   

<?php
   $starting_limit=($page-1)*$number_pages;
   $sql="select * from  `asset_data` limit ".$starting_limit.','.$number_pages;
   $result=mysqli_query($con,$sql);


  
  if($result)
  {
    if(mysqli_num_rows($result)>0){
echo"<thead>
<tr>
<th width='10%' height='50px'>WARRANTY STATUS</th>
    <th width='10%'>HEAD</th>
    <th width='10%'>ASSET NAME</th>
    <th width='10%'>LOT NUMBER</th>
    <th width='10%'>AREA</th>
    <th width='10%'>QUANTITY</th>
    <th width='10%'>MAKE</th>
    <th width='10%'>DESCRIPTION</th>
    <th width='10%'>DOC</th>
    <th width='10%'>CONTRACT START DATE</th>
    <th width='10%'>CONTRACT EXPIRY DATE</th>
    <th width='10%'>WARRANTY START DATE</th>
    <th width='10%'>WARRANTY EXPIRY DATE</th>
    <th width='10%'>AMC START DATEL</th>
    <th width='10%'>AMC EXPIRY DATE</th>
    <th width='10%'>PURCHASED DATE</th>
    <th width='10%'>EXPECTED DELIVERY DATE</th>
    <th width='10%'>ACTUAL DELIVERY DATE</th>
    <th width='10%'>LD</th>
    <th width='10%'>PURCHASING DEPARTMENT</th>
    <th width='10%'>VENDOR DETAILS</th>
    <th width='10%'>GEM</th>
    <th width='10%'>CAPITAL REVENUE</th>
    <th width='10%'>REMARKS</th>
    
</tr>
</thead>




<tbody >";
    while( $row=mysqli_fetch_Assoc($result))
    {   
        $id=$row['id'];
        $head=$row['head'];
        $asset_name=$row['asset_name'];
        $slot_number=$row['slot_number'];
    $area=$row['area'];
        $quantity=$row['quantity'];
        $make=$row['make'];
        $description=$row['description'];
        $doc=$row['doc'];
        $contract_start=$row['contract_start'];
    
        $contract_expiry= $row['contract_expiry'];
        $warranty_start=$row['warranty_start'];
        $warranty_expiry=$row['warranty_expiry'];
        $amc_start=$row['amc_start'];
        $amc_expiry=$row['amc_expiry'];
        $purchased_date=$row['purchased_date'];
        $expected_delivery=$row['expected_delivery'];
    
        $actual_delivery=$row['actual_delivery'];
        $LD=$row['LD'];
        $purchasing_dept=$row['purchasing_dept'];
        $vendor_details=$row['vendor_details'];
        $gem=$row['gem'];
        $capital_revenue=$row['capital_revenue'];
        $remarks=$row['remarks'];
        
    
    $current_Date=date('Y-m-d');
    $expiry_date=$warranty_expiry;
    $days_remaining=floor((strtotime($expiry_date)-strtotime($current_Date))/(60*60 *24));
     
    
      
    
    if($days_remaining<7 && $days_remaining>0){
        echo'    <tr bgcolor="orange">
    
        <td height="50px">'.$days_remaining.' days left</td>
        <td height="50px">'.$head.'</td>
        <td  height="50px" class="link"><a href="view_user.php?asset_id='.$asset_name.'">'.$asset_name.'</a></td>
    <td  height="50px" class="link"><a href="view_user.php?slot_id='.$slot_number.'">'.$slot_number.'</a></td>
        <td height="50px"> '.$area.'</td>
        <td height="50px"> '.$quantity.'</td>
        <td height="50px"> '.$make.'</td>
        <td height="50px">'.$description.'</td>
        <td height="50px"><a href="image.php?doc_id='.$id.'">'.$doc.'</a></td>
        <td height="50px">'.$contract_start.'</td>
        <td height="50px">'.$contract_expiry.'</td>
        <td height="50px">'.$warranty_start.'</td>
        <td height="50px">'.$warranty_expiry.'</td>
        <td height="50px">'.$amc_start.'</td>
        <td height="50px">'.$amc_expiry.'</td>
        <td height="50px">'.$purchased_date.'</td>
        <td height="50px">'.$expected_delivery.'</td>
        <td height="50px">'.$actual_delivery.'</td>
        <td height="50px">'.$LD.'</td>
        <td height="50px">'.$purchasing_dept.'</td>
        <td height="50px">'.$vendor_details.'</td>
        <td height="50px">'.$gem.'</td>
        <td height="50px">'.$capital_revenue.'</td>
        <td height="50px">'.$remarks.'</td>
        
        

             
             
             
            </tr>';
        
    }
    
else if($days_remaining==0)
{ 
    echo'    <tr bgcolor="orange">
    
    <td height="50px" >Last Day</td>        
    <td height="50px">'.$head.'</td>
    <td height="50px" class="link"><a href="view_user.php?asset_id='.$asset_name.'">'.$asset_name.'</a></td>
    <td  height="50px" class="link"><a href="view_user.php?slot_id='.$slot_number.'">'.$slot_number.'</a></td>
        <td height="50px"> '.$area.'</td>
    <td height="50px"> '.$quantity.'</td>
    <td height="50px"> '.$make.'</td>
    <td height="50px">'.$description.'</td>
    <td height="50px"><a href="image.php?doc_id='.$id.'">'.$doc.'</a></td>
    <td height="50px">'.$contract_start.'</td>
    <td height="50px">'.$contract_expiry.'</td>
    <td height="50px">'.$warranty_start.'</td>
    <td height="50px">'.$warranty_expiry.'</td>
    <td height="50px">'.$amc_start.'</td>
    <td height="50px">'.$amc_expiry.'</td>
    <td height="50px">'.$purchased_date.'</td>
    <td height="50px">'.$expected_delivery.'</td>
    <td height="50px">'.$actual_delivery.'</td>
    <td height="50px">'.$LD.'</td>
    <td height="50px">'.$purchasing_dept.'</td>
    <td height="50px">'.$vendor_details.'</td>
    <td height="50px">'.$gem.'</td>
    <td height="50px">'.$capital_revenue.'</td>
    <td height="50px">'.$remarks.'</td>

             
             
             
            </tr>';

}
else if($days_remaining<0)
{
    echo'    <tr bgcolor="red">
    <td height="50px">Warranty Ends</td>
    <td height="50px">'.$head.'</td>
    <td height="50px" class="link"><a href="view_user.php?asset_id='.$asset_name.'">'.$asset_name.'</a></td>
    <td height="50px" class="link"><a href="view_user.php?slot_id='.$slot_number.'">'.$slot_number.'</a></td>
        <td height="50px"> '.$area.'</td>
    <td height="50px"> '.$quantity.'</td>
    <td height="50px"> '.$make.'</td>
    <td height="50px">'.$description.'</td>
    <td height="50px"><a href="image.php?doc_id='.$id.'">'.$doc.'</a></td>
    <td height="50px">'.$contract_start.'</td>
    <td height="50px">'.$contract_expiry.'</td>
    <td height="50px">'.$warranty_start.'</td>
    <td height="50px">'.$warranty_expiry.'</td>
    <td height="50px">'.$amc_start.'</td>
    <td height="50px">'.$amc_expiry.'</td>
    <td height="50px">'.$purchased_date.'</td>
    <td height="50px">'.$expected_delivery.'</td>
    <td height="50px">'.$actual_delivery.'</td>
    <td height="50px">'.$LD.'</td>
    <td height="50px">'.$purchasing_dept.'</td>
    <td height="50px">'.$vendor_details.'</td>
    <td height="50px">'.$gem.'</td>
    <td height="50px">'.$capital_revenue.'</td>
    <td height="50px">'.$remarks.'</td>
             
             
             
            </tr>';
}

else {
    echo'    
    
    <tr bgcolor="white">
    <td height="50px">'.$days_remaining.' days left</td>
    <td height="50px">'.$head.'</td>
    <td height="50px" class="link"><a href="view_user.php?asset_id='.$asset_name.'">'.$asset_name.'</a></td>
    <td height="50px" class="link"><a href="view_user.php?slot_id='.$slot_number.'">'.$slot_number.'</a></td>
        <td height="50px"> '.$area.'</td>
    <td height="50px"> '.$quantity.'</td>
    <td height="50px"> '.$make.'</td>
    <td height="50px">'.$description.'</td>
    <td height="50px"><a href="image.php?doc_id='.$id.'">'.$doc.'</a></td>
    <td height="50px">'.$contract_start.'</td>
    <td height="50px">'.$contract_expiry.'</td>
    <td height="50px">'.$warranty_start.'</td>
    <td height="50px">'.$warranty_expiry.'</td>
    <td height="50px">'.$amc_start.'</td>
    <td height="50px">'.$amc_expiry.'</td>
    <td height="50px">'.$purchased_date.'</td>
    <td height="50px">'.$expected_delivery.'</td>
    <td height="50px">'.$actual_delivery.'</td>
    <td height="50px">'.$LD.'</td>
    <td height="50px">'.$purchasing_dept.'</td>
    <td height="50px">'.$vendor_details.'</td>
    <td height="50px">'.$gem.'</td>
    <td height="50px">'.$capital_revenue.'</td>
    <td height="50px">'.$remarks.'</td>
             
             
             
            </tr>
            ';
}

    }

    }
    else{
        echo"NO DATA FOUND";
    }
}
    else{
        echo"NO DATA FOUND";
    }


  
   
   

?>

            </tbody>
        </table>
    </div>
    
    <div class="notifications">
   
<div class="images"><img src="image/laptop.avif" alt=""><a href="laptop.php"><H3>LAPTOP</H3></a></div>
<div class="images"><img src="image/mouse.jpg" alt=""><a href="mouse.php"><H3>MOUSE</H3></a></div>
<div class="images"><img src="image/dektop.webp" alt=""><a href="desktop.php"><H3>DESKTOP</H3></a></div>
<div class="images"><img src="image/keyboard.webp" alt=""><a href="keyboard.php"><H3>KEYBOARD</H3></a></div>
<div class="images"><img src="image/cpu.jpg" alt=""><a href="cpu.php"><H3>CPU</H3></a></div>
<div class="images"><img src="image/ups.webp" alt=""><a href="ups.php"><H3>UPS</H3></a></div>
<div class="images"><img src="image/printer.jpeg" alt=""><a href="printer.php"><H3>PRINTER</H3></a></div>
<div class="images"><img src="image/scanner.webp" alt=""><a href="scanner.php"><H3>SCANNER</H3></a></div>
</div>

<div class="details">
    <u><h3>IMPORTANT</h3></u><BR>
    <UL>
    <LI><a href="warranty_expired.php" style="text-decoration:none;">WARRANTY EXPIRED PRODUCTS</a></LI><BR><BR>
    <LI><a href="expiring_soon.php" style="text-decoration:none;">EXPIRING SOON PRODUCTS</a></LI>
    </UL>
    
</div>
</div>

    
    <br><br>
</body>

</html>
