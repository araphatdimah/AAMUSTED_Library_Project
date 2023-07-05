<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    include "connection.php";
    $email=$_POST['email'];
	$password=$_POST['password'];

    if(!empty($email) && !empty($password))
	{
        $stmt = mysqli_prepare($con, "SELECT * FROM librarian WHERE email = ? AND password = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($results);

         if(mysqli_num_rows($results)>0)
        {		
         $_SESSION['LibrarianPassword']=$data['password'];
		 header("location:libarianPage.php");
			die;
		}
		else
		{
			echo "Wrong email or password";
            
		}
	}
    else
    {
        echo "Error: " . mysqli_error($con);
    }
    
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<style>
      body 
      {
        background: url(image2.jpg) no-repeat center  center/cover;
        position: relative;
        height:95vh;
      }
      
      #login-container 
       {
			margin-top: 120px;
			max-width: 400px;
			padding: 40px;
			background-color: rgb(238, 173, 34);
			border-radius: 10px;
			box-shadow: 0px 10px 50px rgba(0, 0, 0, 0.3);
		}

		.form-group 
        {
			margin-bottom: 20px;
		}
		.form-control {
			border-radius: 0px;
		}

		.btn-primary 
        {
			border-radius: 0px;
		}

		#btns-container{
            text-align: center;
            background-color: rgba(203, 6, 6, 0.882);
            height: 35vh;
        }

        label
        {
		color:black;
		font-size:1.0rem;
        font-weight:bold;		
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
     

</style>

<body style="background-color:ghostwhite;">
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
                  <a id="lin" href="about.php">About</a></li><br>
              <li style="margin-top: 5px;" class="navbar-link link-dark">
                  <a id="lin" href="libraryRules.php">Rules</a></li>
            </ul>
        </div>
    </div>
</nav><br><br>

<div class="container" id="login-container">
		<h4 style="text-align: center; background-color:
		black; color: white; padding: 2px; font-weight: bold;" class="mb-4">Librarian Log in</h4>
		<div id="btns-container" class="container">
		<form action="logIn.php" method="post">
			<div class="form-group">
				<label for="username">EMAIL</label>
				<input type="text" class="form-control" name="email" placeholder="Enter your email address" required>
			</div>
			<div class="form-group">
				<label for="password">PASSWORD</label>
				<input type="password" class="form-control" name="password" placeholder="Enter your password" required>
			</div>
			<input style ="background-color:green;" type="submit" value="Log in" class="btn">
		</form>
		</div><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
