<?php
header('Content-Type: application/json');

// Database connection
require_once 'db.php';

$response = []; // Initialize an empty array for the response data

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tags = explode(',', $_POST['tags']);
    $mainImage = $_FILES['main_image'];
    $secondaryImages = $_FILES['secondary_images'];

    // Handle image uploads and database insertion
     // Save main image to 'gallery' folder and get path
    $mainImagePath = 'gallery/' . basename($mainImage['name']);
    move_uploaded_file($mainImage['tmp_name'], $mainImagePath);

    // Insert project data into 'projects' table
    $query = "INSERT INTO projects (title, description, main_image_path) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $title, $description, $mainImagePath);
    $stmt->execute();
    $projectId = $stmt->insert_id; // Get the last inserted ID

    // Handle secondary images
    foreach ($secondaryImages['tmp_name'] as $index => $tmpName) {
        $secondaryImagePath = 'gallery/' . basename($secondaryImages['name'][$index]);
        move_uploaded_file($tmpName, $secondaryImagePath);

        // Insert secondary images into 'images' table
        $query = "INSERT INTO images (project_id, image_path) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('is', $projectId, $secondaryImagePath);
        $stmt->execute();
    }

    // Insert tags into 'tags' table and associate with the project in 'project_tags' table
    foreach ($tags as $tagName) {
        $query = "INSERT INTO tags (tag_name) VALUES (?) ON DUPLICATE KEY UPDATE tag_name = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $tagName, $tagName);
        $stmt->execute();
        $tagId = $stmt->insert_id;

        // Associate project with tags in 'project_tags' table
        $query = "INSERT INTO project_tags (project_id, tag_id) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ii', $projectId, $tagId);
        $stmt->execute();
    }
    

    // Check if project and tags insertion was successful
    if ($projectId) {
        $response['success'] = true;
        $response['message'] = 'Project created successfully!';
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to create project. Please try again.';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
