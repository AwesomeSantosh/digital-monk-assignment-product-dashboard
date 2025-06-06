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
// Include your database connection file here
require_once 'db.php';

if (isset($_GET['id'])) {
    $projectId = $_GET['id'];
    
    // Fetch project details from the database
    $query = "SELECT p.project_id, p.title, p.description, p.main_image_path, GROUP_CONCAT(t.tag_name SEPARATOR ', ') AS tags 
              FROM projects p 
              LEFT JOIN project_tags pt ON p.project_id = pt.project_id 
              LEFT JOIN tags t ON pt.tag_id = t.tag_id 
              WHERE p.project_id = ?";
    
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

// Fetch secondary images for the project
$imageQuery = "SELECT `image_id`, `image_path` FROM `images` WHERE `project_id` = ?";
$imageStmt = $conn->prepare($imageQuery);
$imageStmt->bind_param("i", $projectId);
$imageStmt->execute();
$imageResult = $imageStmt->get_result();
$secondaryImages = $imageResult->fetch_all(MYSQLI_ASSOC);

// Close the statement
$imageStmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Project</title>
<!-- Include Bootstrap CSS CDN -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* CSS for setting image dimensions */
    .main-image {
        width: 300px; /* Set the desired width for the main image */
        height: auto; /* Maintain aspect ratio */
    }
    .secondary-image {
        width: 150px; /* Set the desired width for each secondary image */
        height: auto; /* Maintain aspect ratio */
        margin-bottom: 10px; /* Add some margin between images */
    }
</style>
</head>
<body>

<div class="container mt-5">
    <h2>Edit Project</h2>
    <form  id="editProjectForm" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($project['description']); ?></textarea>
        </div>
           <!-- Tags Display (comma-separated) -->
          <div class="form-group">
               <label for="tags">Tags </label>
               

               <input type="text" class="form-control" id="tags" name="tags"  placeholder="Enter tags separated by commas">
               </div>
        <div class="form-group">
            <label for="main_image">Main Image:</label>
            <input type="file" class="form-control-file" id="main_image" name="main_image">
            <img src="<?php echo htmlspecialchars($project['main_image_path']); ?>" alt="Main Image" class="img-fluid main-image mt-2">
        </div>
        <div class="form-group">
            <label for="secondary_images">Secondary Images:</label>
            <div class="row">
                <?php foreach ($secondaryImages as $image): ?>
                    <div class="col-md-3 mb-3">
                        <img src="<?php echo htmlspecialchars($image['image_path']); ?>" alt="Secondary Image" class="img-fluid secondary-image">
                    </div>
                <?php endforeach; ?>
            </div>
            <input type="file" class="form-control-file" id="secondary_images" name="secondary_images[]" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
         <button type="button" class="btn btn-secondary" onclick="location.href='view_projects.php'">Cancel</button>
        <input type="hidden" name="project_id" value="<?php echo $projectId; ?>">
    </form>
    <div id="responseMessage"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#editProjectForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = new FormData(this);

        $.ajax({
            url: 'update_project.php', // URL to the PHP script that handles form submission
            type: 'POST',
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming the data into a query string
            contentType: false, // The content type used when sending data to the server
            beforeSend: function() {
                // You can add a loading spinner or disable the form elements here
            },
            success: function(response) {
                // Handle the successful response from update_project.php
                if (response.success) {
                    // Display a success message, refresh the page, or redirect the user
                    alert('Project updated successfully!');
                    location.href = 'view_projects.php';
                } else {
                    // Handle any errors or display error messages
                    alert('Failed to update project. Please try again.');
                }
            },
            error: function() {
                // Handle any errors that occur during the AJAX request
                console.log()
                alert('An error occurred while updating the project.');
            },
            complete: function() {
                // You can re-enable form elements or hide loading spinners here
            }
        });
    });
});
</script>

   <!--  <script>
    $(document).ready(function() {
        $('#editProjectForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: 'update_project.php', // Your PHP script to handle form submission
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#responseMessage').html('<div class="alert alert-success">Project updated successfully!</div>');
                    setTimeout(function() {
                        window.location.href = 'view_projects.php'; // Redirect to project_views.php after 2 seconds
                    }, 2000);
                },
                error: function() {
                    $('#responseMessage').html('<div class="alert alert-danger">Failed to update project. Please try again.</div>');
                }
            });
        });
    });
    </script> -->
<!-- Include Bootstrap JS and Popper.js CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>