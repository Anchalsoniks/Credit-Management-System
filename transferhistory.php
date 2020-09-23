<?php include 'connection.php'?>
<?php
$query = "SELECT * FROM transferrecords";
$result = mysqli_query($conn,$query);
?>
<html>
<head>
<title>
Transfer History
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
	#my_table2{
		margin-left: 450px;
		font-size: 18px;
		width: 600px;
		margin-top: 30px;
		border-collapse: collapse;
		background-color: #effbf7;
	}
	th,td{
		padding: 8px 4px;
		text-align: center;
	}
	th{
		font-size: 19px;
		background-color: green;
		color:white;

	}
	td{
		font-size:20px;
	}
	body{
		background:url('bg2.jpg') no-repeat center fixed;
	}
	.btn1{
		background-color:green;
		font-size:18px;
		color:white;
	}
	#h1{
		font-size:40px;

	}
</style>
</head>
<body>
	<div class="container1">
		<p align='right'>
	<button class='btn1' onclick="redirect()">Home</button>
	</p>
	<script>
	function redirect() {
		window.location.href = "home.html";
	}
	</script>
	<div class="login-wrap2">
	<div class="login-form">
	    <form method="GET">
		<hr>
		<div class="head">
			<h1 id='h1'><strong><u>Transfer History</u></strong></h1>
			<?php
				
				echo "<table id=\"my_table2\" border='1'>
				<tr>
				<th>From User</th>
				<th>To User</th>
				<th>Credit Amount<br>Transfered</th>
				<th>Date and Time</th>
				</tr>";

				while($row = mysqli_fetch_array($result)) 
				{
				echo "<tbody>";
				echo "<tr>";	
				echo "<td>" . $row['From_User'] . "</td>";
				echo "<td>" . $row['To_User'] . "</td>";
				echo "<td>" . $row['CreditTransfered'] . "</td>";
				echo "<td>" . $row['DateTime'] . "</td>";
				echo "</tr>";
				echo "</tbody>";
				}
				echo "</table>";
			?>
		</div>
		<br><br><br>
	</div>
	</div>
	<br><br>
</body>
</html>