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
  $sql = "DELETE FROM news WHERE id = {$id}";
  $result = $link->query($sql);
  echo "Deleted Post {$id}!";

  header("Location: admin.php");
  mysqli_close($link);
?>
