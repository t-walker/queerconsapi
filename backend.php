<?php
//--------------------------------------------------------------------------
// Example php script for fetching data from mysql database
//--------------------------------------------------------------------------
$host = "localhost"; //JASON CHANGE
$user = "root"; //JASON CHANGE
$pass = "password"; //JASON CHANGE

$databaseName = "queercon"; //JASON CHANGE queercon -> database name
$tableName = "news";

//--------------------------------------------------------------------------
// 1) Connect to mysql database
//--------------------------------------------------------------------------
$con = mysql_connect($host,$user,$pass);
$dbs = mysql_select_db($databaseName, $con);

//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------
$result = mysql_query("SELECT * FROM $tableName where put_up < NOW() and NOW() < take_down");          //query
$jsonData = array();
while ($array = mysql_fetch_row($result)) {
    $jsonData[] = $array;
}

$data = $jsonData;
header('Content-Type: application/json');
echo json_encode($data);
mysqli_close($link);
?>
