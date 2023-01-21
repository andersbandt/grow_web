<!DOCTYPE html>
<html><body>
<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "hidden_hydroponics";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "Hockeyball123!";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, sensor_id, epoch, value FROM readings ORDER BY id DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>Sensor ID</td> 
        <td>Epoch</td> 
        <td>Value</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_1= $row["id"];
        $row_2 = $row["sensor_id"];

	// get epoch time
	$epoch = $row["epoch"];
	$row_3 = date("Y-m-d H:i:s", $epoch);

        $row_4 = $row["value"];

        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
        echo '<tr> 
                <td>' . $row_1 . '</td> 
                <td>' . $row_2 . '</td> 
                <td>' . $row_3 . '</td> 
                <td>' . $row_4 . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>
