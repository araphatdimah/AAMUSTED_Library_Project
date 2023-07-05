<?php
  session_start();
   if(!isset($_SESSION['LibrarianPassword']))
    {
    header("location:logIn.php");
   }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students session</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
</head>
<body>
  
</body>
</html>
<style>
      body {
        background: url(bak.jpeg) no-repeat center  center/cover;
        position: relative;
        height:95vh;
      }
      
      .content {
        position: relative;
        z-index: 1;
        
      }
      @media (max-width: 767px) {
        ul.navbar-nav {
        background-color: #28a745 !important;
            }
        }
        @media (min-width: 768px) {
        ul.navbar-nav {
            background-color: #ffffff !important;
           }
        }

h6 { 
    font-family:Verdana, Geneva, Tahoma, sans-serif; 
    text-align: center; 
    color:rgba(138, 10, 48, 0.932);
    font-weight: 550;
    padding-right: 15px;
    margin-top:15px;
    
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
      
      #AddPoll{
            background-color: rgb(247, 204, 31);
            font-size: small;
            font-weight:bold;
            text-decoration: none;
        }
        #AddPoll:hover{
            background-color: red;
        }

      table 
      {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      text-align: left;
      padding: 8px;
      color:black;
    }
    th {
      background-color: rgb(247, 204, 31); 
      color: rgba(138, 10, 48, 0.932);;
    }
    tr:nth-child(even) {
      background-color: ghostwhite;
      
    }
    tr:nth-child(odd) {
      background-color:pink;
      
      
    }
</style>
<body>
  <div style="background-color: rgba(138, 10, 48, 0.932); width: 100%; height: 38px;" class="fixed-position fixed-top">
  
  </div>

<nav style="margin-top: 25px; background-color: white;" class="navbar navbar-expand-lg navbar-expand-xl fixed-top">
    
    <div style = "margin-left:5px;" class="container">
      <a href="Home.php" class="navbar-brand"><img style="width: 180px;" src="IMG-20230131-WA0033.jpg"></a>
      <h6>AAMUSTED LIBRARY</h6><br>
        <button style=" border: none;" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-label="Expand Navigation">
            <div><span class="navbar-toggler-icon bg-light navbar-nav-scroll"></span></div>
        </button>
        
        <div class="collapse navbar-collapse" id="nav">
            
            <ul class="navbar-nav bg-success">
            <li style="margin-top: 5px;"class="navbar-link link-dark">
                    <a id="lin" href="Home.php">Home</a></li>
              <li style="margin-top: 5px;" class="navbar-link link-dark">
                <a id="lin" href="logOut.php">Log out</a></li><br>
              <li style="margin-top: 5px;" class="navbar-link link-dark">
                  <a id="lin" href="libraryRules.php">Rules</a></li><br>
                 </ul>
                </div>
                </div>
                </nav><br><br><br><br><br><br>
          
                <div style="margin-left:8%;">
            <div style="width:90%; " class="card">
              <div style="background-color:green;" class="card-header text-white">
                <div style="text-align:center; font-weight:550">STUDENTS IN SESSION</div>
                
                <table>
                <tr>
                  <th>Full Name</th>
                  <th>Index Number</th>
                  <th>Contact</th>
                  <th>PC NO.</th>
                </tr>
               <?php 
                  
                  include "connection.php";
                  $stmt = mysqli_prepare($con, "SELECT * FROM student");
                  mysqli_stmt_execute($stmt);
                  $results = mysqli_stmt_get_result($stmt);
                  
                  while ($row = mysqli_fetch_assoc($results)) {
                    echo "<tr>";
                    echo "<td>" . $row['fullName'] . "</td>";
                    echo "<td>" . $row['indexNumber'] . "</td>";
                    echo "<td>" .'+'. 233 . $row['contact'] . "</td>";
                    echo "<td>". $row['selectedPC']. "</td>";
                    echo "</tr>";
                  }
                  ?>

              </table><br>

              </div>
             
</body>
</html>