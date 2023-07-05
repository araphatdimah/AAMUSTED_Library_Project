<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
</head>
<body>
  
</body>
</html>
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
    color:rgba(138, 10, 48, 0.932);
    font-weight: 550;
    padding-right: 10px;
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
      <h6>AAMUSTED E-LIBRARY</h6><br>
        <button style=" border: none;" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-label="Expand Navigation">
            <div><span class="navbar-toggler-icon bg-light navbar-nav-scroll"></span></div>
        </button>
        
        <div class="collapse navbar-collapse" id="nav">
            
            <ul class="navbar-nav bg-success">
            <li style="margin-top: 5px;" class="navbar-link link-dark">
                        <a id="lin" href="signUp.php">REGISTER</a></li><br>
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
    </nav><br><br><br><br><br><br>
            <div style="margin-left:10%; width:80%" class="col-lg-4 mt-3">
                <div class="card">
              <div style="background-color:rgba(138, 10, 48, 0.932);" class="card-header text-white">
                <div style="text-align:center;">FOR OFFICIALS ONLY</div>
              </div>
              <ul class="list-group list-group-flush">
                <li style="text-align:center;" class="list-group-item">
                <button style="margin-top: 3px; width:110px;" id="AddPoll"
                 class="btn btn-outline-dark"><a style="text-decoration:none; color:black"
                 href="logIn.php" class="card-link">Log In</a></button>
                 <br>
                </li>
                <li style="text-align:center;" class="list-group-item">
                <button style="margin-top: 3px; width:110px;" id="AddPoll"
                 class="btn btn-outline-dark"><a style="text-decoration:none; color:black"
                 href="libraryRules.php" class="card-link">Rules</a></button>
                </li>
              </ul>
            </div>
          </div>
        </div>
       
</body>
</html>