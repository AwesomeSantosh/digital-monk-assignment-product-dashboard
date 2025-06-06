<?php

include_once('db.php');

$search = isset($_POST['search']) ? trim($_POST['search']) : '';
$tag = isset($_POST['tag']) ? trim($_POST['tag']) : '';
$sortBy = isset($_POST['sortBy']) ? trim($_POST['sortBy']) : 'latest';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Base Query
$query = "SELECT p.project_id, p.title, p.description, p.main_image_path,
                 GROUP_CONCAT(t.tag_name SEPARATOR ', ') AS tags
          FROM projects p
          LEFT JOIN project_tags pt ON p.project_id = pt.project_id
          LEFT JOIN tags t ON pt.tag_id = t.tag_id
          WHERE 1";

// Add search filter
if (!empty($search)) {
    $searchEscaped = mysqli_real_escape_string($conn, $search);
    $query .= " AND p.title LIKE '%$searchEscaped%'";
}

// Add tag filter (from tag buttons or dropdown)
if (!empty($tag)) {
    $tagEscaped = mysqli_real_escape_string($conn, $tag);
    $query .= " AND t.tag_name = '$tagEscaped'";
}

// Add filter from sortBy dropdown, assuming it's filtering by tag (not sorting)
$predefinedTags = [
    'Good Health', 'Love & Relationship', 'Black Magic & Evil Eye', 'Children', 'Festive'
];
if (in_array($sortBy, $predefinedTags)) {
    $sortEscaped = mysqli_real_escape_string($conn, $sortBy);
    $query .= " AND t.tag_name = '$sortEscaped'";
}

// Group and paginate
$query .= " GROUP BY p.project_id ORDER BY p.created_at DESC LIMIT $offset, $limit";

// Run and fetch
$result = mysqli_query($conn, $query);

$projects = [];

/*while ($row = mysqli_fetch_assoc($result)) {
    $projects[] = $row;
}*/

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $projects[] = $row;
    }
} else {
    // Debug the SQL error
    echo json_encode(['error' => mysqli_error($conn), 'query' => $query]);
    exit;
}
echo json_encode($projects);
?>
