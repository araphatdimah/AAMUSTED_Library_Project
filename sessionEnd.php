<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $fullName = $_POST['fullName'];
    $indexNumber = $_POST['indexNumber'];
    $sessionID = $_POST['sessionID'];
    $status = "Logoff";

    $inActive = 'uploads/inactive.png'; // Replace with the desired location and file name
  //$statusInactive = $status . $newPath;
    $stmt9 = mysqli_prepare($con, "SELECT signout.Fid FROM signout WHERE Fid = ?");
            mysqli_stmt_bind_param($stmt9, "s", $sessionID);
            mysqli_stmt_execute($stmt9);
            $signedinFid = mysqli_stmt_get_result($stmt9);


    $stmt10 = mysqli_prepare($con, "SELECT * FROM signout WHERE Fid = ?");
            mysqli_stmt_bind_param($stmt10, "s", $sessionID);
            mysqli_stmt_execute($stmt10);
            $signedInAlready = mysqli_stmt_get_result($stmt10);
            $rows = mysqli_fetch_assoc($signedInAlready);
            $rowName = $rows['fullName'];
           
if(mysqli_num_rows($signedinFid)>0)
{
  echo "<script>alert('ERROR! This session ID: $sessionID for $rowName has already been signed out.');</script>";
}
else
{

    if (!empty($fullName) && !empty($indexNumber)) {

        $stmt6 = mysqli_prepare($con, "SELECT * FROM studentinfo");
        mysqli_stmt_execute($stmt6);
        $stdResults = mysqli_stmt_get_result($stmt6);
        $matchFound = false;

        while ($stdResults2 = mysqli_fetch_assoc($stdResults)) {
            if ($stdResults2['fullName'] == $fullName && $stdResults2['indexNumber'] == $indexNumber
                && $stdResults2['sessionID']==$sessionID) {
                $matchFound = true;
                break;
            }
        }

        if ($matchFound) {

            $stmt2 = mysqli_prepare($con, "INSERT INTO signout(fullName, indexNumber, Fid, stat, statu) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt2, "sssss", $fullName, $indexNumber, $sessionID, $inActive, $status);

           /* */
            
            if (mysqli_stmt_execute($stmt2)) {
                echo "<script>alert('Logged out successfully');</script>";
                echo "<script>window.location.href = 'Home.php';</script>";
            }
            
           /* elseif($signedInResult['endTime'] !="")
            {
              $alreadyOutDate = $signedInResult['endTime'];
              echo "<script>alert( $alreadyOutDate');</script>";
            } */
        } else {
            echo "<script>alert('Wrong name, or index number, or Session ID.');</script>";
        }

        mysqli_stmt_reset($stmt6); // Reset the prepared statement for subsequent executions

    } else {
        echo "<script>alert('Student name or index number fields cannot be empty.');</script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session End</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
</head>
<style>
      body {
        background: url(image2.jpg) no-repeat center  center/cover;
        position: relative;
        height:95vh;
      }
      
      .content {
        position: relative;
        z-index: 1;
        
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
                  <a id="lin" href="about.php">About</a></li><br>  
                 <li style="margin-top: 5px;" class="navbar-link link-dark">
                  <a id="lin" href="libraryRules.php">Rules</a></li>
      </ul>
    </div>
    
    </div>
    </nav><br><br><br><br><br><br>
    <div>
              <button style="color: black; font-size:1.0rem; font-weight:550;
               border:2px solid; border-color:red; border-radius:5px; font-weight:550;"
               class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#launch2">
              END SESSION  
            </button>
            <div class="modal fade" id="launch2">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div style="color: black; font-size: 1.1rem; font-weight: bold;" class="modal-header">You're signing out:
                        <button style="color: red" class="btn-close bg-danger" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="sessionEnd.php" method="post">
                                <div class="form-group">
                                    <label for="fullName">Student Name<span style="color:red";>*</span></label>
                                    <input type="text" class="form-control" name="fullName" placeholder="Enter your full name" required>
                                </div><br>
                                <div class="form-group">
                                    <label for="indexNumber">Index Number<span style="color:red";>*</span></label>
                                    <input type="number" class="form-control" name="indexNumber" placeholder="Enter your index number" required><br>
                                    <input type="text" class="form-control" name="sessionID" placeholder="Enter ID" required><br>
                                    <input type="submit" value="Sign out" class="btn btn-danger">
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
            
</body>
<html>