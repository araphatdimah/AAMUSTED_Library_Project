  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Service Form</title>
      <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
  </head>
  
  <style type="text/css">
	
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

<body style="background-color:ghostwhite;">
  <div style="background-color: rgba(138, 10, 48, 0.932); width: 100%; height: 38px;" class="fixed-position fixed-top">
  
  </div>
  <nav style="margin-top: 25px; background-color: white; border-bottom:1px solid; border-color:rgba(138, 10, 48, 0.932);" class="navbar navbar-expand-lg navbar-expand-xl fixed-top">
    
    <div style = "margin-left:5px;" class="container">
      <a href="Home.php" class="navbar-brand"><img style="width: 180px;" src="IMG-20230131-WA0033.jpg"></a>
      <h6>E-LIBRARY INTERNET RULES</h6><br>
        <button style=" border: none;" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-label="Expand Navigation">
            <div><span class="navbar-toggler-icon bg-light navbar-nav-scroll"></span></div>
        </button>
        
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav bg-success">
                <li style="margin-top: 5px;" class="navbar-link link-dark">
                    <a id="lin" href="Home.php">Home</a></li><br>
                    <li style="margin-top: 5px;" class="navbar-link link-dark">
                        <a id="lin" href="signUp.php">Register</a></li><br>
                <li style="margin-top: 5px;" class="navbar-link link-dark">
                    <a id="lin" href="logIn.php">Login</a></li><br>
                   <li style="margin-top: 5px;" class="navbar-link link-dark">
                      <a id="lin" href="about.php">About</a></li><br>
                    </ul>
                </div>
                </div>
   
                </nav><br><br><br><br><br><br><br><br>
   
        <h5 style="margin-left: 5%; width:90%; background-color: rgb(223, 223, 43);text-align: center; font-weight: bold; font-size: 20px;">Computer Use Regulations</h5>
        <ol style="margin-left: 5%; width:90%; background-color: rgba(138, 10, 48, 0.932); color:white; margin-top: -6px;">
            <li>The borrowing service is rendered to only registered users of the library.
            </li><br>
            <li>Priority shall be given to students engaged in academic and research work and on first come first served basis. In situations where demand for the library computers is high,
                 each user shall be given a time limit not exceeding four hours. </li><br>
            <li>Users shall not install or download any software or attempt to alter software configurations.
                users may save files or documents on a USB drive or cloud storage. Files saved to the hard drive shall be deleted on daily basis. </li><br>
            <li>The use of pen drives and other removable devices must be supervised by library staff. </li><br>
            <li>The use of library computers for watching movies, pornographic video and images, as well as playing and downloading any music videos and audio files is prohibited. </li>
            <li>Library computers shall not be used to visit online chat rooms or social media sites such as facebook, twitter, etc. </li><br>
            <li>Library staff may interrupt library clients using computers for non-academic purposes. Such computers shall be assigned to other users</li>
            <li>Food and drinks are not permitted in all IT installations </li><br>
            <li>The Library welcomes the use of laptops and other personal computing equipment by students, faculty, and staff.
                 Library students may connect personal equipment to the Library’s wireless network, which is available on all floors of the Library. Library clients may not unplug any of the Library’s equipment or electrical and ethernet cables.
                 Use of personal equipment, such as extension and power cords, must not pose a safety hazard for others. </li><br>

        </ol>


    <div>
        <h5 style="margin-left: 5%; width:90%; background-color: rgb(223, 223, 43);text-align: center; font-weight: bold; font-size: 20px;">General Rules</h5>
       <ol style="margin-left: 5%; width:90%; background-color: rgba(138, 10, 48, 0.932); color:white; margin-top: -6px;">
            <li>Silence must be observed in the Library </li><br>
            <li>Smoking is not permitted in the Library. </li><br>
            <li>Users must dress decently and behave in a manner that will not be offensive to other Library user</li><br>
            <li>No food including all types of drinks and fruits shall be brought into the Library except at designated areas. </li><br>
            <li>Readers mobile phones must be switched off or kept silent while in the Library </li><br>
            <li>Users should treat Library materials, equipment and facilities with care and report any defect or damage to the Library staff. </li><br>
            <li>The Library shall not be responsible for the safe keeping and any loss/damages of belongings left in the Library premises </li><br>
            <li>Every person using the Library shall have due regard to the right of others to use the Library in accordance with the Policy and shall not interfere with their use of the Library.</li><br>
            <li>Every person using the Library will comply with prescribed terms and conditions of use and all relevant University policies, procedures and codes of conduct.</li><br>
            <li>No person in the Library shall behave in a manner which is offensive to or unduly inconveniences other Library users or which causes or is likely to cause damage to any Library material or Library facility.</li><br>
            <li>Rights to use the Library are non-transferable.</li><br>
            <li>On demand by a member of the Library staff, any person leaving the Library shall present for inspection at the Library exit any materials, bags or receptacles being removed from the Library.</li>
            <li>No person may reserve a seat for a colleague.</li><br>
            <li>All articles brought into the Library shall be brought in at the sole risk of the person doing so. Articles left unattended for more than 10 minutes may be removed by the Library staff. Items left in public areas at the time the Library closes shall be cleared away by Library staff. The University and, in particular, the University 
                Librarian and the Library staff, shall have no responsibility for personal belongings brought into the Library.  </li>
               </ol>
               </p>
    </div>
    
</body>
</html>