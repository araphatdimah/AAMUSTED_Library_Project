<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include the connection file
    include "connection.php";

    // Get the user inputs
    $fullName = $_POST['fullName'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $indexNumber = $_POST['indexNumber'];
    $department = $_POST['department'];
    $request = $_POST['request'];
    $stat = "Active";
    
    //$uploadedFile = $_FILES['file']['tmp_name']; // Assuming you have a file input named 'file'
  $active = 'uploads/active.png'; // Replace with the desired location and file name
  //$statusActive = $stat . $newPath;
//if (move_uploaded_file($uploadedFile, $newPath)) {
    // File moved successfully, proceed with the database insertion
    // You can also perform additional checks or modifications here, like resizing the image
//} 

    $text = "";
    $num = rand(6, 10);
    for ($i = 0; $i < $num; $i++) {
        $text .= rand(0, 9);
    }
    $userID = $text;

    

$firstTwoLetters = substr($fullName, 0, 2);
$lastTwoLetters = substr($fullName, -2);

$sessionID = $firstTwoLetters . $userID . $lastTwoLetters;



    // Validate the user inputs
    if (empty($fullName) || empty($indexNumber)) {
        echo "<script>alert('Name or index number field(s) cannot be empty');</script>";

    } else {
        $stmt3 = mysqli_prepare($con, "SELECT * FROM studentinfo WHERE fullName = ? AND indexNumber = ?");
        mysqli_stmt_bind_param($stmt3, "ss", $fullName, $indexNumber);
        mysqli_stmt_execute($stmt3);
        $results = mysqli_stmt_get_result($stmt3);
        

        $stmt4 = mysqli_prepare($con, "SELECT * FROM signout WHERE fullName = ? AND indexNumber = ?");
        mysqli_stmt_bind_param($stmt4, "ss", $fullName, $indexNumber);
        mysqli_stmt_execute($stmt4);
        $results3 = mysqli_stmt_get_result($stmt4);
        $matchSeen = false;
        
        while(@$results2 = mysqli_fetch_assoc($results))
        {
        if (
          
              //@$results2['fullName'] != @$results4['fullName']
              //|| @$results2['indexNumber'] != @$results4['indexNumber']
             @$results2['statu']==$stat && @$results2['fullName'] ==$fullName
              && @$results2['indexNumber'] == $indexNumber
             /* && (
                  !empty(@$results2['fullName'])
                  && empty(@$results4['fullName'])
                  && !empty(@$results2['indexNumber'])
                  && empty(@$results4['indexNumber'])
              ) */
          
      ) {
        $matchSeen = true;
          echo "<script>alert('$fullName or $indexNumber is already signed in.');</script>";
          break;
      } }     
         if(!$matchSeen) {
           /* $prefix = "LPC";

            // Check if there are available PCs in the session
            if (!isset($_SESSION['selectedPCs'])) {
                $_SESSION['selectedPCs'] = [];
            }

            $selectedPCs = $_SESSION['selectedPCs'];
            $availablePCs = array_diff([05, 04, 03, 02, 01], $selectedPCs);
            
              if(!empty($availablePCs))
              {
              
                //$total = count($availablePCs);
                //$rand_num = rand(0, $total - 1);
                $length = count($availablePCs);
              for ($i=0; $i<$length; $i++)
              {
                $selectedPC = $availablePCs[$i];
              
                $assignedPC = $prefix . $selectedPC;
              }
                // Add the selected PC to the list of already selected PCs
                $selectedPCs[] = $selectedPC;
                $_SESSION['selectedPCs'] = $selectedPCs; */ 
                
               // $stmt = mysqli_prepare($con, "INSERT INTO student (userID, fullName, contact, indexNumber, department, request, selectedPC) VALUES (?, ?, ?, ?, ?, ?, ?)");
                //mysqli_stmt_bind_param($stmt, "ssssssi", $userID, $fullName, $contact, $indexNumber, $department, $request, $selectedPC);
                $stmt1 = mysqli_prepare($con, "INSERT INTO studentinfo (userID, fullName, contact, gender, indexNumber, department, request, sessionID, stat, statu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt1, "ssssssssss", $userID, $fullName, $contact, $gender, $indexNumber, $department, $request, $sessionID, $active, $stat);
              
                //if (!empty($selectedPC)) {
                  if ( mysqli_stmt_execute($stmt1)) {
                      // Student data inserted successfully
                      $stmt = mysqli_prepare($con, "SELECT studentinfo.sessionID FROM studentinfo WHERE studentinfo.fullName = ? AND studentinfo.userID = ? ");
                      mysqli_stmt_bind_param($stmt, "ss", $fullName, $userID);
                      mysqli_stmt_execute($stmt);
                      $idResult = mysqli_stmt_get_result($stmt);
                      $row = mysqli_fetch_assoc($idResult);
                      $sessionResults = $row['sessionID'];
                      
                      
                      echo "<script>alert('Hi $fullName. Your registration is successful. Please, note down your session ID: <span style=\"font-weight: bold;\"> $sessionResults</span>');</script>";
                    } else {
                        //echo "MySQL Error: " . mysqli_error($con);
                        //die;
                      echo "<script>alert('Error! Please cross-check your data.');</script>";
                      
                      }
                     } /* else {
                  // No available PCs
                  echo "<script>alert('All available PCs are in use at the moment.');</script>";
                  } */

                  
                } /*else {
                  // No available PCs
                  echo "<script>alert('All available PCs are in use at the moment.');</script>";
                  } */

              }
                
                
                  ?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Lab Form</title>
    <head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script>
        function capitalizeFirstLetter(input) {
          // Split the input value by spaces
          var words = input.value.toLowerCase().split(' ');
        
          // Capitalize the first letter of each word
          for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
          }
        
          // Join the words and set the updated value in the input field
          input.value = words.join(' ');
        }
