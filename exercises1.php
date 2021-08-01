<?php
 function isBitten()
				{
					return  mt_rand(0,1);
				}
?>
<!DOCTYPE html>
<html>
 <title>PHP Assesment Excercise 1</title>

<body>
<?php
$val = isBitten();
 echo ($val==1) ?"<h1>Charlie bit your finger!</h1>":"<h2>Charlie did not bite your finger!</h2>"; ?>

</body>
</html>
