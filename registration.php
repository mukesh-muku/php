<?php
  require_once "db.php";

  if(isset($_SESSION['username'])!="") {
    header("Location: dashboard.php");
  }

    if (isset($_POST['signup'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if (!$error) {
			 $result = mysqli_query($conn, "SELECT * FROM 6470exerciseusers WHERE username = '" . $username. "' ");
			$isExits = mysqli_num_rows($result);
 
    if($isExits==0){
            if(mysqli_query($conn, "INSERT INTO 6470exerciseusers(username, phone,password) VALUES('" . $username . "', '" . $phone . "', '" . md5($password) . "')")) {
             header("location: login.php");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
	}else{
		$error_message= 'Username Already exits';
	}
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Assesment Test Registration</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Registration Form </h2>
					 <p><?php echo   $error_message; ?></p>
            
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group">
                        <label>UserName</label>
                        <input type="text" name="username" class="form-control" value="" maxlength="50" required="">
                       </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="" maxlength="10" required="">
                     </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="" maxlength="8" required="">
                    </div>  

                    <input type="submit" class="btn btn-primary" name="signup" value="submit">
                    Already have a account?<a href="login.php" class="btn btn-default">Login</a>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>
