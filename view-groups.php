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

    
        
        $error = "";
        
        $link = mysqli_connect("localhost", "root", "password", "dconnect");
        

        $userID = $_SESSION['userID'];
        
        $query = "SELECT * FROM `groupInfo` WHERE groupAdmin = $userID ";
        
        mysqli_query($link, $query);
        
        $result = mysqli_query($link, $query);
        
        $rows = ($result);

        
        
    
        if(mysqli_connect_error()){
            
            die("Database connection error");
            
            echo "error";

        

            
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
            
            <div id="table-result">
                    
                                       
            <style scoped="true">
               
                @import "style/table.css"
                    
                    
                
            </style>  
 

            <?php 
                
                
            echo "<table>";
	        echo "<tr><th>Group Name</th><th>Description</th><th>Location</th><th>Subject</th><th>Date</th><th>Max Members</th</tr>";
		    foreach($rows as $row){ echo "<tr>";
                                   
                                   
            $groupID = $row['groupID'];
			$_SESSION["groupID"] = $groupID;    
                                   
			echo "<td>";
			echo $row['groupName'];
			echo "</td>";
			echo "<td>";
			echo $row['groupDescription']; echo "</td>";
			echo "<td>";
			echo $row['groupLocation']; echo "</td>";
			echo "<td>";
			echo $row['groupSubject'];
			echo "</td>";
            echo "<td>";                       
            echo $row['groupTime'];
			echo "</td>";
            echo "<td>";
            echo $row['maxMembers'];
			echo "</td>";                       
			echo "<td>";
			echo "<a href=delete-process.php?id=".">Delete</a>"; 
            echo "</td>";
			echo "</tr>";
                     
			}
                    
			echo "</table>";
 
                
            ?>     
            
            <br>
            <br>
            <a href="tutor.php" class="btn btn-default">Go back</a>  
   

            </div>    
                
        </div>
            
  </div>
        
        


 




        <?php 
        
        include('includes/footer.php');
        
        ?>
   

    
</body>
</html>