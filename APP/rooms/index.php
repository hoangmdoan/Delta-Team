<?php
// including the database connection file
include_once ("config.php");

// fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM rooms ORDER BY RoomID ASC");

include '../header.php'; // Contains HTML for header
?>
<a href="add.php">Add new</a>
<div class="content">
	<div class="container-fluid">
		<div class="row">

			<!--  table -->
			<div class="col-md-12">
				<div class="card strpied-tabled-with-hover">
					<div class="card-header ">
						<h4 class="card-title">Rooms</h4>

					</div>
					<div class="card-body table-full-width table-responsive">
						<table class="table table-hover table-striped">
							<thead>
								<th>Room ID</th>
								<th>BuildingID</th>
								<th>RoomNumber</th>
								<th>Capacity</th>
							</thead>
							<tbody>
									<?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['RoomID'] . "</td>";
            echo "<td>" . $row['BuildingID'] . "</td>";
            echo "<td>" . $row['RoomNumber'] . "</td>";
            echo "<td>" . $row['Capacity'] . "</td>";
            echo "<td><a href=\"edit.php?RoomID=$row[RoomID]\">Edit</a> | <a href=\"delete.php?RoomID=$row[RoomID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
									
										</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- -end table -->

		</div>
	</div>
</div>

<?php
include '../footer.php'; // Contains HTML for header
?>