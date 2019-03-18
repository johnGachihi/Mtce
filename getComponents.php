<?php
include './connect.inc.php';

if (isset($_GET["facility"])){
    $facility_id = $_GET["facility"];

    $sql = "select * from components where facility_id=$facility_id;";
    $result = $conn->query($sql);

    $rows = [];
    while($r = $result->fetch_assoc()) {
        $rows[] = $r;
    }
    
    echo json_encode($rows);

} else {
    echo "Missing parameter";
}

?>

