<?php
session_start();
require_once "dbh.inc.php";
require_once "item_model.inc.php";
require_once "item_contr.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["Id"];
    $title = $_POST["title"];
    $dsc = $_POST["dsc"];
    $duration = $_POST["duration"];

    // Validate input (you can add your validation logic here)
    if (empty($title) || empty($dsc) || empty($duration)) {
        $_SESSION["error"] = "All fields are required.";
        header("Location: ../index.php");
        exit();
    }

    // Update the course in the database
    update_course_data($pdo, $id, $title, $dsc, $duration); // You need to implement this function

    // Redirect to index.php with a success message
    $_SESSION["success"] = "Course updated successfully!";
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}
