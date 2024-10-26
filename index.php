<?php
session_start();
require_once 'includes/item_contr.inc.php';
require_once 'includes/view_courses.inc.php';
require_once "includes/dbh.inc.php";
require_once "includes/item_model.inc.php";
$courses = getAllCourses($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <form action="includes/check.inc.php" method="post">
        <div class="container p-3 mb-2 text-dark">
            <div class="add_Item">
                <h3 class="mt-3 fs-2 fw-bold text-decoration-underline">Add Item</h3>
                <div class="border border-secondary p-3">
                    <label for="title" class="form-label fw-bold">Title: </label>
                    <input type="text" placeholder="Title" class="title p-1 fs-5 border border-success rounded" name="title" required>
                    <label for="dsc" class="form-label fw-bold">Description: </label>
                    <input type="text" placeholder="Description" class="dsc p-1 fs-5 border border-success rounded" name="dsc" required>
                    <label for="duration" class="form-label fw-bold">Duration: </label>
                    <input type="text" placeholder="(eg.. 1,2)" class="duration p-1 fs-5 border border-success rounded" name="duration" required>
                    <button class="btn btn-primary ms-5">Submit</button>
                </div>

            </div><br><br>
            <div class="container mt-4">
                <h3 class="mt-5 fs-2 fw-bold text-decoration-underline">Course view</h3>
                <table class="table table-bordered border border-dark">
                    <thead>
                        <tr class="course-head">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Action</th> <!-- Add Action Column -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($courses)): ?>
                            <?php foreach ($courses as $course): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($course['Id']); ?></td>
                                    <td><?php echo htmlspecialchars($course['title']); ?></td>
                                    <td><?php echo htmlspecialchars($course['dsc']); ?></td>
                                    <td><?php echo htmlspecialchars($course['duration']); ?></td>
                                    <td>
                                        <a href="update.php?Id=<?php echo htmlspecialchars($course['Id']); ?>" class="btn btn-warning mb-2 text-white">Update</a>
                                        <a href="includes/delete.inc.php?Id=<?php echo htmlspecialchars($course['Id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No courses found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <?php 
        check_errors();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../script/script.js"></script>
</body>
</html>
