<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h2>Feedback</h2>";
  echo "<table>";
    echo "<tr><th>Name</th><th>Email</th><th>Feedback</th><th>Rating</th><th>Submitted</th></tr>";
    while($row = $result->fetch_assoc()) {
       
      echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["feedback"] . "</td><td>" . $row["rating"] . "</td><td>" . $row["submission_ date"] . "</td></tr>";
    }
  echo "</table>";
} else {
  echo "No feedback found.";
}

$conn->close();

?>