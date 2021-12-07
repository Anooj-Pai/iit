<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('includes/functions.inc.php'); // functions
?>
<title>Quiz 3</title>   

<?php 
  include('includes/head.inc.php'); 
  // include global css, javascript, end the head and open the body
?>

<h1>Quiz 3</h1>
 
<?php include('includes/menubody.inc.php'); ?>

<?php
  // We'll need a database connection both for retrieving records and for 
  // inserting them.  Let's get it up front and use it for both processes
  // to avoid opening the connection twice.  If we make a good connection, 
  // we'll change the $dbOk flag.
  $dbOk = false;
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  /* Create a new database connection object, passing in the host, username,
     password, and database to use. The "@" suppresses errors. */
  @ $db = new mysqli('localhost', 'root', '', 'iitQuiz3');
  
  if ($db->connect_error) {
    echo '<div class="messages">Could not connect to the database. Error: ';
    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
  } else {
    $dbOk = true; 
  }

  // Now let's process our form:
  // Have we posted?
  $havePost = isset($_POST["save"]);
  
  // Let's do some basic validation
  $errors = '';
  if ($havePost) {
    
    // Get the output and clean it for output on-screen.
    // First, let's get the output one param at a time.
    // Could also output escape with htmlentities()
    $labName = htmlspecialchars(trim($_POST["labName"]));  
    $desc = htmlspecialchars(trim($_POST["desc"]));
    $link = htmlspecialchars(trim($_POST["link"]));

    $focusId = ''; // trap the first field that needs updating, better would be to save errors in an array
    
    if ($labName == '') {
      $errors .= '<li>Lab name may not be blank</li>';
      if ($focusId == '') $focusId = '#labName';
    }
    if ($desc == '') {
      $errors .= '<li>Last name may not be blank</li>';
      if ($focusId == '') $focusId = '#desc';
    }
    if ($link == '') {
      $errors .= '<li>Date of birth may not be blank</li>';
      if ($focusId == '') $focusId = '#link';
    }
  
    if ($errors != '') {
      echo '<div class="messages"><h4>Please correct the following errors:</h4><ul>';
      echo $errors;
      echo '</ul></div>';
      echo '<script type="text/javascript">';
      echo '  $(document).ready(function() {';
      echo '    $("' . $focusId . '").focus();';
      echo '  });';
      echo '</script>';
    } else { 
      if ($dbOk) {
        // Let's trim the input for inserting into mysql
        // Note that aside from trimming, we'll do no further escaping because we
        // use prepared statements to put these values in the database.
        $LNForDb = trim($_POST["labName"]);  
        $descForDb = trim($_POST["desc"]);
        $linkForDb = trim($_POST["link"]);
        
        // Setup a prepared statement. Alternately, we could write an insert statement - but 
        // *only* if we escape our data using addslashes() or (better) mysqli_real_escape_string().
        $insQuery = "insert into myprojects (`Name`,`Desc`,`Link`) values(?,?,?)";
        $statement = $db->prepare($insQuery);
        // bind our variables to the question marks
        $statement->bind_param("sss",$LNForDb,$descForDb,$linkForDb);
        // make it so:
        $statement->execute();
        
        // close the prepared statement obj 
        $statement->close();
      }
    } 
  }
?>

<h3>Add Lab</h3>
<form id="addForm" name="addForm" action="" method="post">
  <fieldset> 
    <div class="formData">
                    
      <label class="field" for="labName">Lab Name:</label>
      <div class="value"><input type="text" size="60" value="<?php if($havePost && $errors != '') { echo $labName; } ?>" name="labName" id="labName"/></div>
      
      <label class="field" for="desc">Description:</label>
      <div class="value"><input type="text" size="60" value="<?php if($havePost && $errors != '') { echo $desc; } ?>" name="desc" id="desc"/></div>
      
      <label class="field" for="link">Link:</label>
      <div class="value"><input type="text" size="60" value="<?php if($havePost && $errors != '') { echo $link; } ?>" name="link" id="link"/></div>
      
      <input type="submit" value="save" id="save" name="save"/>
    </div>
  </fieldset>
</form>

<h3>Labs</h3>
<table id="myprojects">
<?php
  if ($dbOk) {
    $query = 'select * from myprojects';
    $result = $db->query($query);
    $numRecords = $result->num_rows;
    
    echo '<tr><th>Lab Name:</th><th>Link:</th><th></th></tr>';
    for ($i=0; $i < $numRecords; $i++) {
      $record = $result->fetch_assoc();
      if ($i % 2 == 0) {
        echo "\n".'<tr id="Lab-' . $record['id'] . '"><td>';
      } else {
        echo "\n".'<tr class="odd" id="Lab-' . $record['id'] . '"><td>';
      }
      echo htmlspecialchars($record['Name']) . ', ';
      echo htmlspecialchars($record['Desc']);
      echo '</td><td>';
      echo "<a href = '" . htmlspecialchars($record['Link']). "'> Link </a>";
    }
    
    $result->free();
    
    // Finally, let's close the database
    $db->close();
  }
  
?>
</table>

<?php include('includes/foot.inc.php'); 
  // footer info and closing tags
?>
