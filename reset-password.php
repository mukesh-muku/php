<?php
session_start();

require_once "db.php";

if(isset($_SESSION['username'])!="") {
    header("Location: dashboard.php");
}

if (isset($_POST['login'])) {
	  $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $result = mysqli_query($conn, "SELECT * FROM 6470exerciseusers WHERE username = '" . $username. "'  and  phone = '" .$phone. "'");
	$isExits = mysqli_num_rows($result);
 
   if($isExits!=0){
	    $randompass = substr(md5(time()), 0, 8);
		$error_message = 'New Password Reset Successfully<br><b>'.$randompass;
   
      	  $result = mysqli_query($conn, "update 6470exerciseusers  set password= '" . md5($randompass) . "' where username = '" . $username. "'  and  phone = '" .$phone. "'");
	
          
    }else{
        $error_message = "failure to reset the password";
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
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="phone" name="phone" class="form-control" value="" maxlength="10" required="">
                    </div>  
                    
                    <input type="submit" class="btn btn-primary" name="login" value="submit"><a href="login.php" class="btn btn-primary">Login</a>
                    <br>
                    Change Password?<a href="change-password.php" class="mt-3">Click Here</a><br>
				    
                    
                </form>
            </div>
        </div>     
    </div>
</body>
</html>
