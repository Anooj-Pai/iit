<!-- <form action="PHPSlideExTimeButton.php" method="GET" id="timeForm"> 
  <button type="submit" form="timeForm" name="btn" value="Submit">Submit</button>
</form> -->
<?php
include("PHPSlideExTimeButton-Index.php");
?>


<?php
if (isset($_GET["btn"])) {
  echo "<p>The time is now " . date('H:i:s')."</p>";
}
?>

<pre>
<?php var_dump($_GET);?>
</pre>