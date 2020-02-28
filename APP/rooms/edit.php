<?php

include_once("config.php");
if(isset($_POST['update']))
{	
    $RoomID = $_POST['RoomID'];
    $BuildingID = $_POST['BuildingID'];
    $RoomNumber = $_POST['RoomNumber'];
    $Capacity = $_POST['Capacity'];
	
	
    if(empty($RoomID) || empty($BuildingID) || empty($RoomNumber) || empty($Capacity)) {	
			
        if(empty($RoomID)) {
			echo "<font color='red'>Room ID field is empty.</font><br/>";
		}
		
		if(empty($BuildingID)) {
			echo "<font color='red'>Building ID field is empty.</font><br/>";
		}
		
		if(empty($RoomNumber)) {
			echo "<font color='red'>RoomNumber field is empty.</font><br/>";
		}
		
		if(empty($Capacity)) {
		    echo "<font color='red'>Capacity field is empty.</font><br/>";
		}
	} else {	
		
	    $sql = "UPDATE rooms SET RoomID='$RoomID', BuildingID='$BuildingID', RoomNumber='$RoomNumber', Capacity='$Capacity' WHERE RoomID='$RoomID'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		
		
		header("Location: index.php");
	}
}
?>
<?php

$RoomID = $_GET['RoomID'];

$sql = "SELECT * FROM rooms WHERE RoomID=:RoomID";
$query = $dbConn->prepare($sql);
$query->execute(array(':RoomID' => $RoomID));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $RoomID = $row['RoomID'];
    $BuildingID = $row['BuildingID'];
    $RoomNumber = $row['RoomNumber'];
    $Capacity = $row['Capacity'];
    
}
?>

<?php
include '../header.php'; // Contains HTML for header
?>
<!-- begin table -->

<div class="col-md-8">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Edit Vendor</h4>
		</div>
		<div class="card-body">
			<form name="form1" method="post" action="edit.php">
				<div class="row">
					<div class="col-md-5 pr-1">
						<div class="form-group">
							<label>ID (disabled)</label> <input type="text" 
								class="form-control" disabled="" placeholder="RoomID"
								value="<?php echo $_GET['RoomID'];?>">
						</div>
					</div>
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>BuildingID</label> <input type="text" class="form-control" name="BuildingID" 
								placeholder="BuildingID" value="<?php echo $BuildingID;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>RoomNumber</label> <input type="text" class="form-control" name="RoomNumber"
								placeholder="RoomNumber" value="<?php echo $RoomNumber;?>">
						</div>
					</div>
					<div class="col-md-6 pl-1">
						<div class="form-group">
							<label>Capacity</label> <input type="text" class="form-control" name="Capacity"
								placeholder="Capacity" value="<?php echo $Capacity;?>">
						</div>
					</div>
				</div>
				
				<input type="hidden"
								name="RoomID" 
								value="<?php echo $_GET['RoomID'];?>"/>

				<button type="submit" class="btn btn-info btn-fill pull-right" name="update" value="Update" >Update
			    </button>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>
<!-- end table -->
<a href="index.php">Back</a>
<?php
include '../footer.php'; // Contains HTML for header
?>
