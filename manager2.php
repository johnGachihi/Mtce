<?php
    session_start();
    if (!isset($_SESSION["id"])){
        // echo "zzz";
        header("location:index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name=viewport content="width=device-width, initial-scale=1"> 
    <meta charset=utf-8">
    <title>Moi Airport</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="dependencies/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="dependencies/fontawesome-free-5.7.1-web/css/all.css">

    <script src="dependencies/jquery-3.3.1.min.js"></script>
    <script src="dependencies/popper.min.js"></script>
    <script src="dependencies/bootstrap.min.js"></script>
    <!-- <script src="dependencies/mdb.min.js"></script> -->
</head>
<body>
    <?php
        $staff_name = $_SESSION["staff_name"];
        $staff_id = $_SESSION["id"];
        $accesslevel = $_SESSION["accesslevel"];
        $section_id = $_SESSION["section_id"];
        // echo "<h1>".$_SESSION["staff_name"]."</h1><hr>";
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <span class="navbar-brand">Moi Airport Maintenance</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="manager2.php">Manager 2</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="changepassword.php">Change Password</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-4">
                <a class="btn btn-primary btn-lg my-2 sb-button" href="assignTask.php">
                    <div class="d-flex justify-content-start">
                        <i class="fas fa-tasks fa-2x mr-5"></i>
                        <span>Assign Task</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <button class="btn btn-primary btn-lg my-2 sb-button" disabled>
                    <div class="d-flex justify-content-start">
                        <i class="fas fa-clipboard-list fa-2x mr-5"></i>
                        <span>View Report</span>
                    </div>
                </button>
            </div>
            <div class="col-lg-4">
                <button class="btn btn-primary btn-lg my-2 sb-button" disabled>
                    <div class="d-flex justify-content-start">
                        <i class="fas fa-clipboard-list fa-2x mr-5"></i>
                        <span>View Report</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</body>