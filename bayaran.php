<?php
// Define the return date from your data
$returnDate = "2024-11-04"; // Example return date from the database

// Get the current date
$currentDate = date("Y-m-d");

// Calculate the difference in days
$dateDifference = (strtotime($currentDate) - strtotime($returnDate)) / (60 * 60 * 24);

// If the difference is greater than 2 days, redirect to fine page
if ($dateDifference > 2) {
    header("Location: denda.php");
    exit();
}
?>