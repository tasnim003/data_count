<?php
require('admin_dbcon.php');
if(isset($_POST['register'])){
$username=$_POST['username'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$c_password=$_POST['c_password'];
$input_error=array();
if(empty($username)){
    $input_error['username']="Username is required";
}
if(empty($email)){
    $input_error['email']="Email is required";
}
if(empty($mobile)){
    $input_error['mobile']="Mobile is required";
}
if(empty($password)){
    $input_error['password']="Password is required";
}
if(empty($c_password)){
    $input_error['c_password']="Confirm Password is required";
}

if(count($input_error)==0){
    if(strlen($username)<8){
        $username_small_check="Username is too small";
        }else{
            $username_check_query=mysqli_query($dbcon,"SELECT * FROM `users` WHERE `username`='$username'");
           
            if(mysqli_num_rows($username_check_query)==0){
            
                if(strlen($password)>7 || strlen($c_password)>7){
                    if($password==$c_password){
                        $password=md5($password);
                       $query=mysqli_query($dbcon,"INSERT INTO `users`(`username`, `email`, `mobile`, `password`) VALUES ('$username','$email','$mobile','$password')");
                        if($query){
                            echo "
                                    <script>
                                    alert('Registered Successfully Completed');
                                    window.location.href='index.php';
                                    </script>
                            ";
                            $username=false;
                            $email=false;
                            $mobile=false;
                            $password=false;
                        }
                    }else{
                        $notmatchPassword="Password do not match!";
                    }

                }else{
                  $passwordlen="Minimum 8 Character";  
                }

            }else{
                $username_unique="This username is already exist";
            }
        }



}


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-Future Computer Training Institute</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <h1>Student Register System</h1>
        <form action="" method="POST">
            <div class="input-group">
                <label for="">Username:</label>
                <input type="text" name="username" id="">
                <label class="error" for=""><?php if(isset($input_error['username'])){echo $input_error['username'];}?></label>
                <label class="error" for=""><?php if(isset($username_small_check)){echo $username_small_check;}?></label>
                <label class="error" for=""><?php if(isset($username_unique)){echo $username_unique;}?></label>
            </div>
            <div class="input-group">
                <label for="">Email:</label>
                <input type="email" name="email" id="">
                <label class="error" for=""><?php if(isset($input_error['email'])){echo $input_error['email'];}?></label>
            </div>
            <div class="input-group">
                <label for="">Mobile:</label>
                <input type="tel" name="mobile" id="">
                <label class="error" for=""><?php if(isset($input_error['mobile'])){echo $input_error['mobile'];}?></label>
            </div>
            <div class="input-group">
                <label for="">Password:</label>
                <input type="password" name="password" id="password">
                <label class="error" for=""><?php if(isset($input_error['password'])){echo $input_error['password'];}?></label>
                <label class="error" for=""><?php if(isset($passwordlen)){echo $passwordlen;}?></label>
            </div>
            <div class="input-group">
                <label for="">Confirm Password:</label>
                <input type="password" name="c_password" id="c_password">
                <label class="error" for=""><?php if(isset($input_error['c_password'])){echo $input_error['c_password'];}?></label>
                <label class="error" for=""><?php if(isset($notmatchPassword)){echo $notmatchPassword;}?></label>
            </div>
          <div class="input-check">
          <input style="width:20px; height:20px;" onclick="myCheck()" type="checkbox"><span style="font-size:22px; padding-left:15px">Show Password</span>
          </div>
          <button type="submit" name="register">Register</button>

        </form>

    </div>
    <script src="apps.js"></script>
</body>
</html>