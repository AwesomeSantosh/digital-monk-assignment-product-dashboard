<?php
header('Content-Type: application/json');

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
require_once 'db.php'; // Ensure this file is correctly set up for database connection

$response = []; // Initialize an empty array for the response data

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch form data
    $projectId = $_POST['projectId'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tags = explode(',', $_POST['tags']);
    $mainImage = $_FILES['main_image'];
    $secondaryImages = $_FILES['secondary_images'];

    // Update main image path if provided
    if ($mainImage['size'] > 0) {
        $mainImagePath = 'gallery/' . basename($mainImage['name']);
        if (move_uploaded_file($mainImage['tmp_name'], $mainImagePath)) {
            $updateMainImageSql = "UPDATE projects SET title = ?, description = ?, main_image_path = ? WHERE project_id = ?";
            $stmt = $conn->prepare($updateMainImageSql);
            $stmt->bind_param('sssi', $title, $description, $mainImagePath, $projectId);
            if (!$stmt->execute()) {
                $response['error'] = 'Main image update error: ' . mysqli_error($conn);
            }
        } else {
            $response['error'] = 'Main image upload failed.';
        }
    }

    // Insert secondary images if provided
    foreach ($secondaryImages['tmp_name'] as $index => $tmpName) {
        $secondaryImagePath = 'gallery/' . basename($secondaryImages['name'][$index]);
        if (move_uploaded_file($tmpName, $secondaryImagePath)) {
            $insertSecondaryImageSql = "INSERT INTO images (project_id, image_path) VALUES (?, ?)";
            $stmt = $conn->prepare($insertSecondaryImageSql);
            $stmt->bind_param('is', $projectId, $secondaryImagePath);
            if (!$stmt->execute()) {
                $response['error'] = 'Secondary image insert error: ' . mysqli_error($conn);
            }
        } else {
            $response['error'] = 'Secondary image upload failed.';
        }
    }

    // Insert or update tags
    foreach ($tags as $tagName) {
        $query = "INSERT INTO tags (tag_name) VALUES (?) ON DUPLICATE KEY UPDATE tag_name = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $tagName, $tagName);
        if (!$stmt->execute()) {
            $response['error'] = 'Tag insert/update error: ' . mysqli_error($conn);
        } else {
            $tagId = $stmt->insert_id;
            $query = "INSERT INTO project_tags (project_id, tag_id) VALUES (?, ?) ON DUPLICATE KEY UPDATE project_id = VALUES(project_id), tag_id = VALUES(tag_id)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ii', $projectId, $tagId);
            if (!$stmt->execute()) {
                $response['error'] = 'Project-Tag association error: ' . mysqli_error($conn);
            }
        }
    }

    if (!isset($response['error'])) {
        $response['success'] = true;
        $response['message'] = 'Project updated successfully!';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
