<?php

    session_start();

    if(isset($_SESSION['username']) =="") {
        header("Location: login.php");
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
            <div class="col-lg-8">
			                    <div class="form-group">
                        <label>UserName :- <?php echo $_SESSION['username']?></label>
                     </div>

                    <div class="form-group">
                        <label>Phone :- <?php echo $_SESSION['phone']?></label>
                    </div>  
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                  </div>
                </div>
            </div>
     
</body>
</html>
