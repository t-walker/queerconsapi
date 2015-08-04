<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect("localhost", "root", "password", "queercon"); //JASON CHANGE queercon -> database name

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$put_up = mysqli_real_escape_string($link, $_POST['put_up']);
$take_down = mysqli_real_escape_string($link, $_POST['take_down']);
$subject = mysqli_real_escape_string($link, $_POST['subject']);
$information = mysqli_real_escape_string($link, $_POST['information']);

// Use submit button to enter values.
if(isset($_POST['submit']))
{
  $sql = "INSERT INTO news (put_up, take_down, subject, information) VALUES ('$put_up', '$take_down', '$subject' , '$information')";
  if(mysqli_query($link, $sql)){
      echo "Records added successfully.";
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}

function list_posts($link) {
  $sql = "SELECT * FROM news";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<b>START:</b> " . $row["put_up"]. " - <b>END:</b> " . $row["take_down"] . " <b>SUBJECT:</b> " . $row["subject"]. " <b>INFORMATION:</b> " . $row["information"]. "<a href=\"edit.php?id={$row['id']}\">Edit</a> "."<a method=\"post\" href=\"delete.php?id={$row['id']}\">Delete</a> "."<br>";
      }
  } else {
      echo "0 results";
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Records Form</title>
</head>
<body>
<!-- CREATE -->
<h1>Create Post</h1>
<form action="#" method="post">
	<p>
    	<label for="put_up">Start (YYYY-MM-DD HH:MM:SS)</label>
        <input type="datetime" name="put_up" id="put_up">
    </p>
    <p>
    	<label for="take_down">END (YYYY-MM-DD HH:MM:SS)</label>
        <input type="datetime" name="take_down" id="take_down">
    </p>
    <p>
    	<label for="subject">Subject (<140 characters)</label>
        <input type="text" name="subject" id="subject">
    </p>
    <p>
    	<label for="information">Message</label>
        <input type="text" name="information" id="information">
    </p>
    <input type="submit" name="submit" id="submit" value="Add Records">
</form>

<!-- READ -->
<h1>Delete/Edit Posts</h1>
<?php

list_posts($link);

?>
<!-- UPDATE -->

<!-- DESTROY -->
</body>
</html>
<?php
mysqli_close($link);
?>
