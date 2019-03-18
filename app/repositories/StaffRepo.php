<?php

include "Repo.php";

class StaffRepo extends Repo{

    public function __construct($connection) {
        parent::__construct($connection);
    } 

    public function getStaffBySection($sectionId) {
        $sql = "SELECT staff_id, staff_name
                FROM staff
                WHERE section_id = ". $_GET["section"].
                "   AND staff_lv = 1";
        
        $result = $this->conn->query($sql);

        if(!$result) {
            throw new Exception("Error querying database");
        }

        return $this->getAssocArray($result);
    }

}


?>