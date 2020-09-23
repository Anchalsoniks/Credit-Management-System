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
            margin-top:40px;
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
            padding:10px;
        }
        #home{
            border:3px solid black;
            margin-top:30px;
            margin-left:580px;
            margin-right:600px;
            padding:15px;
            font-size:22px;
            background-color:green;
            
            

        }
        a{
            padding-left:70px;
            text-decoration:none;
            color:black;
        }
        a:hover{
            color:white;
        }
        </style>
     <?include 'login.php';?>
</head>
<body>
    <div class ="main-div">
    <h1 class='primary'> <strong><u>USERS</u></strong> </h1>
    <div class="center-div">
    <table id='utable'>
        <thead id='uhead'>
            <tr>
            <th>S.no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Credit</th>

            </tr>

        </thead>
        <tbody>
        <?php
            include 'connection.php';
             $selectquery = "select * from users";
 
            $query=mysqli_query($conn,$selectquery);
            $nums=mysqli_num_rows($query); //it print 7
        
               //echo $res[1]; //it print name of first
 
           while($res= mysqli_fetch_array($query)){
             ?>

               <tr>
              <td> <?php echo $res['s.no']; ?></td>
             <td> <?php echo $res['name']; ?></td>
              <td> <?php echo $res['email']; ?></td>
             <td> <?php echo $res['credit']; ?></td>

            </tr>
<?php

        
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
