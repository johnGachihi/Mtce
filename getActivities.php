<?php
include './connect.inc.php';

$sql = "SELECT * FROM activities";

if ($result = $conn->query($sql)) {
    $rows = [];
    while($r = $result->fetch_assoc()) {
        $rows[] = $r;
    }

    $response["error"] = false;
    $response["activities"] = $rows;
} else {
    $response["error"] = true;
    $response["error_message"] = $conn->error;
}

echo json_encode($response);

?>