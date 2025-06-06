<?php
session_start();

// Redirect to login if the user is not authenticated
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>
<?php
// Database connection
require_once 'db.php';

if (isset($_GET['id'])) {
    $projectId = $_GET['id'];
    
    // Fetch project details from the database
    $query = "SELECT * FROM projects WHERE project_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $result = $stmt->get_result();
    $project = $result->fetch_assoc();
    
    // Close the statement
    $stmt->close();
} else {
    // Redirect to the projects list page if project ID is not provided
    header("Location: view_projects.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Single Project</title>
<!-- Bootstrap CSS CDN -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <img src="<?php echo htmlspecialchars($project['main_image_path']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($project['title']); ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($project['title']); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($project['description']); ?></p>
            <!-- Add other project details and buttons as needed -->
        </div>
        <div class="card-footer">
            <a href="edit_project.php?id=<?php echo $projectId; ?>" class="btn btn-warning">Edit</a>
            <a href="delete_project.php?id=<?php echo $projectId; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
            <a href="view_projects.php" class="btn btn-secondary">Back to Projects</a>
        </div>
    </div>
</div>

<!-- Optional Bootstrap JS and jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
