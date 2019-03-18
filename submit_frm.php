<?php
session_start();

include 'connect.inc.php';
//include 'ref.php';
//Retrieve form data. 

if (empty($_POST['facility']) || empty($_POST['component']) ||
	empty($_POST['task_cb']) || empty($_POST['message']) ||
	empty($_POST['availability']))
{
	// echo "<font color='red'>Please fill in all required fields before submitting...</font>";
	$response["error"] = true;
	$response["message"] = "Fields missing";
	http_response_code(400);
} else {

	$user_Id = $_SESSION['id'];
	$facility=$_POST['facility'];
	$component=$_POST['component'];
	$task_cb=$_POST['task_cb'];
	$task_cb_new=implode("|",$task_cb);
	$message=$_POST['message'];
	$availability=$_POST['availability'];

	$tasksInsertQueryParam = [];
	foreach($task_cb as $activity_id) {
		$tasksInsertQueryParam[] = "(LAST_INSERT_ID(), $activity_id)";
	}

	$taskReportSql = "INSERT INTO task_reports 
			   (facility_Id,   component_Id,  message, 	 availability, 	 user_Id)
		VALUES ('$facility',  '$component',  '$message','$availability','$user_Id')";
	$activitiesSql = "INSERT INTO task_activity_mapper VALUES ". implode(',', $tasksInsertQueryParam);

	$conn->begin_transaction();

	$taskReportInsertResult = $conn->query($taskReportSql);
	$activityInsertResult = $conn->query($activitiesSql);

	if($taskReportInsertResult and $activityInsertResult) {
		$conn->commit();
		$response["error"] = false;
		$response["message"] = "New task successfully added to database...";
	} else {
		$response["error"] = true;
		$response["message"] = "Task not added to database.. Error encountered\n". $conn->error;
		$conn->rollback();
	}


	// if ($conn->query($sql)) {
	// 	echo "<font color='red'>New task successfully added to database...</font>";

	// echo "<br>";


	// $sql1 = "SELECT tsk.task_Id,fac.facility_name fac,fcc.facility_name fcc,tsk.message msg,tsk.availability FROM task_reports tsk join facilities fac on tsk.facility_Id=fac.facility_id join facilities fcc on tsk.component_Id=fcc.facility_id where user_Id=$user_Id";
	// $result1 = $conn->query($sql1);
	// echo "<table border=1>";
	// while($row1 = $result1->fetch_assoc()){
		// echo "<tr>";
		// echo "<td>".$row1['fac']."</td><td>".$row1['fcc']."</td><td>".$row1['msg']."</td><br>";
		// echo "</tr>";
	// }
	// echo "</table>";



	// }else{
	// echo "Task not added to database...";
// }
}

echo json_encode($response);





?>