</script>

  
</head>

<style type="text/css">
	
	#Inputs {
  background-color: black;
  margin: auto;
  margin-top: 120px;
  font-weight: bold;
  padding: 20px;
  max-width: 700px;
  border-radius: 10px;
}

@media screen and (max-width: 768px) {
  #Inputs {
    margin-top: 160px; /* Adjusted margin for smaller screens */
    width:92%;
  }
}

@media screen and (max-width: 480px) {
  #Inputs {
    margin-top: 200px; /* Further adjustmentfor even smaller screens */
    width:97%;
  }
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
    font-weight: 550;
    padding-right: 15px;
    margin-top:15px;
    
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

</style>

<body style="background-color:rgba(138, 10, 48, 0.932);">
  <div style="background-color: rgba(138, 10, 48, 0.932); width: 100%; height: 38px;" class="fixed-position fixed-top">
  
  </div>
  <nav style="margin-top: 25px; background-color: white; border-bottom:1px solid; border-color:rgba(138, 10, 48, 0.932);" class="navbar navbar-expand-lg navbar-expand-xl fixed-top">
    
    <div style="margin-left:5px"; class="container">
      <a href="Home.php" class="navbar-brand"><img style="width: 180px;" src="IMG-20230131-WA0033.jpg"></a>
      <h6>E-LIBRARY INTERNET REQUEST FORM</h6><br>
        <button style=" border: none;" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-label="Expand Navigation">
            <div><span class="navbar-toggler-icon bg-light navbar-nav-scroll"></span></div>
        </button>
        
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav bg-success">
            <li style="margin-top: 5px;" class="navbar-link link-dark">
                    <a id="lin" href="Home.php">HOME</a></li><br>
               <li style="margin-top: 5px;" class="navbar-link link-dark">
                      <a id="lin" href="about.php">ABOUT</a></li><br>
                     <li style="margin-top: 5px;" class="navbar-link link-dark">
                      <a id="lin" href="libraryRules.php">RULES</a></li><br>
                      <li style="margin-top:5px;" class="navbar-link link-dark">
                    <a id="lin" href="sessionEnd.php">SIGN OUT</a></li><br>
                  </li>
                     </ul>
                </div>
                </div>
                </nav>


	<div id="Inputs">
		<div style="text-align: center; font-weight: bold; font-size: 20px; color:white;">COMPUTER LAB FORM</div><br>
			<form action="signUp.php" method="post">

		<div class="heading" style="border-top:2px solid; border-color:red;">
		<h6 style="color:red;">STUDENT'S PARTICULARS</h6>
		<div class="input-field">
    <div style="color:white">Full Name:</div><input name="fullName" type="text" oninput="capitalizeFirstLetter(this)" pattern="[A-Za-z\s]+" placeholder="Full name of student" class="form-control">

		</div>
		<div class="input-field">
		<div style="color:white">Contact:</div> <input name="contact" type="text" pattern="[0-9]{10}" maxlength="10" placeholder="Enter your mobile number" class="form-control">

		</div><br>
    <label style="color:white;" for="department">Gender:</label>
    <select style="width:70%;" id="gender" name="gender" required>
      <option></option>
      <option>Male</option>
      <option>Female</option>
      <option>Other</option>
   </select><br>
    <div class="input-field">
		<div style="color:white">Index Number:</div> <input name="indexNumber" type="text" pattern="[0-9]{10}" maxlength="10" placeholder="Enter your index number" class="form-control">
		</div><br>
    <label style="color:white;" for="department">Choose Your Department:</label>
    <select id="department" name="department" required>
      <option></option>
      <option>Information Technology Education (ITE)</option>
      <option>Mathematics Education</option>
      <option>Accounting Studies</option>
      <option>Management Studies</option>
      <option>Construction & Wood Technology Education</option>
      <option>Automotive & Mechnical Technology Education</option>
      <option>Electrical & Electronics Technology Education</option>
      <option>Catering & Hospitality Education</option>
      <option>Fashion & Textiles Design Education</option>
      <option>Languages Education</option>
      <option>Interdisciplinary Studies</option>
   </select>
   <br>
   <div class="input-field">
   <div style="color:white">Request:</div> <input name="request" type="text" pattern="[A-Za-z\s]+" placeholder="Enter your request details" class="form-control" required>
		</div>
    <div class="heading" style="border-top:2px solid; border-color:red;"><br>
      <div class="submit">
        <input type="submit" id="submit" value="Submit" class="btn btn-danger">                                  
        </div>
  </form>

  </div>
    
</body>
</html>