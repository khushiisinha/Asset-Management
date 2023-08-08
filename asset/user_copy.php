
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
      

    @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700');

$base-spacing-unit: 24px;
$half-spacing-unit: $base-spacing-unit / 2;

$color-alpha: #1772FF;
$color-form-highlight: #EEEEEE;

*, *:before, *:after {
	box-sizing:border-box;
}

body {
	padding:$base-spacing-unit;
	font-family:'Source Sans Pro', sans-serif;
	margin:0;
}

h1,h2,h3,h4,h5,h6 {
	margin:0;
}

.container {
	max-width: 1000px;
	margin-right:auto;
	margin-left:auto;
	display:flex;
	justify-content:center;
	align-items:center;
	min-height:100vh;
}

.table {
	width:100%;
	border:1px solid $color-form-highlight;
}

.table-header {
	display:flex;
	width:100%;
	background:#000;
	padding:($half-spacing-unit * 1.5) 0;
}

.table-row {
	display:flex;
	width:100%;
	padding:($half-spacing-unit * 1.5) 0;
	
	&:nth-of-type(odd) {
		background:$color-form-highlight;
	}
}

.table-data, .header__item {
	flex: 1 1 20%;
	text-align:center;
}

.header__item {
	text-transform:uppercase;
}

.filter__link {
	color:white;
	text-decoration: none;
	position:relative;
	display:inline-block;
	padding-left:$base-spacing-unit;
	padding-right:$base-spacing-unit;
	
	&::after {
		content:'';
		position:absolute;
		right:-($half-spacing-unit * 1.5);
		color:white;
		font-size:$half-spacing-unit;
		top: 50%;
		transform: translateY(-50%);
	}
	
	&.desc::after {
		content: '(desc)';
	}

	&.asc::after {
		content: '(asc)';
	}
	
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
            <a href="asset.php"><li>HOME</li></a>

            <a href="user_data.php"><li>ADD USER</li></a>
            <a href="logout.php">
                <li>LOGOUT</li>
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
   
   $sql="select * from  `user_data` ";
   $result=mysqli_query($con,$sql);


  
  if($result)
  {
    if(mysqli_num_rows($result)>0){
        echo'
        <div class="container">
    <div class="table">
    
        <div class="table-header">
       

                <div class="header__item">LOT NUMBER</div>
                <div class="header__item">ASSET NAME</div>
                <div class="header__item">EMP ID NUMBER</div>
                <div class="header__item">USER NAME</div>
                <div class="header__item">MOBILE NUMBER</div>
                <div class="header__item">AREA</div>
                <div class="header__item">EXPECTED INSTALLATION DATE</div>
                <div class="header__item">ACTUAL INSTALLATION DATE</div>
                <div class="header__item">REMARKS</div>
           
        
        </div>


<div class="table-content">
           
';
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
        
        echo'   
    
       
<div class="table-row">
    
    <div class="table-data">'.$slot_number.'</div>
    <div class="table-data">'.$asset_name.'</div>
    <div class="table-data">'.$emp_id.'</div>
    <div class="table-data">'.$user_name.'</div>
    <div class="table-data">'.$mobile_number.'</div>
    <div class="table-data">'.$area.'</div>   
    <div class="table-data">'.$expected_installation.'</div>
    <div class="table-data"> '.$actual_installation.'</div>
    
    <div class="table-data">'.$remarks.'</div>
             
             
             
            
            </div>
            ';
}

    }
    else{
        echo"NO DATA FOUND";
    }
}

    

  
   
   

?>

            
</div>
        
    </div>
   
</div>

    
    <br><br>
</body>

</html>
