<?php
session_start();

require_once "db.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $result = mysqli_query($conn, "SELECT * FROM 6470exerciseusers WHERE username = '" . $username. "'  and  password = '" . md5($password). "'");
	$isExits = mysqli_num_rows($result);
 
   if($isExits!=0){
	  $error_message = 'Password  Changed  successfully';
   
      	  $result = mysqli_query($conn, "update 6470exerciseusers  set password= '" . md5($newpassword) . "' where username = '" . $username. "'  and  phone = '" .$phone. "'");
	
          
    }else{
        $error_message = "Failure to reset the password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Assesment Test Registration</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="page-header">
                   <h2>Reset Password Form </h2>
                   <p><?php echo   $error_message; ?></p>
                </div>
                <p>Please fill all fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group ">
                        <label>UserName</label>
                        <input type="username" name="username" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

                      
					  <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="password" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>  
					 <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="newpassword" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($newpassword_error)) echo $newpassword_error; ?></span>
                    </div>
                  
                    <input type="submit" class="btn btn-primary" name="login" value="submit">
                    <br>
                    Change Password?<a href="change-password.php" class="mt-3">Click Here</a>
                    
                    
                </form>
            </div>
        </div>     
    </div>
</body>
</html>
