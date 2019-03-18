<?php

//HANDLE CASE OF LACKING PARAMETER

$extra = "";

if(isset($_GET["rows"])) {
    if($_GET["rows"] == "last_row") {
        $extra = "AND task_reports.task_id IN (SELECT MAX(task_id) FROM task_reports)";
        // $extra = "LIMIT 1";
    } else {
        $extra = "";
    }
}

include "connect.inc.php";

$user_id = $_GET["userid"];
// $user_id = 2;

$sql = "SELECT
            task_reports.task_id, task_reports.date_inserted,
            facilities.facility_name, components.component_name AS component,
            activities.activity_name, task_reports.message
        FROM task_reports
        INNER JOIN components
            ON task_reports.component_id = components.component_id
        INNER JOIN facilities
            ON components.facility_id = facilities.facility_id
        INNER JOIN task_activity_mapper
            ON task_activity_mapper.task_id = task_reports.task_id
        INNER JOIN activities
            ON activities.activity_id = task_activity_mapper.activity_id
        
        WHERE task_reports.user_id = ". $user_id. " $extra AND DATE(task_reports.date_inserted) = CURDATE()
        ORDER BY task_reports.task_id ASC;";

$result = $conn->query($sql);

if(!$result) echo $conn->error;

$task_id = -1;
$rows = [];
$temp_row = [];

while($row = $result->fetch_assoc()) {
    if ($task_id != $row["task_id"]) {
        $task_id = $row["task_id"];
        if(!empty($temp_row)) {
            $rows[] = $temp_row;
            $temp_row = [];
        }

        $temp_row["date"] = (new DateTime($row["date_inserted"]))->format("d-m-Y H:i:s");
        $temp_row["facility"] = $row["facility_name"];
        $temp_row["component"] = $row["component"];
        $temp_row["activities"][] = $row["activity_name"];
        $temp_row["work_narration"] = $row["message"];
    } else {
        $temp_row["activities"][] = $row["activity_name"];
    }
}
$rows[] = $temp_row;

echo json_encode($rows);

?>