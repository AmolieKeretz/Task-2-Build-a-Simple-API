<?php 

function get_title(object $pdo, string $title){
    $query = "SELECT title FROM course where title = :title;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function set_course(object $pdo, string $title, string $dsc, string $duration){
    $query = "INSERT INTO course (title, dsc, duration) VALUES (:title, :dsc, :duration)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":dsc", $dsc);
    $stmt->bindParam(":duration", $duration);
    
    $stmt->execute();
    header("Location: ../index.php");
    die();
}
function getAllCourses(object $pdo){
    $query = "SELECT * FROM course";

    $stmt = $pdo->query($query);
    $courses = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $courses[] = $row;
    }
    return $courses;
}
//update
function getCourseById($pdo, $Id) {
    $stmt = $pdo->prepare("SELECT * FROM course WHERE Id = ?");
    $stmt->execute([$Id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function update_course_data($pdo, $id, $title, $dsc, $duration) {
    $stmt = $pdo->prepare("UPDATE course SET title = ?, dsc = ?, duration = ? WHERE Id = ?");
    $stmt->execute([$title, $dsc, $duration, $id]);
}
//delete
function delete_course($pdo, $Id) {
    $stmt = $pdo->prepare("DELETE FROM course WHERE Id = ?");
    $stmt->execute([$Id]);
}
