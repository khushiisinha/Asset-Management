
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
    
     a{
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
    width:400px;
    height:400px;
    
    margin-left:40%;
    margin-right:30%;
    
    background-color:yellow;
    padding-left:10px;
    padding-top:5px;
    border-radius:10px;
}
.details h3{
    text-align:center;
}
thead{
    background-color:#000;
    color:white;

}
        
       
    </style>
    <link rel="stylesheet" href="style2.css">
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
            <a href="asset.php">
                <li> HOME</li>
            </a>
            
            </a>
            <a href="add.php">
                <li>ADD DATA</li>
            </a>
            
           
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
    
   <div class="full">
   
    <div class="table1">
        <table bgcolor="white" cellpadding="10" cellspacing="0">
            
            
   

<?php
   
   $sql="select * from  `asset_data`";
   $result=mysqli_query($con,$sql);

   
  
$count=0;

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
     
    
      
    
   
if($days_remaining<0)
{
   $count=1;
}


    }
    if($count==1){
        echo' <thead>
        <tr>
     
            <th  height="50px" width="150px">HEAD</th>
            <th  height="50px" width="150px">ASSET NAME</th>
            <th  height="50px" width="150px">LOT NUMBER</th>
            <th height="50px" width="100px">AREA</th>
            <th height="50px" width="100px">QUANTITY</th>
            <th height="50px" width="100px">MAKE</th>
            <th height="50px" width="100px">DESCRIPTION</th>
            <th height="50px" width="100px">DOC</th>
            <th height="50px" width="150px">CONTRACT START DATE</th>
            <th height="50px" width="100px">CONTRACT EXPIRY DATE</th>
            <th height="50px" width="100px">WARRANTY START DATE</th>
            <th height="50px" width="100px">WARRANTY EXPIRY DATE</th>
            <th height="50px" width="100px">AMC START DATEL</th>
            <th height="50px" width="100px">AMC EXPIRY DATE</th>
            <th height="50px" width="100px">PURCHASED DATE</th>
            <th height="50px" width="100px">EXPECTED DELIVERY DATE</th>
            <th height="50px" width="100px">ACTUAL DELIVERY DATE</th>
            <th height="50px" width="10%">LD</th>
            <th height="50px" width="100px">PURCHASING DEPARTMENT</th>
            <th height="50px" width="100px">VENDOR DETAILS</th>
            <th height="50px" width="100px">GEM</th>
            <th height="50px" width="100px">CAPITAL REVENUE</th>
            <th height="50px" width="100px">REMARKS</th>
            
        </tr>
     </thead>
     
     
     
     
     <tbody >';
    
     $sql="select * from  `asset_data`";
     $result=mysqli_query($con,$sql);
  $c=0;
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
     
    
      
    
   
if($days_remaining<0)
{
    if($c%2==0)
    {
        echo'    <tr bgcolor="#B2B2B2" cellpadding="10">';
     
    }
    else{
        echo'    <tr bgcolor="#73777B">';
    
    }
    echo'    
    
    <td height="50px" width="100px">'.$head.'</td>
    <td height="50px" width="100px" class="link"><a href="view_user.php?asset_id='.$asset_name.'">'.$asset_name.'</a></td>
    <td height="50px" width="100px" class="link"><a href="view_user.php?slot_id='.$slot_number.'">'.$slot_number.'</a></td>
        <td height="50px" width="100px"> '.$area.'</td>
    <td height="50px" width="100px"> '.$quantity.'</td>
    <td height="50px" width="100px"> '.$make.'</td>
    <td height="50px" width="100px">'.$description.'</td>
    <td height="50px" width="100px">'.$doc.'</td>
    <td height="50px" width="100px">'.$contract_start.'</td>
    <td height="50px" width="100px">'.$contract_expiry.'</td>
    <td height="50px" width="100px">'.$warranty_start.'</td>
    <td height="50px" width="100px">'.$warranty_expiry.'</td>
    <td height="50px" width="100px">'.$amc_start.'</td>
    <td height="50px" width="100px">'.$amc_expiry.'</td>
    <td height="50px" width="100px">'.$purchased_date.'</td>
    <td height="50px" width="100px">'.$expected_delivery.'</td>
    <td height="50px" width="100px">'.$actual_delivery.'</td>
    <td height="50px" width="100px">'.$LD.'</td>
    <td height="50px"width="100px">'.$purchasing_dept.'</td>
    <td height="50px"width="100px">'.$vendor_details.'</td>
    <td height="50px"width="100px">'.$gem.'</td>
    <td height="50px"width="100px">'.$capital_revenue.'</td>
    <td height="50px"width="100px">'.$remarks.'</td>
             
             
            </tr>';
            $c+=1;
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
    
    
</div>

    
    <br><br>
</body>

</html>
