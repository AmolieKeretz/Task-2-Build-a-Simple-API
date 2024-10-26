<?php

function check_errors() {
    if (isset($_SESSION['error_course'])) {
        $errors = $_SESSION['error_course'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='messageView'>". $error ."</p>";
        }

        unset($_SESSION['error_course']);//delete session
    }
}