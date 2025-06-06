<?php
session_start();

// Redirect to login if the user is not authenticated
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<?php
// Include your database connection file
include 'db.php';  // Make sure to adjust the filename based on your setup

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $projectId = $_GET['id'];

    // Start a transaction to ensure data consistency when deleting
    $conn->begin_transaction();

    try {
        // Delete images associated with the project
        $deleteImagesQuery = "DELETE FROM images WHERE project_id = ?";
        $deleteImagesStmt = $conn->prepare($deleteImagesQuery);
        $deleteImagesStmt->bind_param("i", $projectId);
        $deleteImagesStmt->execute();

        // Delete tags associated with the project from the association table
        $deleteProjectTagsQuery = "DELETE FROM project_tags WHERE project_id = ?";
        $deleteProjectTagsStmt = $conn->prepare($deleteProjectTagsQuery);
        $deleteProjectTagsStmt->bind_param("i", $projectId);
        $deleteProjectTagsStmt->execute();

        // Delete the project itself
        $deleteProjectQuery = "DELETE FROM projects WHERE project_id = ?";
        $deleteProjectStmt = $conn->prepare($deleteProjectQuery);
        $deleteProjectStmt->bind_param("i", $projectId);

        if ($deleteProjectStmt->execute()) {
            // Commit the transaction if all queries are successful
            $conn->commit();

            // Redirect back to the dashboard or any other page after successful deletion
            header('Location: view_projects.php');
            exit();
        } else {
            // Rollback the transaction in case of any error
            $conn->rollback();

            // Handle any errors, maybe redirect back with an error message
            header('Location: view_projects.php?error=delete_failed');
            exit();
        }
    } catch (Exception $e) {
        // Rollback the transaction and handle exceptions
        $conn->rollback();
        
        // Redirect back with an error message
        header('Location: view_projects.php?error=delete_error');
        exit();
    }
} else {
    // Redirect back to the dashboard with an error message if project ID is not provided or invalid
    header('Location: dashboard.php?error=invalid_id');
    exit();
}
?>


