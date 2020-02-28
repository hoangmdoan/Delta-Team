<?php

include_once("config.php");
if(isset($_POST['Submit'])) {	
    $RoomID = $_POST['RoomID'];
    $BuildingID = $_POST['BuildingID'];
	$RoomNumber = $_POST['RoomNumber'];
	$Capacity = $_POST['Capacity'];
		
	
	if(empty($RoomID) || empty($BuildingID) || empty($RoomNumber) || empty($Capacity)) {
				
	    if(empty($RoomID)) {
			echo "<font color='red'>Vendor ID field is empty.</font><br/>";
		}
		
		if(empty($BuildingID)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($RoomNumber)) {
			echo "<font color='red'>RoomNumber field is empty.</font><br/>";
		}
		
		if(empty($Capacity)) {
		    echo "<font color='red'>Contact field is empty.</font><br/>";
		}
		
	
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
			
		$sql = "INSERT INTO rooms(RoomID, BuildingID, RoomNumber, Capacity) VALUES(:RoomID, :BuildingID, :RoomNumber, :Capacity)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':RoomID', $RoomID);
		$query->bindparam(':BuildingID', $BuildingID);
		$query->bindparam(':RoomNumber', $RoomNumber);
		$query->bindparam(':Capacity', $Capacity);
		$query->execute();
		
		
		
	
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>

<?php
include '../header.php'; // Contains HTML for header
?>

<body>
	<a href="index.php">Home</a>


	<!-- begin table -->

	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add a vendor</h4>
			</div>
			<div class="card-body">
				<form action="add.php" method="post" name="form1">
					<div class="row">
						<div class="col-md-5 pr-1">
							<div class="form-group">
								<label>RoomID</label> <input type="text" name="RoomID"
									class="form-control" placeholder="RoomID">
							</div>
						</div>
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>BuildingID</label> <input type="text" class="form-control"
									name="BuildingID" placeholder="BuildingID">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>RoomNumber</label> <input type="text" class="form-control"
									name="RoomNumber" placeholder="RoomNumber">
							</div>
						</div>
						<div class="col-md-6 pl-1">
							<div class="form-group">
								<label>Capacity</label> <input type="text" class="form-control"
									name="Capacity" placeholder="Capacity">
							</div>
						</div>
					</div>
					<button type="submit" name="Submit" value="Add"
						class="btn btn-info btn-fill pull-right">Submit</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
	<!-- end table -->

<?php
include '../footer.php'; // Contains HTML for header
?>



