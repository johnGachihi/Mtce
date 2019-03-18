<?php

include "connect.inc.php";
include "app/Response.php";
include "app/repositories/StaffRepo.php";

if (isset($_GET["section"])) {
    sendStaffBySection($_GET["section"]);

} else {

    $sql = "SELECT staff.staff_name, sections.section_name
                FROM staff 
                INNER JOIN sections
                ON staff.section_id = sections.section_id
                WHERE staff_lv = 1
                ORDER BY section_name, staff_name;";

    $result = $conn->query($sql);

    $rows = [];

    while($row = $result->fetch_assoc()) {
        $rows[$row["section_name"]][] = $row["staff_name"];
    }
}

function sendStaffBySection($section_id) {
    $staffRepo = new StaffRepo(DBConnection::getConnection());
    
    try {
        $staff = $staffRepo->getStaffBySection($section_id);
        Response::respond($staff);

    } catch(EmptySetException $e) {
        Response::respondWithError($e->getMessage());

    } catch(Exception $e1) {
        Response::respondWithErrorAndStatusCode($e1->getMessage(), 500);
    }
}

// echo print_r($rows);

?>