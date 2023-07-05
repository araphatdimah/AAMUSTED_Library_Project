<?php 
session_start();
if(!isset($_SESSION['LibrarianPassword']))
{
  header("location:logIn.php");
  die;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searched Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

  <style>

#Inputs{
		background-color: rgb(182, 182, 238);
		margin: auto;
		margin-top: 30px;
		font-weight: bold;
		padding: 20px;
        max-width: 700px;
        border-radius: 10px;
	}
	.input-field {	
		margin-top: 10px;
	}
	#btn{
		width: 150px;
		margin-top: 20px;
		background-color: firebrick;
		font-weight: bold;
		border: none;
		height: 30px;
		font-size: 17px;
	}
  h6 { 
    font-family:Verdana, Geneva, Tahoma, sans-serif; 
    text-align: center; 
    color:rgba(138, 10, 48, 0.932);
    font-weight:550;
    padding-right: 15px;
    margin-top:15px;
    
} 
#h7{
  font-weight:550;
    padding-right: 15px;
    text-align:center;
}
@media (max-width: 767px) {
        ul.navbar-nav {
        background-color: rgb(247, 204, 31) !important;
            }
        }
        @media (min-width: 768px) {
        ul.navbar-nav {
            background-color: #ffffff !important;
           }
        }

  #lin{
        text-decoration: none;
        font-weight:500;
        padding: 7px;
        
      }
      a{
        text-decoration: none;
        color:black;
      }
    a:hover {
        color:red;
      }

    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .print-button {
      margin-top: 20px;
      margin-left:38%;
    }
    #picDisplay{
        width:15px;
        height:15px;
    }
  </style>

<body>

<div style="background-color: rgba(138, 10, 48, 0.932); width: 100%; height: 38px;" class="fixed-position fixed-top">
  
  </div>
  <nav style="margin-top: 25px; background-color: white; border-bottom:1px solid; border-color:rgba(138, 10, 48, 0.932);" class="navbar navbar-expand-lg navbar-expand-xl fixed-top">
    
    <div style = "margin-left:5px;" class="container">
      <a href="Home.php" class="navbar-brand"><img style="width: 180px;" src="IMG-20230131-WA0033.jpg"></a>
      <h6>AAMUSTED LIBRARY</h6><br>
        <button style=" border: none;" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-label="Expand Navigation">
            <div><span class="navbar-toggler-icon bg-light navbar-nav-scroll"></span></div>
        </button>
        
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav bg-success">
               <li style="margin-top: 5px;" class="navbar-link link-dark">
                    <a id="lin" href="Home.php">Home</a></li><br>
              <li style="margin-top: 5px;" class="navbar-link link-dark">
                    <a id="lin" href="logOut.php">Log Out</a></li><br>
                   </ul>
                </div>
                </div>
                </nav><br><br><br><br><br><br>
                <div id="h7" >E-LIBRARY INTERNET REQUEST SEARCHED DATA</h7>
           <div><br>        
           <form id="searchForm" action="searched.php" method="post">
            FROM: <input style="border:2px solid; border-radius:5px;" type="text" name="searchFrom" placeholder="Date from..?" name="fromSearch">
            TO: <input style="border:2px solid; border-radius:5px;" type="text" name="searchTo" placeholder="Date to..?" name="toSearch">
            <input style="background-color:green; border-radius:5px;" type="submit" value="Search">
        </form><br>
        
        <table>
        <tr>
     <th>Full Name</th>
      <th>Index Number</th>
      <th>Contact</th>
      <th>Department</th>
      <th>Request</th>
      <th>SESSION ID</th>
      <th>Date/Time</th>
      <th>End Time</th>
      <th>Status</th>
    </tr>
            <?php
             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Include the connection file
                include "connection.php";
            
                $searchFrom = $_POST['searchFrom'];
                $searchTo = $_POST['searchTo'];
            
                $stmt = mysqli_prepare($con, "SELECT * FROM studentinfo WHERE DATE(registeredDate) BETWEEN ? AND ?");
                mysqli_stmt_bind_param($stmt, "ss", $searchFrom, $searchTo);
                mysqli_stmt_execute($stmt);
                $results = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($results)>0)
                {
                // Loop through the results and display them in a table row
                $count = 1;
                while ($row = mysqli_fetch_assoc($results)) {
                  echo "<tr>";
                  echo "<td>" . "<span style='color:red;'>" . $count . "</span>" . ". " . $row['fullName'] . "</td>";
                  echo "<td>" . $row['indexNumber'] . "</td>";
                  echo "<td>" . '+' . 233 . $row['contact'] . "</td>";
                  echo "<td>" . $row['department'] . "</td>";
                  echo "<td>" . $row['request'] . "</td>";
                  echo "<td>" . $row['sessionID'] . "</td>";
                  echo "<td id='date'>" . $row['registeredDate'] . "</td>";
                  echo "<td>" . $row['endTime'] . "</td>";
                  $picture = $row['stat'];
                  echo '<td>' . $row['statu'] .'<img id="picDisplay" src="'. $picture.'">' .'</td>';
                  echo "</tr>";
                  echo "</tr>";

                  $count++;
                }
              }else
              {
                echo "<script>alert('No data found!');</script>";
                
              }
            }
            ?>
          </table>
          
          <div class="print-button">
        <div class="row">
        <div class="col-sm-4">
            <button class="btn btn-danger" onclick="window.print()">Print Report</button>
        </div>
    </div>
    </div>
    
      
      </body>
</html>
