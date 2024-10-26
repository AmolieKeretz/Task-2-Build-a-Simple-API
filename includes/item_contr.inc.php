<?php

function is_input_empty(string $title, string $dsc, string $duration){
    if (empty($title) || empty($dsc) || empty($duration)) {
        return true;
    }else {
        return false;
    }
}
function is_course_exits(object $pdo, string $title){
    if (get_title($pdo, $title)) {
        return true;
    }else {
        return false;
    }
}
function add_course_data(object $pdo, string $title, string $dsc, string $duration){
    set_course($pdo, $title, $dsc, $duration);
}
// function retrive_all_course(object $pdo){
//     getAllCourses($pdo);
// }