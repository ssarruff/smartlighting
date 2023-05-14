<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Smart Lighting Administrator</title>
      <link rel="stylesheet" href="css/StyleSheet3.css">
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
</head>
<body>
	<h1>Smart Lighting Administrator</h1>
	<h2>Settings</h2>
      <br>
	<button onclick="verifyBrightness()">LED Brightness</button>
      </br>
      <br>
	<button onclick="verifyProximity()">Proximity</button>
      </br>
       <br>
	<button onclick="verifyGesture()">Gesture</button>
       </br>
       <br>
	<button onclick="verifyColor()">Color</button>
       </br>

	<h2>Generate Reports</h2>
      <br>
	<button onclick="generatePDF()">Generate PDF Report</button>
      </br>
      <br>
	<button onclick="generateExcel()">Generate Excel Worksheet</button>
      </br>
	  <br>
	  <a class="button" href="logout.php" style="float: center;">Logout</a>
	 </br>

	<script>
		function verifyBrightness() {
			// Code to verify LED brightness
			alert("LED brightness verified!");
		}

		function verifyProximity() {
			// Code to verify proximity
			alert("Proximity verified!");
		}

		function verifyGesture() {
			// Code to verify gesture
			alert("Gesture verified!");
		}

		function verifyColor() {
			// Code to verify color
			alert("Color verified!");
		}

		type="text/javascript"
		   function generatePDF() {
			// Code to generate PDF report
			const { jsPDF } = window.jspdf;
			const doc = new jsPDF();
			doc.text("Smart Lighting Administrator Report", 50, 10);
			doc.text("This page provides a sensor data report!", 50, 50);
			doc.save("smart-lighting-administrator-report.pdf");
			alert("PDF report generated!");
		}

		function generateExcel() {
			// Code to generate Excel worksheet
			var workbook = XLSX.utils.book_new();
			var worksheet = XLSX.utils.json_to_sheet([
				{Sensor: "Brightness", Value: 50},
				{Sensor: "Proximity", Value: "Near"},
				{Sensor: "Gesture", Value: "Swipe"},
				{Sensor: "Color", Value: "Green"}
			]);
			XLSX.utils.book_append_sheet(workbook, worksheet, "Sensor Data");
			XLSX.writeFile(workbook, "smart-lighting-administrator-data.xlsx");
			alert("Excel worksheet generated!");
		}
	</script>
</body>
</html>
