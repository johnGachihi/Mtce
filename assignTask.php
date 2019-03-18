<?php
    session_start();
    if (!isset($_SESSION["id"])){
        // echo "zzz";
        header("location:index.php");
        exit();
    }
    include 'connect.inc.php';
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
        
        <h2 class="mt-3" style="text-align: center; color: #464545">Assign Task</h2>
        <div id="form-nav" class="mb-3">
            <button class="tab-navigation-btn mr-2 btn" onclick="previousTab();">
                <i class="fas fa-arrow-left" style="color: #007bff"></i>
            </button>
            <div class="progress mt-4" style="height: 5px;">
                <div id="progressBar" class="progress-bar" style="width: 100%; transition: all 0.4s" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <button class="tab-navigation-btn ml-2 btn" disabled>
                <i class="fas fa-arrow-right fa-1x" style="color: #007bff"></i>
            </button>
        </div>

        <!-- Sections -->
        <div class="tab d-none">
            <span style="display: block;">Choose section to which the task belongs</span>
            <div class="sections-tab">
                <?php 
                    $sql = "SELECT * FROM sections;";
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()) {
                        echo '<button class="btn btn-outline-secondary btn-options" onclick="onClick('. "'section'" .', '. $row["section_id"] .')">' . $row["section_name"] . '</button>' . "\n";
                    }
                ?>

            </div>
        </div>

        <div class="tab d-none">
            <span>Choose facility to be worked on</span>
            <div id="facilities" class="list-group"></div>
        </div>

        <div class="tab d-none">
            <span>Choose component to be worked on</span>
            <div id="components" class="list-group"></div>
        </div>

        <div class="tab d-none">
            <span>Choose activities to be performed:</span>
            <div id="activities"></div>

            <div>
                <label for="taskDescription" style="display: block;">Describe task:</label>
                <textarea id="taskDescription" class="w-100" onkeyup="handleChange();"></textarea>
            </div>
        </div>

        <div class="w-100 mt-4">
            <div style="float: right;">
                <button class="btn btn-primary" style="width:105px">
                    <i class="fas fa-arrow-left"></i>
                    Previous
                </button>
                <button id="btn-next" class="btn btn-primary" style="width:105px; display:none">
                    <i class="fas fa-arrow-right"></i>
                    Next
                </button>
            </div>
        </div>
    </div>

    <script>

        const SECTION_TAB = "section";
        const FACILITY_TAB = "facility";
        const COMPONENT_TAB = "component";

        var choices = [];

        const tabs = document.getElementsByClassName("tab");

        let currentTab = 0;
        showTab(currentTab);

        function showTab(tab) {
            tabs[tab].classList.remove("d-none");
            updateProgressBar();
        }

        function updateProgressBar() {
            const total = tabs.length;
            const progressBar = document.getElementById("progressBar");
            progressBar.style.width = (currentTab/total)*100 + "%";
        }

        function nextTab() {
            tabs[currentTab].classList.add("d-none");
            showTab(++currentTab);

            // updateProgressBar();
        }

        function previousTab() {
            tabs[currentTab].classList.add("d-none");
            showTab(--currentTab);
        }

        function onClick(tab, choice) {
            switch (tab) {
                case SECTION_TAB:
                    new SectionChoice(choice).handleChoice();
                    break;

                case FACILITY_TAB:
                    new FacilityChoice(choice).handleChoice();
                    break;
            
                case COMPONENT_TAB:
                    new ComponentChoice(choice).handleChoice();
                    break;
                    

                default:
                    break;
            }
            nextTab();
        }
    </script>
    <script src="choice.js"></script>
    <script src="activitiesAndDescriptionTab.js"></script>
</body>
</html>
