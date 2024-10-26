<?php
session_start();
ob_start(); // Start output buffering
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $dsc = $_POST["dsc"];
    $duration = $_POST["duration"];

    try {
        require_once "dbh.inc.php";
        require_once "item_model.inc.php";
        require_once "item_contr.inc.php";

        $error = [];

        if (is_input_empty($title, $dsc, $duration)) {
            $error["empty_input"] = 'Fill in all fields!';
        }

        if (is_course_exits($pdo, $title)) {
            $error["title_exit"] = 'Course already exists';
        }

        if ($error) {
            $_SESSION["error_course"] = $error; // Store the errors in the session
            header("Location: ../index.php");
            die(); // Stop further execution
        }

        // No errors
        add_course_data($pdo, $title, $dsc, $duration);
        header("Location: ../index.php");
        die(); // Ensure the script stops here

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}

ob_end_flush();
