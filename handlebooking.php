<?php
include ('server.php');
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$roomtype = $_POST['roomtype'];



// Prepare and execute the SQL query
$sql = "INSERT INTO bookings (name, email, checkin, checkout, roomtype) VALUES (?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $checkin, $checkout, $roomtype);
$stmt->execute();
// Close the statement and database connection
$stmt->close();
$con->close();

// Redirect to a success page

header("Location: booking.php");
exit();
?>
