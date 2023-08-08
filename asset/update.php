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
  $sql="select * from `asset_data` where id=$id";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  
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

if(isset($_POST['submit'])){
    $head= strtoupper($_POST['head']);

    if($head=="HARDWARE"){
        $asset_name=strtoupper($_POST['asset_name1']);
    }
    if($head=="SOFTWARE"){
        $asset_name=strtoupper($_POST['asset_name2']);
    }

    $slot_number=strtoupper($_POST['slot_number']);
    $area=strtoupper($_POST['area']);
    $quantity=strtoupper($_POST['quantity']);
    $make=strtoupper($_POST['make']);
    $description=strtoupper($_POST['description']);
    
    $contract_start=strtoupper($_POST['contract_start']);

    $contract_expiry= strtoupper($_POST['contract_expiry']);
    $warranty_start=strtoupper($_POST['warranty_start']);
    $warranty_expiry=strtoupper($_POST['warranty_expiry']);
    $amc_start=strtoupper($_POST['amc_start']);
    $amc_expiry=strtoupper($_POST['amc_expiry']);
    $purchased_date=strtoupper($_POST['purchased_date']);
    $expected_delivery=strtoupper($_POST['expected_delivery']);

    $actual_delivery= strtoupper($_POST['actual_delivery']);
    $LD=strtoupper($_POST['LD']);
    $purchasing_dept=strtoupper($_POST['purchasing_dept']);
    $vendor_details=strtoupper($_POST['vendor_details']);
    $gem=strtoupper($_POST['gem']);
    $capital_revenue=strtoupper($_POST['capital_revenue']);
    $remarks=strtoupper($_POST['remarks']);

    $statusMsg = '';

    if( !empty($_FILES["doc"]["name"])){
    $fileName = basename($_FILES["doc"]["name"]);
   
   echo"in if";
    $targetDir = "UPLOADS/";
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    
        
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            
            if(move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFilePath)){
                
                $insert = $con->query("update `asset_data` set head='$head',asset_name='$asset_name',slot_number='$slot_number',area='$area',quantity='$quantity',make='$make',description='$description',doc='$fileName',contract_start='$contract_start',
                contract_expiry='$contract_expiry',warranty_start='$warranty_start',warranty_expiry='$warranty_expiry',
                amc_start='$amc_start',amc_expiry='$amc_expiry',purchased_date='$purchased_date',expected_delivery='$expected_delivery',
                actual_delivery='$actual_delivery',LD='$LD',purchasing_dept='$purchasing_dept',vendor_details='$vendor_details',gem='$gem',capital_revenue='$capital_revenue',remarks='$remarks' where id=$id");
                
        
                if($insert){
                    header('location:edit.php');
                }else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    
    
    
    echo "<script>alert('$statusMsg')</script>";
    }
   
   else{
    echo"else";
    $fileName=$row['doc'];
    $insert = $con->query("update `asset_data` set head='$head',asset_name='$asset_name',slot_number='$slot_number',area='$area',quantity='$quantity',make='$make',description='$description',doc='$fileName',contract_start='$contract_start',
    contract_expiry='$contract_expiry',warranty_start='$warranty_start',warranty_expiry='$warranty_expiry',
    amc_start='$amc_start',amc_expiry='$amc_expiry',purchased_date='$purchased_date',expected_delivery='$expected_delivery',
    actual_delivery='$actual_delivery',LD='$LD',purchasing_dept='$purchasing_dept',vendor_details='$vendor_details',gem='$gem',capital_revenue='$capital_revenue',remarks='$remarks' where id=$id");
    
    if($insert){
        header('location:edit.php');
    }else{
        die(mysqli_error($con));
    }

   }
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
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
        
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
            <a   href="view.php"><li > FILTER DATA</li></a>
            <a   href="asset.php"><li > HOME</li></a>
            <a   href="add.php"><li > ADD DATA</li></a>
            
                
                <a   href="logout.php"><li style="margin-left:150px; background-color:DARKBLUE; COLOR:WHITE; padding-top:2px; border-radius:10px;">LOGOUT  <i class="fa fa-sign-out"></i></li></a>

            </ul>

        </nav>
         
        <div class="data">
       <form action="" method="POST" enctype="multipart/form-data">
         <h1>UPDATE DATA:</h1><br><br>
         
         <script type="text/javascript">
    function ShowHideDiv() {
        var hardware = document.getElementById("hardware");
        var yes_hard = document.getElementById("yes_hard");
        var yes_soft = document.getElementById("yes_soft");
        yes_hard.style.display = hardware.checked ? "block" : "none";
        yes_soft.style.display = software.checked ? "block" : "none";
    }
</script>
<label>CHOOSE ASSET TYPE:</label>

     
        <input type="radio" id="hardware" name="head" value="hardware"  <?php if($row['head']=="HARDWARE"){echo "checked";}?> onclick="ShowHideDiv()" />
        HARDWARE
        <input type="radio" id="software" name="head" value="software"  <?php if($row['head']=="SOFTWARE"){echo "checked";}?>  onclick="ShowHideDiv()" />
        SOFTWARE

           
      
    

    
<br><br><br>
<?php if($row['head']=='HARDWARE'){
    echo '<div id="yes_soft" style="display: none">';
}
else  if($row['head']=="SOFTWARE")
{
     echo '<div id="yes_soft" style="display: block">';
}
?>

    <label>ASSET NAME:</label>
    <select name="asset_name2" id="device"  style="width:600px;"  >
        <option value="antivirus"  <?php if($row['asset_name']=="ANTIVIRUS"){echo "selected";}?>>ANTIVIRUS</option>
        
        <option value="firewall" <?php if($row['asset_name']=="FIREWALL"){echo "selected";}?>>FIREWALL</option>
        <option value="microsoft office" <?php if($row['asset_name']=="MICROSOFT OFFICE"){echo "selected";}?>>MICROSOFT OFFICE</option>
        <option value="adobe photoshop" <?php if($row['asset_name']=="ADOBE PHOTOSHOP"){echo "selected";}?>>ADOBE PHOTOSHOP</option>
        <option value="wps office" <?php if($row['asset_name']=="WPS OFFICE"){echo "selected";}?>>WPS OFFICE</option>
        <option value="internet explorer" <?php if($row['asset_name']=="INTERNET EXPLORER"){echo "selected";}?>>INTERNET EXPLORER</option>
        <option value="google chrome" <?php if($row['asset_name']=="GOOGLE CHROME"){echo "selected";}?>>GOOGLE CHROME</option>
        <option value="xampp" <?php if($row['asset_name']=="XAMPP"){echo "selected";}?>>XAMPP</option>
        <option value="visual studio" <?php if($row['asset_name']=="VISUAL STUDIO"){echo "selected";}?>>VISUAL STUDIO</option>
        
        </select>
</div>
<?php if($row['head']=='HARDWARE'){
    echo '<div id="yes_hard" style="display: block">';
}
else  if($row['head']=="SOFTWARE")
{
     echo '<div id="yes_hard" style="display: none">';
}
?>

   <label> ASSET NAME:</label>
    <select name="asset_name1" id="device"  style="width:600px;" >
        <option value="desktop" <?php if($row['asset_name']=="DESKTOP"){echo "selected";}?>>DESKTOP</option>
        <option value="keyboard" <?php if($row['asset_name']=="KEYBOARD"){echo "selected";}?>>KEYBOARD</option>
        <option value="mouse" <?php if($row['asset_name']=="MOUSE"){echo "selected";}?>>MOUSE</option>
        <option value="cpu" <?php if($row['asset_name']=="CPU"){echo "selected";}?>>CPU</option>
        <option value="laptop" <?php if($row['asset_name']=="LAPTOP"){echo "selected";}?>>LAPTOP</option>
        <option value="ups" <?php if($row['asset_name']=="UPS"){echo "selected";}?>>UPS</option>
        <option value="joystick" <?php if($row['asset_name']=="JOYSTICK"){echo "selected";}?>>JOYSTICK</option>
        <option value="scanner" <?php if($row['asset_name']=="SCANNER"){echo "selected";}?>>SCANNER</option>
        <option value="printer" <?php if($row['asset_name']=="PRINTER"){echo "selected";}?>>PRINTER</option>
        
        </select>
</div>

         
<br><Br>
<div><label for="">SLOT NUMBER</label></div>
<div><input type="text" autocomplete="off" name="slot_number" style="text-transform:uppercase" class="box"   value="<?php echo $row['slot_number'] ;?>"></div><br><br>

<div><label for="">AREA</label></div>
<div><input type="text" autocomplete="off" name="area" style="text-transform:uppercase" class="box"   value="<?php echo $row['area'] ;?>"></div><br><br>

    <div>
         <label for="">QUANTITY</label></div>
         <div>

         <input type="number"autocomplete="off" name="quantity"  value="<?php echo $row['quantity'] ;?>" class="box"></div><br><br>

         <!--<select name="device" id="device" name="device">
        <option value="h">Hardware</option>
        <option value="s">Software</option>
        </select>-->

        <div><label for="">MAKE</label></div>
        <div>
        <input type="text" autocomplete="off" name="make" style="text-transform:uppercase"  value="<?php echo $row['make'] ;?>" class="box"></div><br><Br>

        <div>
         <label for="">DESCRIPTION</label></div>
         <div>
        <input type="text" name="description" id=""  style="text-transform:uppercase"  value="<?php echo $row['description'] ;?>" class="box-text"></div><br><Br>
          <div>
        <label for="">SUPPLY ORDER(DOC)</label></div>
        <div>
           
        <input type="file" autocomplete="off" name="doc" style="text-transform:uppercase" class="box"></div>
        <span name="old" value="<?=$row['doc']?>"><?php echo $row['doc']?></span>
        <br><Br>
        
<div>
        <label for="">CONTRACT START DATE</label></div>
            <div>
        <input type="date" autocomplete="off" name="contract_start" style="text-transform:uppercase" value="<?php echo $row['contract_start'] ;?>" class="box"></div><br><br>

        <div><label for="">CONTRACT EXPIRY DATE</label></div>
        <div><input type="date" autocomplete="off" name="contract_expiry" style="text-transform:uppercase" value="<?php echo $row['contract_expiry'] ;?>" class="box"></div><br><br>


        <div><label for="">WARRANTY START DATE</label></div>
         <div><input type="date" autocomplete="off" name="warranty_start" value="<?php echo $row['warranty_start'] ;?>" class="box"></div><br><br> 

        <div><label for="">WARRANTY EXPIRY DATE</label></div>
         <div><input type="date" autocomplete="off" name="warranty_expiry" value="<?php echo $row['warranty_expiry'] ;?>" class="box"></div><br><Br>
        
        
         <div><label for="">AMC START DATE</label></div>
         <div><input type="date" autocomplete="off" name="amc_start" style="text-transform: uppercase" value="<?php echo $row['amc_start'] ;?>" class="box"></div><br><br>
         
         
         <div><label for="">AMC EXPIRY DATE</label></div>
         <div><input type="date"autocomplete="off" name="amc_expiry" style="text-transform: uppercase" value="<?php echo $row['amc_expiry'] ;?>" class="box"></div><br><br>
         
         <div><label for="">PURCHASED DATE</label></div>
    <div><input type="date" autocomplete="off" name="purchased_date" style="text-transform:uppercase" value="<?php echo $row['purchased_date'] ;?>" class="box"></div><br><br>

         
        <div> <label for="">EXPECTED DELIVERY DATE</label></div>
        <div>
         <input type="date" autocomplete="off" name="expected_delivery" style="text-transform:uppercase" value="<?php echo $row['expected_delivery'] ;?>" class="box"></div><br><br>
          
         <div><label for="">ACTUAL DELIVERY DATE</label></div>
        <div> <input type="date" autocomplete="off" name="actual_delivery" style="text-transform:uppercase" value="<?php echo $row['actual_delivery'] ;?>" class="box"></div><br><br>
         
        <div> <label for="">LD(if any)</label></div>
         <div><input type="date" autocomplete="off" name="LD" style="text-transform:uppercase" value="<?php echo $row['LD'] ;?>" class="box"></div><br><br>
         
         <div><label for="">PURCHASING DEPARTMENT</label></div>
         <div>
         <input type="text" autocomplete="off" name="purchasing_dept" style="text-transform:uppercase" value="<?php echo $row['purchasing_dept'] ;?>" class="box"></div><br><br>

         <div><label for="">VENDOR DETAILS</label></div>
         <div><input type="text" autocomplete="off" name="vendor_details" style="text-transform:uppercase" value="<?php echo $row['vendor_details'] ;?>" class="box"></div><br><br>

         <div><label for="">GEM/Other</label></div>
        <div> <input type="text" autocomplete="off" name="gem" style="text-transform:uppercase" value="<?php echo $row['gem'] ;?>" class="box"></div><br><br>
         
        <div> <label for="">CAPITAL REVENUE</label></div>
         <div><input type="text" autocomplete="off" name="capital_revenue" style="text-transform:uppercase" value="<?php echo $row['capital_revenue'] ;?>" class="box"></div><br><br>
         
         <div><label for="">REMARKS</label></div>
         <div><input type="text" name="remarks" id="" style="text-transform:uppercase" value="<?php echo $row['remarks'] ;?>" class="box-text"></textarea></div><br><Br>



         <button type="submit" name= "submit">UPDATE</button>

       </form> 
</div>


</body>
</html>



