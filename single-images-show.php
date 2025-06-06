<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Single Project Gallery</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add any additional styles if needed */
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Single Project Gallery</h2>
    <!-- Carousel Container -->
    <?php
    // Include database connection
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'db.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $projectId = 2;

    $imageQuery = "SELECT `image_path` FROM `images` WHERE `project_id` = ?";
    $imageStmt = $conn->prepare($imageQuery);
    $imageStmt->bind_param("i", $projectId);
    $imageStmt->execute();
    $imageResult = $imageStmt->get_result();

    $imagePaths = [];
    while ($row = $imageResult->fetch_assoc()) {
        $imagePaths[] = $row['image_path'];
    }

    // Close the database connection
    $conn->close();
    ?>

    <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <ol class="carousel-indicators">
            <?php
            foreach ($imagePaths as $index => $path) {
                $activeClass = ($index === 0) ? 'active' : '';
                echo "<li data-bs-target='#projectCarousel' data-bs-slide-to='$index' class='$activeClass'></li>";
            }
            ?>
        </ol>

        <!-- Carousel Images -->
        <div class="carousel-inner">
            <?php
            foreach ($imagePaths as $index => $path) {
                $activeClass = ($index === 0) ? 'active' : '';
                echo "
                    <div class='carousel-item $activeClass'>
                        <img src='$path' class='d-block w-100' alt='Project Image'>
                    </div>
                ";
            }
            ?>
        </div>

        <!-- Carousel Controls -->
        <a class="carousel-control-prev" href="#projectCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#projectCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
