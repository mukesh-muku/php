<?php
session_start();

require_once "db.php";

if(isset($_SESSION['username'])!="") {
    header("Location: dashboard.php");
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
	 if ($_POST['remember'] == 'on') {
     setcookie("username", $username, time()+(60*60*1));
    setcookie("password", $password, time()+(60*60*1));  /* expire in 1 hour */
  }
  

    $result = mysqli_query($conn, "SELECT * FROM 6470exerciseusers WHERE username = '" . $username. "'  and  password = '" . md5($password). "'");
	$isExits = mysqli_num_rows($result);
 
   if($isExits!=0){
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['phone'] = $row['phone'];
            header("Location: dashboard.php");
        } 
    }else {
        $error_message = "Incorrect username or Password!!!";
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
                   <h2>Registration Form </h2>
                   <p><?php echo   $error_message; ?></p>
                </div>
                <p>Please fill all fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group ">
                        <label>UserName</label>
                        <input type="username" name="username" class="form-control" value="<?php echo $_COOKIE['username']; ?>" maxlength="30" required="">
                     </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $_COOKIE['password']; ?>" maxlength="8" required="">
                    
                    </div>  
                    
                    <input type="submit" class="btn btn-primary" name="login" value="submit">    

                <input type="checkbox" name="remember" id="remember" value="on" <?php if(isset($_COOKIE['username'])) { echo 'checked="checked"'; } else { echo ''; } ?>> Remember me
                    <br>
                    You don't have account?<a href="registration.php" class="mt-3">Click Here</a>
					<br>
					Reset Password?<a href="reset-password.php" class="mt-3">Click Here</a>
					<br>
					Change Password?<a href="change-password.php" class="mt-3">Click Here</a>
                    
                    
                </form>
            </div>
        </div>     
    </div>
</body>
</html>
