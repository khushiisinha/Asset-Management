  <?php
     include 'connect.php';
     
     
     if(isset($_POST['save'])){

        $old=$_POST['old'];
        $new=$_POST['new'];
        $cnew=$_POST['cnew'];
        
        $query="select * from `adminlogin`";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($result);
        if($result){

        
        $old_password=$row['password'];

        //echo"$old_password";
        //echo"$old";
        //echo"$new";
        //echo"$cnew";
        
         if($old_password==$old){

         
  
  
 
        if($cnew==$new){

             $uppercase = preg_match('@[A-Z]@', $new);
           $lowercase = preg_match('@[a-z]@', $new);
             $number= preg_match('@[0-9]@', $new);
             $specialChars = preg_match('@[^\w]@', $new);

         if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new) < 8) {
                echo "<script> alert('Password should be at least 8 characters in length and should include at least 
                one upper case letter, one number, and one special character.')</script>";
           }else{ 
                
            
              $sql="update `adminlogin` set password='$new'";
              $result=mysqli_query($con,$sql);
                if($result){
                
                echo"<script>";
                echo"alert(' strong password -PASSWORD CHANGED')" ;
                
                    //echo"window.location.href = 'index.php'";
                    echo"</script>";
                   

                  
           }
       
               
             else{
                  die(mysqli_error($con));
               }
              
              
    
          }
        }
        else if($cnew!=$new){
          echo"<script>alert('NEW PASSWORD AND CONFIRM PASSWORD MUST BE SAME')</script>";
      }
        
    } 
    else{
      echo"<script>alert('old password is incorrect')</script>";

    }
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<nav>
            
            <img src="image/ccl_icon.png" alt="ccl icon">
            <p>CCL<br>
            A GOVERNMENT OF INDIA UNDERTAKING<br>
            A MINIRATNA COMPANY</p>
            <ul >
           
            
            <a   href="admin_login.php"><li >LOGIN</li></a>
            
            
                
                
                

            </ul>
            

        </nav>
<center>
        <div class="login1">
    <form action="" method="POST">
        <h1>change password</h1><br>
        
        <label for="" >old password</label>
        <input type="text" name="old" autocomplete="off"><br><br>
        
        <label for="" class="label1">new password</label>
        <input type="text" name="new"><br><Br>
        
        <label for="" class="label1">confirm password</label>
        <input type="text" name="cnew" autocomplete="off"><br><Br>
        
        <button name="save">save Password</button>
    
    </form>
</div>
</center>

</body>
</html>