<?php
session_start();
require_once "dbh.inc.php";
require_once "item_model.inc.php";

if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];

    // Call the function to delete the course
    delete_course($pdo, $Id); // You need to implement this function

    // Set a success message
    $_SESSION["success"] = "Course deleted successfully!";
    header("Location: ../index.php");
    exit();
} else {
    // If no ID is provided, redirect to index
    $_SESSION["error"] = "Invalid course ID.";
    header("Location: ../index.php");
    exit();
}
