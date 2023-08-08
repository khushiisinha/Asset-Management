
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


        nav{
            width:1920px;
            margin-right:0px;
            
        }
        
       
    </style>
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
            


            <a href="logout.php">
                <li>LOGOUT</li>
            </a>

        </ul>


    </nav>
    
    <div class="table1">
        <table bgcolor="white" border="1" cellpadding="4" cellspacing="0">
            <thead>
                <tr>

                    <th>HEAD</th>
                    <th>ASSET NAME</th>
                    <th>SLOT NUMBER</th>
                    <th>AREA</th>
                    <th>QUANTITY</th>
                    <th>MAKE</th>
                    <th>DESCRIPTION</th>
                    <th>DOC</th>
                    <th>CONTRACT START DATE</th>
                    <th>CONTRACT EXPIRY DATE</th>
                    <th>WARRANTY START DATE</th>
                    <th>WARRANTY EXPIRY DATE</th>
                    <th>AMC START DATEL</th>
                    <th>AMC EXPIRY DATE</th>
                    <th>PURCHASED DATE</th>
                    <th>EXPECTED DELIVERY DATE</th>
                    <th>ACTUAL DELIVERY DATE</th>
                    <th>LD</th>
                    <th>PURCHASING DEPARTMENT</th>
                    <th>VENDOR DETAILS</th>
                    <th>GEM</th>
                    <th>CAPITAL REVENUE</th>
                    <th>REMARKS</th>
                    <th>WARRANTY STATUS</th>
                </tr>
            </thead>



            
 <tbody>
    
   <?php

  $sql="select * from  `asset_data`";
  $result=mysqli_query($con,$sql);

  $num=mysqli_num_rows($result);
  $number_pages=5;
  
  $total_pages=ceil($num/$number_pages);
   
   for($btn=1;$btn<=$total_pages;$btn++){
      echo'<button class="button-page" ><a href="asset.php?page='.$btn.'"> '.$btn.'</a></button>';
   }
   if(isset($_GET['page'])){
    $page=$_GET['page'];

   }
   else{
    $page=1;
   }


   $starting_limit=($page-1)*$number_pages;
   $sql="select * from  `asset_data` limit ".$starting_limit.','.$number_pages;
   $result=mysqli_query($con,$sql);
echo"<br><Br>";

  
  if($result)
  {

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
        echo'    <tr bgcolor="red">
    
        
        <td>'.$head.'</td>
        <td>'.$asset_name.'</td>
        <td>'.$slot_number.'</td>
        <td> '.$area.'</td>
        <td> '.$quantity.'</td>
        <td> '.$make.'</td>
        <td>'.$description.'</td>
        <td>'.$doc.'</td>
        <td>'.$contract_start.'</td>
        <td>'.$contract_expiry.'</td>
        <td>'.$warranty_start.'</td>
        <td>'.$warranty_expiry.'</td>
        <td>'.$amc_start.'</td>
        <td>'.$amc_expiry.'</td>
        <td>'.$purchased_date.'</td>
        <td>'.$expected_delivery.'</td>
        <td>'.$actual_delivery.'</td>
        <td>'.$LD.'</td>
        <td>'.$purchasing_dept.'</td>
        <td>'.$vendor_details.'</td>
        <td>'.$gem.'</td>
        <td>'.$capital_revenue.'</td>
        <td>'.$remarks.'</td>
        
        

             <td>'.$days_remaining.' days left</td>
             
             
            </tr>';
        
    }
    
else if($days_remaining==0)
{ 
    echo'    <tr bgcolor="red">
    
            
    <td>'.$head.'</td>
    <td>'.$asset_name.'</td>
    <td>'.$slot_number.'</td>
        <td> '.$area.'</td>
    <td> '.$quantity.'</td>
    <td> '.$make.'</td>
    <td>'.$description.'</td>
    <td>'.$doc.'</td>
    <td>'.$contract_start.'</td>
    <td>'.$contract_expiry.'</td>
    <td>'.$warranty_start.'</td>
    <td>'.$warranty_expiry.'</td>
    <td>'.$amc_start.'</td>
    <td>'.$amc_expiry.'</td>
    <td>'.$purchased_date.'</td>
    <td>'.$expected_delivery.'</td>
    <td>'.$actual_delivery.'</td>
    <td>'.$LD.'</td>
    <td>'.$purchasing_dept.'</td>
    <td>'.$vendor_details.'</td>
    <td>'.$gem.'</td>
    <td>'.$capital_revenue.'</td>
    <td>'.$remarks.'</td>

             <td >Last Day</td>
             
             
            </tr>';

}
else if($days_remaining<0)
{
    echo'    <tr bgcolor="orange">
    
    <td>'.$head.'</td>
    <td>'.$asset_name.'</td>
    <td>'.$slot_number.'</td>
        <td> '.$area.'</td>
    <td> '.$quantity.'</td>
    <td> '.$make.'</td>
    <td>'.$description.'</td>
    <td>'.$doc.'</td>
    <td>'.$contract_start.'</td>
    <td>'.$contract_expiry.'</td>
    <td>'.$warranty_start.'</td>
    <td>'.$warranty_expiry.'</td>
    <td>'.$amc_start.'</td>
    <td>'.$amc_expiry.'</td>
    <td>'.$purchased_date.'</td>
    <td>'.$expected_delivery.'</td>
    <td>'.$actual_delivery.'</td>
    <td>'.$LD.'</td>
    <td>'.$purchasing_dept.'</td>
    <td>'.$vendor_details.'</td>
    <td>'.$gem.'</td>
    <td>'.$capital_revenue.'</td>
    <td>'.$remarks.'</td>
             <td>Warranty Ends</td>
             
             
            </tr>';
}

else {
    echo'    <tr bgcolor="white">
    
    <td>'.$head.'</td>
    <td>'.$asset_name.'</td>
    <td>'.$slot_number.'</td>
        <td> '.$area.'</td>
    <td> '.$quantity.'</td>
    <td> '.$make.'</td>
    <td>'.$description.'</td>
    <td>'.$doc.'</td>
    <td>'.$contract_start.'</td>
    <td>'.$contract_expiry.'</td>
    <td>'.$warranty_start.'</td>
    <td>'.$warranty_expiry.'</td>
    <td>'.$amc_start.'</td>
    <td>'.$amc_expiry.'</td>
    <td>'.$purchased_date.'</td>
    <td>'.$expected_delivery.'</td>
    <td>'.$actual_delivery.'</td>
    <td>'.$LD.'</td>
    <td>'.$purchasing_dept.'</td>
    <td>'.$vendor_details.'</td>
    <td>'.$gem.'</td>
    <td>'.$capital_revenue.'</td>
    <td>'.$remarks.'</td>
             <td>'.$days_remaining.' days left</td>
             
             
            </tr>';
}

    }

    }

  
   
   

?>

            </tbody>
        </table>
    </div>

</body>

</html>
