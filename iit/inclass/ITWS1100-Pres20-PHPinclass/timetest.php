<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Lets get the time</title>
</head>

<body>

<p>The time is now <?php echo date('H:i:s'); ?></p>

<form action="timetest.php" method="GET" id="timeForm"> 
  <button type="submit" form="timeForm" name="btn" value="Submit">Submit</button>
</form>

</body>
</html>