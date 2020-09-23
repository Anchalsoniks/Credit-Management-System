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
        #utable{
            border: 3px solid black;
            margin-left:300px;
            margin-top:60px;
            height:450px;
            width:60%;
            border-collapse:collapse;
            background-color: #effbf7;
            
        }
        th{
            text-align:center;
            height:50px;
            border:2px solid black;
            background-color:green;
            color:white;
            font-size:25px;

        }
        td{
            text-align:center;
            border:1px solid black;
            font-size:20px;
        }
        #home{
            border:3px solid black;
            margin-top:30px;
            margin-left:600px;
            margin-right:600px;
            padding:15px;
            font-size:22px;
            background-color:green;
            
            

        }
        a{
            padding-left:70px;
            text-decoration:none;
            color:black;
            cursor:pointer;
        }
        a:hover{
            color:white;
        }
        #select{
            color:blue;
            text-align:center;
        }
        </style>
     <?include 'login.php';?>
</head>
<body>
    <div class ="main-div">
    <h1 class='primary'> <strong><u>FOR TRANSFER CREDIT CLICK SELECT</u></strong> </h1>
    <div class="center-div">
    <table id='utable'>
        <thead id='uhead'>
            <tr>
            <th>S.no</th>
            <th>Name</th>
            <th>Email</th>
           <th>Credit</th>
            <th>Action</th>

            </tr>

        </thead>
        <tbody>
        <?php
            include 'connection.php';
             $selectquery = "select * from users";
 
            $query=mysqli_query($conn,$selectquery);
            $nums=mysqli_num_rows($query); //it print 7
        
               //echo $res[1]; 
               while($row= mysqli_fetch_assoc($query))
               {
                echo " <tr>";
                echo "<td>".$row['s.no']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['credit']."</td>";
               echo "<td> <a id='select' href='selectperson.php?sno=".$row['name']."'>select</a></td>";
               echo "</tr>";
               }
             ?>

            

        </tbody>

    </table>
    </div>
    <div id="home"> 
        <a href="home.html">Home Page</a>
    </div>
    </div>
    
</body>
</html>
