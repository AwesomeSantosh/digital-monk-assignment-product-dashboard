<?php

session_start();

require_once 'db.php';

// Redirect to login if the user is not authenticated

if (isset($_SESSION['username'])) {

    header("Location: view_projects.php");

    exit();

}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];

    $password = $_POST['password'];



    if (empty($username) || empty($password)) {

        $error = "Username and password are required.";

    } else {

        $stmt = $conn->prepare("SELECT username, hashed_password FROM admin_login WHERE username = ?");

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        $user = $result->fetch_assoc();



        if ($user && password_verify($password, $user['hashed_password'])) {

            $_SESSION['username'] = $username;

           // header("Location: dashboard.php");

            header("Location: view_projects.php");

            exit();

        } else {

            $error = "Invalid username or password.";

        }

        $stmt->close();

    }

}

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Page</title>

    <!-- Include Bootstrap CSS from a CDN -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">Digital Monk Product Dashboard</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

            <ul class="navbar-nav">

              

                

                <li class="nav-item">

                    <a href="index.php" target="_blank" class="btn btn-success">See Products</a> </li>

             <!--    <li class="nav-item">

                    <a href="view_projects.php" target="_blank">Dashboard</a> </li>

                <li class="nav-item">

                    <a href="create-new-project.php" target="_blank" class="btn btn-primary">Add New Project</a> </li> -->

            </ul>

        </div>

    </div>

</nav>

    <div class="container mt-5">

        <div class="col-md-6 offset-md-3">

            <h2 class="text-center mb-4">Login</h2>

            

            <?php if (isset($error)): ?>

                <div class="alert alert-danger"><?php echo $error; ?></div>

            <?php endif; ?>



            <form method="post" autocomplete="off">

                <div class="form-group">

                    <label for="username">Username:</label>

                    <input type="text" id="username" name="username" class="form-control" required>

                </div>



                <div class="form-group">

                    <label for="password">Password:</label>

                    <input type="password" id="password" name="password" class="form-control" autocomplete="off" required>

                </div>



                <button type="submit" class="btn btn-primary btn-block">Login</button>

            </form>

        </div>

    </div>



    <!-- Include Bootstrap JS and Popper.js from a CDN -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

