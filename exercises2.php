<?php
 function countWords($str)
				{
				return $strArray = array_count_values(str_word_count(strtolower($str), 1));
				}
?>
<html>
<head>
  <title>PHP Assesment Excercise 2</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<div class="container">

  <form name="wordCount" method="GET" action=<?php echo $_SERVER['PHP_SELF']; ?>>
      <p>Enter text here:
        <br>
        <textarea name="countWords" rows="6" cols="50" wrap="physical" required></textarea>
        <div class="col-lg-2">
          <input type="submit" class="btn btn-primary" name="submitForm" value="Submit">
        </div>
  </form>
  </div>
 <?php
 if (isset($_GET['submitForm'])) {
 $str = $_REQUEST['countWords'];
 $valArr = countWords($str);

?>
<div class="container">
 <h1>How many words were input: <?php echo  count($valArr);?></h1>
<div class="row list-group-item active">
			<div class="col-lg-3" >Word </div>
			<div class="col-lg-3" >Count </div>
</div>	
			  <?php
	foreach($valArr as $word=>$count): ?>
	<div class="row alert alert-primary">
	<div class="col-lg-3" ><?php echo $word; ?></div>
	<div class="col-lg-3" ><?php echo $count; ?></div>
	</div>
	<?php endforeach; ?>

	<?php } ?>
 </div>
</body>

</html>

