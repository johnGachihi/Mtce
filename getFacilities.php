<?php
include './connect.inc.php';

if(isset($_GET["section_id"])) {
    $section_id = $_GET["section_id"];

    $sql = "SELECT facility_id, facility_name
                FROM facilities
            WHERE section_id = $section_id
            ORDER BY facility_name;";
    
    $result = $conn->query($sql);

    $rows = [];
    while($r = $result->fetch_assoc()) {
        $rows[] = $r;
    }

    $response["error"] = false;
    $response["facilities"] = $rows;
} else {
    $response["error"] = true;
    $response["error_message"] = "Missing parameter";
}

echo json_encode($response);

?>