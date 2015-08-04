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

  $id = $_GET['id'];
  if(isset($_POST['update']))
  {
    $put_up = mysqli_real_escape_string($link, $_POST['put_up']);
    $take_down = mysqli_real_escape_string($link, $_POST['take_down']);
    $subject = mysqli_real_escape_string($link, $_POST['subject']);
    $information = mysqli_real_escape_string($link, $_POST['information']);
    $sql = "UPDATE news SET put_up ='$put_up', take_down ='$take_down', subject ='$subject', information ='$information' WHERE id=$id";
    $result = $link->query($sql);

    if($result)
    {
    $msg="Successfully Updated!!";
    }
  }

  $sql = "SELECT * FROM news WHERE id = {$id}";
  $result = $link->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      $row = $result -> fetch_assoc();
      $put_up = $row["put_up"];
      $take_down = $row["take_down"];
      $subject = $row["subject"];
      $information = $row["information"];
  }
  else {
      echo "0 results";
  }
?>

<form action="#" method="post">
	<p>
    	<label for="put_up">Start (YYYY-MM-DD HH:MM:SS)</label>
        <input type="datetime" name="put_up" id="put_up" value="<?php echo $put_up; ?>">
  </p>
    <p>
    	<label for="take_down">END (YYYY-MM-DD HH:MM:SS)</label>
        <input type="datetime" name="take_down" id="take_down" value="<?php echo $take_down; ?>">
    </p>
    <p>
    	<label for="subject">Subject (<140 characters)</label>
        <input type="text" name="subject" id="subject" value="<?php echo $subject; ?>">
    </p>
    <p>
    	<label for="information">Message</label>
        <input type="text" name="information" id="information" value="<?php echo $information; ?>">
    </p>
    <input type="submit" name="update" id="update" value="Update Record">
</form>
<?php
mysqli_close($link);
?>
