
<?php
include 'connect.php';


session_start(); 
$userp=$_SESSION["user"];

if($userp==true) 
{

}else
{    header('location:admin_login.php');
    
}

$id=$_GET['editid'];
$sql="select * from `user_data` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['id'];






if(isset($_POST['submit'])){
    
    $slot_number= strtoupper($_POST['lot_number']);
    
    $asset_name=strtoupper($_POST['asset_name']);
    $emp_id=strtoupper($_POST['emp_id']);
    $user_name=strtoupper($_POST['user_name']);
    $mobile_number=strtoupper($_POST['mobile_number']);
    $area=strtoupper($_POST['area']);
    $expected_installation=$_POST['expected_installation'];
    $actual_installation=$_POST['actual_installation'];
    
    $remarks=strtoupper($_POST['remarks']);
    

    

    $sql="update `user_data` set slot_number='$slot_number',asset_name='$asset_name',emp_id='$emp_id',user_name='$user_name',mobile_number='$mobile_number',area='$area',expected_installation='$expected_installation',actual_installation='$actual_installation',remarks='$remarks' where id=$id";
    
    
    
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:user.php');
        
        
     }
     else{
         die(mysqli_error($con));
     }
    
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">

    <style>
       
        .data{
        /*background-color:#F5F0BB;*/
        
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
          
     width:1000px;
     /*
     height:1200px;*/
     background-color:white;
     margin-top:2%;
     padding-bottom: 8px;
     border-radius: 10px;
     padding-top:20px;
     padding-left:10px;
     margin-left:15%;
     margin-right:20%;
     padding-right:10px;
     
         
     }
     .data h1{
        text-align:center;
        padding-left:0px;
        font-weight:700;
     }
     .data label{
        padding-left:10px;
        font-weight:600;
     }
     .box{
        width:900px;
        height:40px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
        
     }
     /*.box-text{
        width:900px;
       
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
  font-size:20px;
        
     }*/

    
     
     .head label{
        padding-left:0px;
     }
     
    

.submit {
  
  /*background-color: #FFE569;*/
  background-color: #B3C890;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border:none;
  border-radius: 4px;
  cursor: pointer;
  font-weight:600;
  font-size:20px;
  margin-left:80%;
  
}
.submit:hover {
  /*background-color: #F6FA70;*/
  background-color:#D0F5BE;
}
.heading{
    height:40px;
    /*background-color:#F9D949;*/
    color:#B3C890;
   font-size:700;
    padding-left:0px;
    padding-top:3px;
    font-family:serif;
    border-radius:10px;
    text-shadow: 1px 1px 1px #000, 
               3px 3px 5px #D0F5BE; 
    
}
.box-text{
        width:900px;
        height:100px;
       
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
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
            
            <ul >
            
            <a href="delete.php"><li>DELETE DATA</li></a>
            <a   href="edit.php"><li > EDIT DATA</li></a>
            <a   href="asset.php"><li > HOME</li></a>
            <a   href="view.php"><li > FILTER DATA</li></a>
            
                
                <a   href="logout.php"><li style="margin-left:150px; background-color:DARKBLUE; COLOR:WHITE; padding-top:2px; border-radius:10px;">LOGOUT  <i class="fa fa-sign-out"></i></li></a>

            </ul>

        </nav>
        <div class="data">
       <form action="" method="POST">
         <div class="heading"><h1><b>ENTER ASSET's USER DATA:</b></h1></div><br><br>
        <hr>
         <br>
         <div><label for="">LOT NUMBER</label></div>
         <div>
         <input type="text" autocomplete="off" name="lot_number" style="text-transform:uppercase" value="<?php echo $row['slot_number'] ;?>" class="box"></div>
         <br><br>
         <div><label for="">ASSET NAME</label></div>
         <div>
         <input type="text" autocomplete="off" name="asset_name" style="text-transform:uppercase" value="<?php echo $row['asset_name'] ;?>"class="box"></div>
         <br><br>
         <div><label for="">EMP ID NUMBER</label></div>
         <div>
         <input type="text" autocomplete="off" name="emp_id" style="text-transform:uppercase" value="<?php echo $row['emp_id'] ;?>"class="box"></div>
         <br><br>
         <div><label for="">USER NAME</label></div>
         <div>
         <input type="text" autocomplete="off" name="user_name" style="text-transform:uppercase" value="<?php echo $row['user_name'] ;?>"class="box"></div>
         <br><br>
         <div><label for="">MOBILE NO.</label></div>
         <div>
         <input type="tel" autocomplete="off" name="mobile_number" style="text-transform:uppercase" value="<?php echo $row['mobile_number'] ;?>" class="box"></div>
         <br><Br>
         
         <div><label for="">AREA</label></div>
         <div>
         <input type="text" autocomplete="off" name="area" style="text-transform:uppercase" value="<?php echo $row['area'] ;?>"class="box"></div>
         <br><Br>
         <div><label for="">EXPECTED INSTALLATION DATE</label></div>
         <div>
         <input type="date" autocomplete="off" name="expected_installation" style="text-transform:uppercase" value="<?php echo $row['expected_installation'] ;?>"class="box"></div>
         <br><br>
         <div><label for="">ACTUAL INSTALLATION DATE</label></div>
         <div>
         <input type="date" autocomplete="off" name="actual_installation" style="text-transform:uppercase" value="<?php echo $row['actual_installation'] ;?>" class="box"></div>
         <br><br>
         <div><label for="">REMARKS</label></div>
         <div><input type="text" name="remarks" id=""  value="<?php echo $row['remarks'] ;?>" class="box-text"></div><br><Br>
        
        

        
          
         
          
         
         <button type="submit" name= "submit" class="submit" >SAVE</button>

       </form> 
</div>
</body>
</html>