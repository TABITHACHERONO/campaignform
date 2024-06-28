<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$name = isset($_POST["name"]) ? trim($_POST["name"]) : null;
$email = isset($_POST["email"]) ? trim($_POST["email"]) : null; 
$feedback = isset($_POST["feedback"]) ? trim($_POST["feedback"]) : null;
$rating = isset($_POST["rating"]) ? (int)$_POST["rating"] : null;


if (empty($name) || empty($email) || empty($feedback) || $rating === null) {
  die("All fields are required.");
}


$sql = "INSERT INTO feedback (name, email, feedback, rating) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);


if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}


$stmt->bind_param("sssi", $name, $email, $feedback, $rating);


if ($stmt->execute()) {
  echo "Thank you for your feedback!";
} else {
  echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();

?>