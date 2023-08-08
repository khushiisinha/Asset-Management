
<?php
 
include_once('conn.php');
$rand=rand(9999,1000);
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
   
                
    $captcha=$_REQUEST['captcha'];
    $captcha_random=$_REQUEST['captcha-rand'];
    if($captcha!=$captcha_random){
        echo'<script>alert("ENTER CORRECT CAPTCHA")</script>';
    }
    else{
    $stmt = $conn->prepare("SELECT * FROM adminlogin");
    $stmt->execute();
    $users = $stmt->fetchAll();
     
    foreach($users as $user) {
         
        if(($user['username'] == $username) &&
            ($user['password'] == $password)) {
                
                session_start();
                $_SESSION["user"]=$username;
                $_SESSION["pass"]=$password;
                header("location: asset.php");
                
                
        }
        else {
            //header("location:index.php");
            echo'<script>alert("ENTER CORRECT USERNAME AND PASSWORD")</script>';
              
        }
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
       /* body{
            background: rgba(76, 175, 80, 0.3);
        }*/
       
        .login1-index{
    /*background-color: aqua;*/
    
     width:550px;
    /* background-color:#F5F0BB;*/
     height:470px;
     padding-top:20px;
     margin-top: 10%;
     box-shadow: 2px 5px 10px 3px #ccc;
     border-radius: 10px;
     display:flex;
     margin-left:auto;
     margin-right:auto;
     background-color:white;
     

}
input:hover{
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.15);
}
.captcha{
    width:50%;
    background:yellow;
    text-align:center;
    font-size:24px;
    font-weight:700;
}

input{
    width:300px;
        height:40px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.submit {
  
  background-color: #FFE569;
  /*background-color: #B3890;*/
  color: white;
  
 width:100px;
  border:none;
  border-radius: 4px;
  cursor: pointer;
  font-weight:600;
  font-size:15px;
  margin-bottom:10px;
 
  
}
.submit:hover {
  background-color: #F6FA70;
  /*background-color:#D0F5BE;*/
}
.log-img {
    width:200px;
    height:450px;
    padding:10px;
   
}
.log-img p{
   font-weight:bold; 
}
.form-login{
    padding-left:20px;
}
/*.box {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 25rem;
  padding: 2.5rem;
  box-sizing: border-box;
  background: rgba(0, 0, 0, 0.6);
  border-radius: 0.625rem;
}
body {
  margin: 0;
  padding: 0;
  background: url(https://picsum.photos/2500/1500?image=1041);
  background-size: cover;
  font-family: sans-serif;
}*/
    </style>
</head>




<body>
   
       
<div class="box">
        <div class="login1-index">
            <div class="log-img"><img src="image/ccl_icon.png" alt="ccl_login">
            <p>CCL<br>
            A GOVERNMENT OF INDIA UNDERTAKING<br>
            A MINIRATNA COMPANY</p>
            </div>
            <div class="form-login">
    <form action="" method="POST">
        <center><h1>LOGIN</h1> <hr></center><br>
        <div class="label1">
        <label for="" >USERNAME</label>
        </div>
        <input type="text" name="username" autocomplete="off" placeholder="USERNAME"><br>
        <div class="label1">
        <label for="" class="label1" >PASSWORD</label>
        </div>
        <input type="password" name="password" placeholder="PASSWORD"><br>
        <div>
        <label for="captcha">Captcha</label></div>
           <input type="text" name="captcha" id="captcha" placeholder="Enter Captcha" required>
         <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
           <div> <label for="captcha-code">Captcha Code</label></div>
        <div class="captcha"><?php echo $rand;?></div><br>
				
        
        <button type="submit" name="login" class="submit">LOGIN</button>
    
    </form>
</div>
</div>
</div>







    
    
</body>
</html>
