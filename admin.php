

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Records Form</title>
</head>
<body>
  <h1>Create Post</h1>
<form action="#" method="post">
	<p>
    	<label for="put_up">Starting Point</label>
        <input type="datetime" name="put_up" id="put_up">
    </p>
    <p>
    	<label for="take_down">Ending Point</label>
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
    <input type="submit" value="Add Records">
</form>
</body>
</html>

<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect("localhost", "root", "", "queercon"); //JASON CHANGE queercon -> database name

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$put_up = mysqli_real_escape_string($link, $_POST['put_up']);
$take_down = mysqli_real_escape_string($link, $_POST['take_down']);
$subject = mysqli_real_escape_string($link, $_POST['subject']);
$information = mysqli_real_escape_string($link, $_POST['information']);

// attempt insert query execution
$sql = "INSERT INTO news (put_up, take_down, subject, information) VALUES ('$put_up', '$take_down', '$subject' , '$information')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
