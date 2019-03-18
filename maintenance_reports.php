<?php
include 'connect.inc.php';
?>

<html>
<head>
<meta name=viewport content="width=device-width, initial-scale=1"> 
<meta charset=utf-8">
<title>Moi Airport Maintenance Report</title>
<link rel="stylesheet" href="styles.css" type="text/css">
<script src="jquery-3.3.1.min"></script>
<script src="bootstrap.min.js"></script>
</head>
<body>
<br><br><br>
<form>
SELECT SECTION:&nbsp;
<select name="facility" id="facility" onChange="changeTask();">
<option>Select section</option>
<?php 
$sql = "SELECT * FROM maintenance.sections";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
?>
<option value="<?php echo $row['section_id']; ?>" id="<?php echo $row['section_name']; ?>"><?php echo $row['section_name']; ?></option>
<?php  } ?>
</select>
</form>

<hr>
<?php

$sql = "select * from maintenance.sections ";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	$section_name = $row['section_name'];
	$section_id = $row['section_id'];
	echo '<h3><b>'.$section_id.'. '.$section_name.'</b></h3>';
	
	$sql2 = "SELECT * FROM maintenance.facilities fa left outer join maintenance.sections sc on fa.section_id=sc.section_id where fa.section_id=$section_id and facility_pred=0";
	$result2 = $conn->query($sql2);
	while($row2 = $result2->fetch_assoc()){
		$facility_name = $row2['facility_name'];
		$facility_id = $row2['facility_id'];
		echo '<img src="_dot.jpg" alt="" width="50" height="1">('.$facility_id.') <a href="">'.$facility_name.'</a>';
		echo "<br>";
		
		$sql3 = "SELECT * FROM maintenance.facilities fa left outer join maintenance.sections sc on fa.section_id=sc.section_id where facility_pred=$facility_id";
		$result3 = $conn->query($sql3);
		while($row3 = $result3->fetch_assoc()){
			
			$facility_name = $row3['facility_name'];
			$facility_id = $row3['facility_id'];
			echo '<img src="_dot.jpg" alt="" width="100" height="1">('.$facility_id.') <a href="">'.$facility_name.'</a>';
			echo "<br>";
		}
	} 
	//echo "<br>";
}
?>
<form>

</form>
</body>
</html>