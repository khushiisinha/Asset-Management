
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
    <title>search data</title>
    <link rel="stylesheet" href="style2.css">
    
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
            <a   href="view.php"><li > FILTER DATA</li></a>
            <a   href="asset.php"><li > HOME</li></a>
            <a   href="add.php"><li > ADD DATA</li></a>
            
            
                
                <a   href="logout.php"><li >LOGOUT</li></a>

            </ul>

        </nav>








      <center> 
     <div class="view">
        
    <form action="" method="post">
        <input type="text" placeholder="BY" name="search" style="text-transform: uppercase" autocomplete="off">
        <button name="submit">PURCHASED BY</button>
</div>
</center>

    </form>
       <table>
        <?php
        if(isset($_POST['submit'])){
            $search=$_POST['search'];
            $search=strtoupper($search);
            $sql="select * from `crud` where  p_by like '%$search%'";
            $result=mysqli_query($con,$sql);
            

            if($result)
            {
                 
                if(mysqli_num_rows($result)>0){

                    
                             
                    echo '
                    
                    
                    <thead bgcolor="white" border="1" cellpadding="4" cellspacing="0">
                             <tr>
                             <th>SLOT NO.</th>
                             <th>ASSET NAME</th>
                             <th>DEPARTMENT</th>
                             <th>DEVICE CATEGORY</th>
                             <th>PURCHASING DATE</th>
                             <th>PURCHASED FROM</th>
                             <th>PURCHASED BY</th>
                             
                             <th>WARRANTY</th>
                             <th>QUANTITY</th>
                             <th>PRICE</th>
                             <th>TOTAL</th>
                             </tr>
                             </thead>
                             ';
                             while($row=mysqli_fetch_Assoc($result)){
                                $id=$row['id'];
        $slot=$row['slot_no'];
    $asset=$row['asset_name'];
    $dept=$row['department'];
    $device=$row['device'];
    $p_date=$row['p_date'];
    $p_from=$row['p_from'];
    $p_by=$row['p_by'];
    $warranty=$row['warranty'];
                                $quantity=$row['quantity'];
                                     $price=$row['price'];
                                     $total=$quantity*$price;
                            
                                     $current_Date=date('Y-m-d');
                                     $expiry_date=$warranty;
                                     $days_remaining=floor((strtotime($expiry_date)-strtotime($current_Date))/(60*60 *24));
                                      
                                     
                                       
                                     
                                     if($days_remaining<7 && $days_remaining>0){
                                         echo'    <tr bgcolor="red">
                                     
                                             <td>'.$slot.'</td>
                                             <td>'.$asset.'</td>
                                             <td>'.$dept.'</td>  
                                             <td>'.$device.'</td>
                                             <td>'.$p_date.'</td>
                                             <td>'.$p_from.'</td>
                                             <td>'.$p_by.'</td> <td>'.$warranty.'</td>
                                             <td>'.$quantity.'</td>
                                              <td>'.$price.'</td>
                                              <td>'.$total.'</td>
                                              
                                              
                                              
                                             </tr>';
                                         
                                     }
                                     
                                 else if($days_remaining==0)
                                 { 
                                     echo'    <tr bgcolor="aqua">
                                     
                                             <td>'.$slot.'</td>
                                             <td>'.$asset.'</td>
                                             <td>'.$dept.'</td>  
                                             <td>'.$device.'</td>
                                             <td>'.$p_date.'</td>
                                             <td>'.$p_from.'</td>
                                             <td>'.$p_by.'</td> <td>'.$warranty.'</td>
                                             <td>'.$quantity.'</td>
                                              <td>'.$price.'</td>
                                              <td>'.$total.'</td>
                                              
                                              
                                              
                                             </tr>';
                                 
                                 }
                                 else if($days_remaining<0)
                                 {
                                     echo'    <tr bgcolor="orange">
                                     
                                             <td>'.$slot.'</td>
                                             <td>'.$asset.'</td>
                                             <td>'.$dept.'</td>  
                                             <td>'.$device.'</td>
                                             <td>'.$p_date.'</td>
                                             <td>'.$p_from.'</td>
                                             <td>'.$p_by.'</td> <td>'.$warranty.'</td>
                                             <td>'.$quantity.'</td>
                                              <td>'.$price.'</td>
                                              <td>'.$total.'</td>
                                              
                                              
                                              
                                             </tr>';
                                 }
                                 
                                 else {
                                     echo'    <tr bgcolor="white">
                                     
                                             <td>'.$slot.'</td>
                                             <td>'.$asset.'</td>
                                             <td>'.$dept.'</td>  
                                             <td>'.$device.'</td>
                                             <td>'.$p_date.'</td>
                                             <td>'.$p_from.'</td>
                                             <td>'.$p_by.'</td> <td>'.$warranty.'</td>
                                             <td>'.$quantity.'</td>
                                              <td>'.$price.'</td>
                                              <td>'.$total.'</td>
                                              
                                              
                                              
                                             </tr>';
                                 }
    
                                 
                                 

                             
                             
                                                                           
                             }
                


           
            
        
                }
                else{
                    echo '<h2>DATA NOT FOUND</h2>';
                }
                
            }
        }

        ?>
       </table>
</body>
</html>