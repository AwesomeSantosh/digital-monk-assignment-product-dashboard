

<?php

require_once 'check_login.php';



// Database connection

require_once 'db.php';



// Pagination configuration

$results_per_page = 6;



if (isset($_GET['page'])) {

    $page = $_GET['page'];

} else {

    $page = 1;

}



$start_from = ($page - 1) * $results_per_page;



// Sorting configuration

$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'created_at';

$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'ASC' : 'DESC';



// Fetch projects from the database with pagination

$query = "SELECT p.project_id, p.title, p.description, p.main_image_path, GROUP_CONCAT(t.tag_name SEPARATOR ', ') AS tags 

          FROM projects p 

          LEFT JOIN project_tags pt ON p.project_id = pt.project_id 

          LEFT JOIN tags t ON pt.tag_id = t.tag_id 

          GROUP BY p.project_id 

          ORDER BY $sort_by $order 

          /*ORDER BY p.created_at DESC */

          LIMIT $start_from, $results_per_page";



$result = mysqli_query($conn, $query);



// Count total number of projects

$total_query = "SELECT COUNT(*) as total FROM projects";

$total_result = mysqli_query($conn, $total_query);

$total_rows = mysqli_fetch_assoc($total_result)['total'];

$total_pages = ceil($total_rows / $results_per_page);



?>



<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Product Dashboard</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- new file -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<style type="text/css">

      .main-image {

        width: 300px; /* Set the desired width for the main image */

        height: auto; /* Maintain aspect ratio */

    }

</style>

</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">

            <a class="navbar-brand" href="#">Product Dashboard</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                <ul class="navbar-nav">

                    <!-- Add your other navigation links here -->

                    

                    <li class="nav-item">

                    <a href="product-grid.php" target="_blank" class="btn btn-primary">Product Grid View</a> </li>

                    <!-- Logout Button -->

                    <li class="nav-item">

                        <a class="nav-link" href="logout.php">

                            <button type="button" class="btn btn-danger">Logout</button>

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>



<div class="container mt-5">

    <h2 class="mb-4">Product List</h2>

    <div class="mb-3">

        <!-- <a href="create-new-project.html" target="_blank" class="btn btn-primary">Add New Project</a> -->

        <a href="create-new-project.php" target="_blank" class="btn btn-primary">Add New Prduct</a>

        <div class="float-right">

            <span class="mr-2">Sort by:</span>

            <a href="?sort=created_at&order=<?php echo $order == 'DESC' ? 'asc' : 'desc'; ?>" class="btn btn-link">Date</a>

            <!-- Add more sorting options as needed -->

        </div>

    </div>

    <div id="projects-list" class="row">

        <?php while ($row = mysqli_fetch_assoc($result)): ?>

            <div class="col-md-4 mb-4">

                <div class="card">

                    <img src="<?php echo htmlspecialchars($row['main_image_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="card-img-top main-image">

                    <div class="card-body">

                        <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>

                        <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>

                        <p><strong>Categories:</strong> <?php echo htmlspecialchars($row['tags']); 

                        //$project_id = $row['project_id'];

                        ?></p>

                         

                        <!-- <a href="single-project-edit-view.php?id=<?php echo $row['project_id']; ?>" class="btn btn-info mr-2">View</a> -->

                        <!-- <a href="single-project-edit-view.php?id=<?php echo $row['project_id']; ?>" class="btn btn-warning mr-2">Edit</a> -->

                        <!-- <a href="#" class="btn btn-danger">Delete</a> -->

                        <!-- <a href="delete_project.php?id=<?php echo $row['project_id']; ?>" class="btn btn-warning mr-2" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a> -->

                        <a href="delete_project.php?id=<?php echo $row['project_id']; ?>" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to delete this project?')">

                            <i class="fas fa-trash-alt"></i> Delete

                        </a>



                    </div>

                </div>

            </div>

        <?php endwhile; ?>

    </div>

    <!-- Pagination -->

    <ul class="pagination justify-content-center">

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>

            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">

                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>

            </li>

        <?php endfor; ?>

    </ul>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!--  new files * -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!--  new files # -->



</body>

</html>