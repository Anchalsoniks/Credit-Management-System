<?php include 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background:url('bg2.jpg') no-repeat center fixed;
        }
        .primary{
            font-size:40px;
            text-align:center;
        }
        .tirtory{
            font-size:25px;

        }
        #first{
            border: 6px solid black;
            height:80%;
            width:50%;
            margin-left:380px;
            margin-top:40px;
            background-color: #effbf7;
        }
        .form-control{
            padding-top:10px;
            padding-bottom:10px;
            padding-left:30px;
            padding-right:30px;
            
        }
        .amountc{
            font-size:25px;
        }
        .button2{
            margin-left:300px;
            background-color:green;
            cursor:pointer;
            padding:15px;
            color:black;
            margin-top:20px;
            font-size:15px;
            color:white;
        }
        td{

            font-size:22px;
            text-align:center;
        }
        #amt{
            padding-top:10px;
            padding-bottom:10px;
            padding-left:30px;
            padding-right:30px;
            
        }
        .button1{
            background-color:green;
            font-size:20px;
            padding:10px;
            color:white;
            cursor:pointer;
        }
        th{
            background-color:green;
            color:white;
            font-size:40x;
        }
    </style>
    </head>
    <body>

    <?php
    if(isset($_GET['sno']))
    {
        session_start();
        $session['sno']=$_GET['sno'];
    }
    ?>
<div>
    <p align='right'>
    <button class='button1' onclick='redirect()'>Back</button>
    </p>
    <script>
    function redirect(){
        window.location.href="transferselect.php";
    }
    </script>
   
   <?php
    if(isset($_GET['errors'])){
        $error=$_GET['errors'];
        echo "<div class='alert alert-danger'>$error</div>";
    }
    if(isset($_GET['success'])){
        $error=$_GET['success'];
        echo "<div class='alert alert-success'>$success</div>";
    }
    
    ?>
    <div >
        <div>
            <form method="POST" action='transfercredit.php'>
                <h1 class="primary"><strong><u>Transfer Credit</u></strong></h1>
            <div id="first">
                <h3 class="tirtory">From:</h3>
               
               
               <?php
                    $txt=$_GET['sno'];
                    $query1="SELECT * FROM users WHERE name='".$txt."'";
                    $result=mysqli_query($conn,$query1);    
                    echo "<table id=\"my_table1\" border='1' height='100px' width='600px' align='center' >
                    <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Credit</th>
                    </tr>";  
                    while($row=mysqli_fetch_array($result))
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

                <h3 class="tirtory">Select name to transfer the credit:</h3>
                <select class="form-control" name="touser" id="listu1" required="required">
                <option value="">select users</option>               
                <?php
                    $txt=$_GET['sno'];
                    $query="SELECT * FROM users WHERE name!='".$txt."'";
                    $result=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_array($result))
                    {
                ?>
                <option value="<?php echo $row['name'];?>"><?php echo $row['name'] ; echo " "; echo"-"; echo $row['credit']; ?> 
                </option>
                <?php

                    }
                ?>
                </select>
            <br><br>
			<label class="amountc"for="name"><b>Amount:</b></label>
			<br>
			<input type="number" id="amt" name="credits" min="0" required="required">
			<input name="fromtc" type="hidden" value= "<?php echo $txt;?>"> 
			<br>
            <button class='button2' name='transfer' onclick="myfunction()">Transfer Credits</button>
			</form>	
            <br><br><br>
         </div>   
        </div>
      </div>
    </div>
    </body>
</html>