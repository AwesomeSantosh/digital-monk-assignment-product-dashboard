<?php
ini_set('display_errors', 1);

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