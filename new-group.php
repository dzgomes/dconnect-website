<?php


	session_start();
    
    $userID ="";


	if (!isset($_SESSION['userStatus'])) {

		exit();
	}	

	echo "</br>".$_SESSION['userStatus'];
	

	if ($_SESSION['userStatus'] == 0) {
  	header('Location:  student.php');
        
    }

    if (array_key_exists("submit", $_POST)) {
        
        $error = "";
        
        $link = mysqli_connect("localhost", "root", "password", "dconnect");
        

        $userID = $_SESSION['userID'];
        
        $query = "INSERT INTO `groupInfo`(`groupName`, `groupDescription`, `groupLocation`, `groupSubject`, `groupTime`, `maxMembers`, `groupAdmin`) VALUES ('".mysqli_real_escape_string($link, $_POST['groupName'])."','".mysqli_real_escape_string($link, $_POST['groupDescription'])."','".mysqli_real_escape_string($link, $_POST['groupLocation'])."','".mysqli_real_escape_string($link, $_POST['groupSubject'])."','".mysqli_real_escape_string($link, $_POST['groupTime'])."','".mysqli_real_escape_string($link, $_POST['maxMembers'])."', '$userID')";
        
        mysqli_query($link, $query);
        
        
    
        if(mysqli_connect_error()){
            
            die("Database connection error");
            
            echo "error";
        }
        
        
        header('Location: new-group.php');
            
 }


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" type="text/css" href="style/stylesheet.css?version=51">
    
    <link rel="stylesheet" type="text/css" href="style/footer.css?version=51">
    
    <link rel="stylesheet" type="text/css" href="style/tutorstyle.css?version=51">
       
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,800' rel='stylesheet' type='text/css'>
    

    

       

        

    
    <title>D.CONNECT</title>
    
    </head>

    <body>  
      
        


        <div id="topbar">   
           
           
        <div id="logo">

            <a href="index.html">
               
                <img src="images/D.connect-03.jpg" width="350px">
                
            </a>
    
    
        </div>
    
        </div>

        <?php
        
        include('includes/menu.php');
        
        
        ?>

    <div class="middle-section"> 
    
        <div class="middle-column">
           
            <div id="profile-pic"> 
            
            </div>
            
            <div id="profile-header"> 
            
                <div id="profile-name"> <h2><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']   ?> </h2>
                    
                </div>

                <div id="profile-info">

                    <div id="profile-rating"> 

                       
                        <h2> 
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span> 
                        
                        </h2>


                    </div>
                    
                    <div id="profile-city">
                        
                        <h2>Dublin, Ireland</h2>
                        
                    </div>
                    
                    <div id="profile-skills">
                    
                    <p>
                    
                    <strong>Skills:</strong>
                     
                    JAVA, PYTHON, HTML, CSS, DATABASES, HARDWARE, NETWORKING
                    
                    </p>
                          
                 </div> 

                </div>
                

                
            </div>
            
            <div id="profile-menu">
                      
                <div id="prof-group-icons">
                       
                    <form method="post" >
        
                      Group Name:

                      <input type="text" name="groupName" >

                      Description:

                      <input type="text" name="groupDescription"> 

                      <br>
                      <br>

                      Group Max:

                      <input type="text" name="maxMembers">

                      Subject:

                      <input type="text" name="groupSubject">

                      <br>
                      <br>

                      Location:

                      <input type="text" name="groupLocation">
                      
                      Time:

                      <input type="text" name="groupTime">
                      

                      <input type="submit"  name= "submit" value="Create Group"> 
                      <br>
                      <br>
                      <a href="tutor.php" class="btn btn-default">Go back</a>



                    </form>
   
               </div>          

            </div>    
                
        </div>
            
  </div>
        
        


 




        <?php 
        
        include('includes/footer.php');
        
        ?>
   

    
</body>
</html>