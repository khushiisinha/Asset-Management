<?php
   

?>


<?php
include 'connect.php';


session_start(); 
$userp=$_SESSION["user"];

if($userp==true) 
{

}else
{    header('location:admin_login.php');
    
}


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


$targetDir = "UPLOADS/";
$fileName = basename($_FILES["doc"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if( !empty($_FILES["doc"]["name"])){
    
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        
        if(move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFilePath)){
            
            $insert = $con->query("INSERT INTO `asset_data`(head,asset_name,slot_number,area,quantity,make,description,doc,contract_start,contract_expiry,warranty_start,warranty_expiry,
            amc_start,amc_expiry,purchased_date,expected_delivery,actual_delivery,LD,purchasing_dept,vendor_details,gem,capital_revenue,remarks)
             VALUES ('$head','$asset_name','$slot_number','$area','$quantity','$make','$description','$fileName','$contract_start','$contract_expiry','$warranty_start','$warranty_expiry',
    '$amc_start','$amc_expiry','$purchased_date','$expected_delivery','$actual_delivery','$LD','$purchasing_dept','$vendor_details','$gem','$capital_revenue','$remarks')");
            
    
            if($insert){
                header('location:asset.php');
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}


echo "<script>alert('$statusMsg')</script>";

    
    
    
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
            <a   href="edit.php"><li > EDIT DATA</li></a>
            <a   href="asset.php"><li > HOME</li></a>
            <a   href="view.php"><li > FILTER DATA</li></a>
            
                
                <a   href="logout.php"><li style="margin-left:150px; background-color:DARKBLUE; COLOR:WHITE; padding-top:2px; border-radius:10px;">LOGOUT  <i class="fa fa-sign-out"></i></li></a>

            </ul>

        </nav>
        
        
        <div class="data">
       <form action="" method="POST" enctype="multipart/form-data">
         <div class="heading"><h1><b>ENTER ASSET DATA:</b></h1></div><br><br>
        <hr>
         <br>
         <script type="text/javascript">
    function ShowHideDiv() {
        var hardware = document.getElementById("hardware");
        var software=document.getElementById("software");
        var yes_hardware = document.getElementById("yes_hardware");
        var yes_software = document.getElementById("yes_software");
        
        yes_hardware.style.display = hardware.checked ? "block" : "none";
        yes_software.style.display = software.checked ? "block" : "none";   
       
    }
</script>      

<div >
<label>CHOOSE ASSET TYPE:</label>
    <input type="radio" id="hardware" name="head" value="hardware"   onclick="ShowHideDiv()" required>
    <b>HARDWARE</b> 
    <input type="radio" id="software" name="head" value="software"   onclick="ShowHideDiv()" required>
    <b>SOFTWARE</b>
</div>
<br><br><br>


<div id="yes_software" style="display: none">
    <label>ASSET NAME:</label>
    <select name="asset_name2" id="device1"  style="width:600px;"  class="box">

    <option value="">CHOOSE ASSET</option>
        <option value="antivirus">ANTIVIRUS</option>
        <option value="firewall">FIREWALL</option>
        <option value="microsoft office">MICROSOFT OFFICE</option>
        <option value="adobe photoshop" >ADOBE PHOTOSHOP</option>
        <option value="wps office">WPS OFFICE</option>
        <option value="internet explorer">INTERNET EXPLORER</option>
        <option value="google chrome">GOOGLE CHROME</option>
        <option value="xampp">XAMPP</option>
        <option value="visual studio">VISUAL STUDIO</option>
        
        </select>
</div>

<div id="yes_hardware" style="display: none" >
   <label> ASSET NAME:</label>
    <select name="asset_name1" id="device2"  style="width:600px;" class="box">

    <option value="">CHOOSE ASSET</option>
        <option value="desktop">DESKTOP</option>
        <option value="keyboard">KEYBOARD</option>
        <option value="mouse">MOUSE</option>
        <option value="cpu">CPU</option>
        <option value="laptop">LAPTOP</option>
        <option value="ups">UPS</option>
        <option value="scanner">SCANNER</option>
        <option value="printer">PRINTER</option>
        
        </select>
</div>
         
<br><Br>
<div><label for="">SLOT NUMBER</label></div>
<div><input type="text" autocomplete="off" name="slot_number" style="text-transform:uppercase" class="box"></div><br><br>

<div><label for="">AREA</label></div>
<div><input type="text" autocomplete="off" name="area" style="text-transform:uppercase" class="box"></div><br><br>

    <div>
         <label for="">QUANTITY</label></div>
         <div>

         <input type="number"autocomplete="off" name="quantity" class="box"></div><br><br>

         <!--<select name="device" id="device" name="device">
        <option value="h">Hardware</option>
        <option value="s">Software</option>
        </select>-->

        <div><label for="">MAKE</label></div>
        <div>
        <input type="text" autocomplete="off" name="make" style="text-transform:uppercase" class="box"></div><br><Br>

        <div>
         <label for="">DESCRIPTION</label></div>
         <div>
        <textarea name="description" id="" cols="106" rows="4" style="text-transform:uppercase" class="box-text"></textarea></div><br><Br>
          <div>
        <label for="">SUPPLY ORDER(DOC)</label></div>
        <div class="box">
        <input type="file" autocomplete="off" name="doc" style="text-transform:uppercase" class=".custom-file-input"></div><br><Br>
<div>
        <label for="">CONTRACT START DATE</label></div>
            <div>
        <input type="date" autocomplete="off" name="contract_start" style="text-transform:uppercase" class="box"></div><br><br>

        <div><label for="">CONTRACT EXPIRY DATE</label></div>
        <div><input type="date" autocomplete="off" name="contract_expiry" style="text-transform:uppercase" class="box"></div><br><br>


        <div><label for="">WARRANTY START DATE</label></div>
         <div><input type="date" autocomplete="off" name="warranty_start" class="box"></div><br><br> 

        <div><label for="">WARRANTY EXPIRY DATE</label></div>
         <div><input type="date" autocomplete="off" name="warranty_expiry" class="box"></div><br><Br>
        
        
         <div><label for="">AMC START DATE</label></div>
         <div><input type="date" autocomplete="off" name="amc_start" style="text-transform: uppercase" class="box"></div><br><br>
         
         
         <div><label for="">AMC EXPIRY DATE</label></div>
         <div><input type="date"autocomplete="off" name="amc_expiry" style="text-transform: uppercase" class="box"></div><br><br>
         
         <div><label for="">PURCHASED DATE</label></div>
    <div><input type="date" autocomplete="off" name="purchased_date" style="text-transform:uppercase" class="box"></div><br><br>

         
        <div> <label for="">EXPECTED DELIVERY DATE</label></div>
        <div>
         <input type="date" autocomplete="off" name="expected_delivery" style="text-transform:uppercase" class="box"></div><br><br>
          
         <div><label for="">ACTUAL DELIVERY DATE</label></div>
        <div> <input type="date" autocomplete="off" name="actual_delivery" style="text-transform:uppercase" class="box"></div><br><br>
         
        <div> <label for="">LD(if any)</label></div>
         <div><input type="date" autocomplete="off" name="LD" style="text-transform:uppercase" class="box"></div><br><br>
         
         <div><label for="">PURCHASING DEPT</label></div>
         <div>
         <input type="text" autocomplete="off" name="purchasing_dept" style="text-transform:uppercase" class="box"></div><br><br>

         <div><label for="">VENDOR DETAILS</label></div>
         <div><input type="text" autocomplete="off" name="vendor_details" style="text-transform:uppercase" class="box"></div><br><br>

         <div><label for="">GEM/Other</label></div>
         <div>
        <select name="gem" id="gem"  style="width:600px;" class="box-text" >
        <option value="">CHOOSE</option>
        <option value="gem" class="box-text">GEM</option>
        <option value="other" class="box-text">OTHER</option></select></div>
    <br><br>
         
        <div> <label for="">CAPITAL REVENUE</label></div>
         <div><input type="text" autocomplete="off" name="capital_revenue" style="text-transform:uppercase" class="box"></div><br><br>
         
         <div><label for="">REMARKS</label></div>
         <div><textarea name="remarks" id="" cols="106" rows="4" style="text-transform:uppercase" class="box-text"></textarea></div><br><Br>
         
          
         
         <button type="submit" name= "submit" class="submit" >SAVE</button>

       </form> 
</div>



</body>
</html>



