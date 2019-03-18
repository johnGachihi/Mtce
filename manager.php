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
                <li class="nav-item">
                    <a class="nav-link" href="manager2.php">Manager 2</a>
                </li>
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

        <h1 class="mt-4 h5">Assign Tasks</h1>
        
        <div class="accordion" id="accordionExample">

            <!-- <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                </div>
            </div> -->

            <!-- <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between w-75">
                                <h5>John Gachihi</h5>
                                <a class="mx-5" href="nana">Assign task</a>
                                <span>Pending Tasks: <span class="badge badge-primary"> 3</span></span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between w-75">
                                <h5>Peter Munya</h5>
                                <a class="mx-5" href="nana">Assign task</a>
                                <span>Pending Tasks: <span class="badge badge-primary"> 3</span></span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between w-75">
                                <h5>Charles Kamau Okemwa</h5>
                                <a class="mx-5" href="nana">Assign task</a>
                                <span>Pending Tasks: <span class="badge badge-primary"> 3</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <?php
                include "getStaff.php";

                foreach ($rows as $section => $staff) {
                    echo "
                        <div class='card'>
                            <div class='card-header' id='sec$section'>
                                <h5 class='mb-0 h5'>
                                    <button class='btn btn-link' type='button' data-toggle='collapse' data-target='#collapse$section' aria-expanded='true' aria-controls='collapse$section'>
                                        $section
                                    </button>
                                </h5>
                            </div>
                            <div id='collapse$section' class='collapse' aria-labelledby='sec$section' data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <div class='list-group list-group-flush'>";

                                    foreach ($staff as $staff_member) {
                                        echo "
                                            <div class='list-group-item d-flex justify-content-between w-75'>
                                                <h5 class='list-cell'>$staff_member</h5>
                                                <a class='mx-5 list-cell' href='#'>Assign task</a>
                                                <span class='list-cell'>Pending Tasks: <span class='badge badge-primary'> 3</span></span>
                                            </div>
                                        ";
                                    }

                    echo           "</div>
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>

        </div>

    </div>

    <script>

        // getEmployees().then(employees => {
        //     emplaceEmployees(employees);
        // })

        function getEmployees() {
            return fetch("getStaff.php")
                .then(response => {
                    return data2Array(response);
                });
        }

        async function data2Array(data) {
            const dataInJson = await data.json();
            return Object.entries(dataInJson);
        }

        function emplaceEmployees(staff) {
            for(let s of staff) {
                document.write(s[0] + "\n");
                document.write("\n");
                for(let s_name of s[1]) {
                    document.write(s_name + "\n");
                }
            }
        }
    </script>
</body>
</html>