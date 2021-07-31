<?php
 function countWords($str)
				{
				return $strArray = array_count_values(str_word_count(strtolower($str), 1));
				}
?>
<html>
<head>
  <title>PHP Assesment Excercise 2</title>
</head>

<body>
  <form name="newForm" method="get" action=<?php echo $_SERVER['PHP_SELF']; ?>>
      <p>Enter text here:
        <br>
        <textarea name="countWords" rows="6" cols="50" wrap="physical" required></textarea>
        <p>
          <input type="submit" name="submitForm" value="Sumnit">
        </p>
  </form>
 <?php

 $str = $_REQUEST['countWords'];
 if( $str!='') {
 $valArr = countWords($str);
print_r($valArr);	
 
  echo "<p>How many words were input: " . count($valArr) . "</p>";
?>
<table>
    <tr>
        <th>Word</th>
        <th>Count</th>
    </tr>
    <?php
	foreach($valArr as $word=>$count): ?>
    <tr>
        <td><?php echo $word; ?></td>
        <td><?php echo $count; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
 <?php } ?>
</body>

</html>

