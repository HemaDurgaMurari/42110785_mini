<?php
require_once 'dbcon.php';

if (isset($_POST['vehicle_no'])) {
	$vehicleNo = $_POST['vehicle_no'];
	$sql = "SELECT * FROM insurance_data WHERE vehicle_no = '$vehicleNo'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<p>Policy No: " . $row["policy_no"] . "</p>";
			echo "<p>Customer Name: " . $row["customer_name"] . "</p>";
			echo "<p>Vehicle No: " . $row["vehicle_no"] . "</p>";
			echo "<p>Vehicle Model: " . $row["vehicle_model"] . "</p>";
			echo "<p>Vehicle Make Year: " . $row["vehicle_make_year"] . "</p>";
			echo "<p>Insurance Status: " . $row["insurance_status"] . "</p>";
		}
	} else {
		echo "<p>No insurance data found for this vehicle number.</p>";
	}
} else {
	echo "<p>Please enter a valid vehicle number.</p>";
}
$conn->close();
?>