
<?php


	session_start();

	if (!isset($_SESSION['userStatus'])) {

		exit();
	}
	

	if ($_SESSION['userStatus'] == 0) {
  	header('Location:  student.php');
        
        
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

            <a href="index.php">
               
                <img src="images/D.connect-03.jpg" width="350px">
                
            </a>
    
    
        </div>
    
        </div>

        <?php
        
        include('includes/menu.php');
        
        
        ?>

    <div class="middle-section">
    
            <style scoped="true">
               
                @import "style/tutorstyle.css"
                
            </style>
    
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
                        
                        <h2><?php echo $_SESSION['city']  ?></h2>
                        
                    </div>
                    
                    <div id="profile-skills">
                    
                    <p>
                    
                    <strong>Skills:</strong>
                     
                        <h2><?php echo $_SESSION['tutorSkills']?></h2>
                    
                    </p>
                          
                 </div> 

                </div>
                

                
            </div>
            
            <div id="profile-menu">
                      
                <div id="prof-menu-icons">
                       
                     <div id="create-group">
   
                        <a href ="new-group.php">
                         
                            <p id="menu-p">Create a Group </p>
                             
                         </a><br>
                         
                         <a href ="view-groups.php">
                            
                             <p id="menu-p">View Groups </p>
                             
                        </a><br>
                         
                         <a href ="">
                            
                             <p id="menu-p">Edit Profile </p> 
                             
                         </a><br>
                         
                         <a href ="logout.php">
                            
                             <p id="menu-p">Log Out </p>
                             
                        </a><br>

                     </div> 

                  </div>    
                
            </div>
            
        </div>


    </div>


        <?php 
        
        include('includes/footer.php');
        
        ?>

   

    
</body>
</html>