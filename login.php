<?php
session_start();
include 'connect.inc.php';
//include 'ref.php';
if (isset($_POST['username']) AND (!empty($_POST['password'])))
{
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']); //md5(addslashes($_POST['password']))

    $sql = "select * from staff where staff_user='$username'";
    $result = $conn->query($sql);
    if($result) {
        // $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $row = $result->fetch_assoc();
        if ($password == $row['staff_pw'])
        {
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $row['staff_id'];
            $_SESSION["staff_name"] = $row['staff_name'];
            $_SESSION["accesslevel"] = $row['staff_lv'];
            $_SESSION["section_id"] = $row['section_id'];
    
            $response["error"] = false;
            $response["result"] = $row;
        }
        else {
            $response["error"] = true;
            $response["error_message"] = "Invalid credentials";
        }
    } else {
        $response["error"] = true;
        $response["error_message"] = "Query problem: ". $conn->error;
    }
    
} else {
    $response["error"] = true;
    $response["error_message"] = "Missing param";
}

echo json_encode($response);

?>