<?php
session_start();
// include 'login.php';
include 'ref.php';
if (!isset($_SESSION["id"]))
{
	// echo "zzz";
	header("location:index.php");
	exit();
}else{
?>

<!DOCTYPE html>
<html>
<head>
<meta name=viewport content="width=device-width, initial-scale=1"> 
<meta charset="utf-8">
<title>Moi Airport</title>
<link rel="stylesheet" href="styles.css" type="text/css">
<script src="dependencies/jquery-3.3.1.min.js"></script>
<!-- <link rel="stylesheet" href="dependencies/bootstrap.min.css" type="text/css"> -->

<script>
// $(document).ready(function(){
// 	$("#submit_btn").click(function(event){
// 		event.preventDefault();
// 		$.ajax({
// 			url:"submit_frm.php",
// 			type:"POST",
// 			data: $('#frm').serialize(),
// 			success:function(d)
// 			{
// 				$("#status").html(d);
// 				$("#frm")[0].reset();
// 			}
// 		});
// 	});
// })
</script>






</head>

<body>

<?php

	$staff_name = $_SESSION["staff_name"];
	$staff_id = $_SESSION["id"];
	$accesslevel = $_SESSION["accesslevel"];
	$section_id = $_SESSION["section_id"];
	echo "<h1>".$_SESSION["staff_name"]."</h1><hr>";
	echo "<a href=logout.php>Logout</a> | <a href=changepassword.php>Change Password</a> |
			<font color='red'>Task Reporting</font>";
	if ($_SESSION["accesslevel"] == 5){
	echo " | <a href=admin.php>Admin</a>";
	echo " | <a href=sms.php>SMS</a>";
	}
	echo "<br><hr><br>";

	include 'connect.inc.php';

//---------------------------------------facility dropdown

?>




<form id="frm" method="post">
	<br>
	<table border=1>
		<tr><td>

		<table>
		<tr>
			<td>Facilities:&nbsp;</td>
			<td>
				<select name="facility" id="facility" onChange="changeComponents()">
					<option value="">Select facility</option>

					<?php 
						$sql = "SELECT * FROM facilities fa left outer join sections sc on
								fa.section_id=sc.section_id where fa.section_id=$section_id";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()){
					?>

					<option value="<?php echo $row['facility_id']; ?>"id="<?php echo $row['facility_name']; ?>">
						<?php echo $row['facility_name']; ?>
					</option>
					<?php  } ?>
				</select>
			</td>

			<td>&nbsp;&nbsp;Component/Area:&nbsp;</td>
			<td>
				<div id="subtaskdd">
					<select name="component" id="components">
					<option value="">Select component</option>
					</select>
				</div>
			</td>
		</tr>
		<tr><td colspan="4"><hr></td></tr>
		<tr>
			<td colspan="4">
				<br>
				<p>
					<?php 
						$sql = "SELECT * FROM activities;";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()) {
							echo '<Input type="checkbox" name="task_cb[]" value="' .
								$row['activity_id'] . '"/>' . $row["activity_name"] . ' | ';
						}
					?>
				</p>
			</td>
		</tr>
		<tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4"><br>Insert Narration of Work Done</td></tr>
		<tr>
			<td colspan="4">
				<textarea name="message" rows="10" cols="50"></textarea> 
			</td>
		</tr>
		<tr>
			<td colspan="4"><hr></td>
		</tr>
		<tr>
			<td colspan="4">
				<br>Percentage availability:
				<input type="text" name="availability" pattern="\b(0*(?:[1-9][0-9]?|100))\b"
					oninvalid="this.setCustomValidity('Insert a percentage (1-100)')"
					oninput="this.setCustomValidity('')">%
			</td>
		</tr>
		<tr>
			<td colspan="4"><hr></td>
		</tr>
		<tr>
			<td colspan="4">
				<Input type="submit" name="submit" value="Submit" id="submit_btn" />&nbsp&nbsp
			</td>
		</tr>
		</table>


		</td><td><div id="insp_list"></div></td></tr>
	</table>
</form>


<div id="status" style="color: red"></div>

<table border="1" id="task-report-list">
	<thead>
		<tr>
			<th>Date</th>
			<th>Facility</th>
			<th>Component</th>
			<th>Activities</th>
			<th>Work Narration</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>




<script type="text/javascript">

const ALL_ROWS = "all";
const SINGLE_LAST_ROW = "last_row";

insertEntriesIntoTable(ALL_ROWS);

const form = document.getElementById("frm");
form.onsubmit = submitTaskReport;

function submitTaskReport(e) {
	e.preventDefault();

	const ajax = new XMLHttpRequest();
	ajax.open("POST", "submit_frm.php");
	ajax.responseType = "json";
	ajax.send(new FormData(form));

	ajax.onload = () => onSubmissionComplete(ajax.response);
}

function onSubmissionComplete(response) {
	//Show sumbission status
	const statusDiv = document.getElementById("status");
	statusDiv.innerHTML = response["message"];

	if(!response["error"]) {
		insertEntriesIntoTable(SINGLE_LAST_ROW);	//Update task reports table
		document.getElementById("frm").reset();		//Reset form
	}
}

function insertEntriesIntoTable(entryType) {
	const taskReportListTable = document.getElementById("task-report-list");

	try {
		fetchTableData(entryType)
			.then(data => {
			    console.log(data);
			    if(typeof data[0] === "object") {
			        for(let row of data) {
    					insertCellsInRow(taskReportListTable.insertRow(1), row);
    				}
			    }
			})
	} catch (error) {
		throw error;
	}
}

function fetchTableData(resultType) {
	if((resultType != ALL_ROWS) && (resultType != SINGLE_LAST_ROW)) {
		throw "Invalid argument";
	}
	return fetch("getTableData.php?rows=" + resultType + "&userid=" + <?php echo $_SESSION["id"]?>)
				.then(response => {
					return response.json();
					console.log("Within fetch (response)", response);
				})
}

function insertCellsInRow(tableRow, rowData) {
	const {date, facility, component, activities, work_narration} = 
		rowData;

	tableRow.insertCell().innerHTML = date; 			//Insert `Date` cell
	tableRow.insertCell().innerHTML = facility; 		//Insert `facility-name` cell
	tableRow.insertCell().innerHTML = component; 		//Insert `component-name` cell
	tableRow.insertCell()
		.appendChild(createUListElement(activities)); 	//Insert `activities` cell
	tableRow.insertCell().innerText = work_narration;	//Insert `work narration` cell
}

function createUListElement(listData) {
	const list = document.createElement("ul");
	for (let item of listData) {
		const listItem = document.createElement("li");
		listItem.innerText = item;
		list.appendChild(listItem);
	}
	return list;
}

function changeComponents(){
	getComponents().then(componentsData => {
		emplaceComponents(createOptionElementList(componentsData));
	})
}

function getComponents() {
	const url = "getComponents.php?facility=" +
			document.getElementById("facility").value;

	return fetch(url).then(response => response.json());
}

function emplaceComponents(options) {
	const selectElement = document.getElementById("components");
	selectElement.options.length = 1 //Clear previous option elements
	for (let o of options) {selectElement.add(o)}
}

function createOptionElementList(components = []) {
	let options = [];
	for(let option of components) {
		options.push(new Option(option['component_name'], option['component_id']))
	}
	return options;
}
</script>



<!-- //---------------------------------------facility checkbox -->


</body>
</html>

<?php
}
?>