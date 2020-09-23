<?php include 'connection.php' ?>
<?php
if(isset($_POST['transfer']))
{
    function function_alert($errors)
    {
        echo "<script>alert('$errors');";
        echo "window.location.href='transferselect.php'";
        echo "</script>";
    }
    session_start();
    $from_id= trim($_POST['fromtc']);
    $to_id= trim($_POST['touser']);
    $credits= trim($_POST['credits']);
    $error= false;

    //from users
    $from_query="SELECT * FROM users WHERE name='$from_id'";
    $from_result=mysqli_query($conn,$from_query);
    $row_from=mysqli_fetch_assoc($from_result);
    $from_name=$row_from['name'];
    $from_creditdb=$row_from['credit'];

    //to user
    $to_query="SELECT * FROM users WHERE name='$to_id'";
    $to_result=mysqli_query($conn,$to_query);
    $row_to=mysqli_fetch_assoc($to_result);
    $to_name=$row_to['name'];
    $to_creditdb=$row_to['credit'];

	//error for insufficient credit
	
	//if((int)$credits<1){
		//function_alert("Negative value not allowed");

	//}
    if((int)$credits>(int)$from_creditdb)
    {
        $errors="Insufficient credits";
        $error=true;
    }

    //error for
    if(!$error)
    {
        $current_date=date("Y-m-d H:i:s");
        $userf_finalcredit="UPDATE users SET";
        $userf_finalcredit .= " credit = credit-$credits WHERE name= '$from_id'";
        $query=mysqli_query($conn,$userf_finalcredit);
		if(!$query)
		{
            die("QUERY FAILED!!!1".mysqli_error($conn));
            echo ("error description:". $mysqli ->error);
        }
		$userto_finalcredit="UPDATE users SET";
	    $userto_finalcredit .= " credit = credit+$credits WHERE name='$to_id'";
        $query=mysqli_query($conn,$userto_finalcredit);
        $query1 = "INSERT INTO transferrecords(From_User,To_User,CreditTransfered,DateTime) VALUES('$from_name','$to_name','$credits','$current_date')";
        $res2 = mysqli_query($conn,$query1);
		if($res2)
		{
			$user1 = "SELECT * FROM users WHERE name ='$from_id' OR name = '$to_id'";
			$res=mysqli_query($conn,$user1);
			$row_count=mysqli_num_rows($res);
			
		}
        else
        {
			die("QUERY FAILED".mysqli_error($conn));
			echo("Error description: ". $mysqli -> error);
		}
	}
	

    else
    {
		function_alert("Insufficient Credit Balance!!Please Try Again");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>
		Final User Result
    </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	h1{
		font-size: 42px;
		margin-left: 80px;
		margin-top: 55px;
		text-align:center;
	}
	#my_table{
		margin-left: 530px;
		margin-top:70px;
		font-size: 20px;
		border-style: groove;
		border-collapse: collapse;
		background-color: #effbf7;
		
	}
	th{
		background-color: green;
		color:white;
	
	}
	th,td{
		padding: 15px;
	}
	.success-msg {
		margin: 10px 10px 10px 10px;
		padding: 10px;
		border-radius: 3px 3px 3px 3px;
		color: #270;
		background-color: #DFF2BF;
	}
	.home{
		border:2px solid black;
		background-color:green;
		padding:15px;
		margin-top:70px;
		padding-left:200px;
		margin-left:530px;
		margin-right:500px;
	}
	a{
		text-decoration:none;
		color:white;
		font-size:26px;
	}
	</style>
    </head>
	<body>
		<div class="success-msg">
				<i class="fa fa-check"></i>
					Credit is Successfully Transfered. Check the details Below!!
		</div>
        <h1>User Details After Credit Transfer</h1>
	<?php
		echo "<table id=\"my_table\" border='1'>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email Id</th>
		<th>Final Credit</th>
		</tr>";
		while($row = mysqli_fetch_assoc($res))
		{
		echo "<tr>";
		echo "<td>".$row['s.no']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['credit']."</td>";
		echo "</tr>";
		}
		echo "</table>";
	?>
		<br><br>
		
	</div>
	</div>
	<div class=home>
	<a href="home.html">Home</a>
	</div>
	</body>
</html>



