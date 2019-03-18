<?php

include "app/exceptions/exceptions.php";

class Repo {

    protected $conn;

    protected function __construct($connection) {
        $this->conn = $connection;
    }

    protected function getAssocArray(mysqli_result $result) {
        $rows = [];
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        if(!$rows) 
            throw new EmptySetException("Set is empty");
        
        return $rows;
    }
}


?>