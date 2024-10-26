<?php
session_start();
require_once 'includes/dbh.inc.php';
require_once 'includes/item_model.inc.php';
require_once 'includes/item_contr.inc.php';

// Check if an ID is provided
if (isset($_GET['Id'])) {
    $courseId = $_GET['Id'];
    $course = getCourseById($pdo, $courseId); // You need to implement this function
} else {
    header("Location: index.php"); // Redirect if no ID is provided
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3>Update Course</h3>
        <form action="includes/update.inc.php" method="post">
            <input type="hidden" name="Id" value="<?php echo htmlspecialchars($course['Id']); ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($course['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="dsc" class="form-label">Description:</label>
                <input type="text" class="form-control" name="dsc" value="<?php echo htmlspecialchars($course['dsc']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration:</label>
                <input type="text" class="form-control" name="duration" value="<?php echo htmlspecialchars($course['duration']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Course</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
