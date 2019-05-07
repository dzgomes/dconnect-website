

<?php


	session_start();
    
    $userID ="";


	if (!isset($_SESSION['userStatus'])) {

		exit();
	}	

	echo "</br>".$_SESSION['userStatus']."<br>" ;

	

	if ($_SESSION['userStatus'] == 0) {
  	header('Location:  student.php');
        
    }
        
        $error = "";
        
        $link = mysqli_connect("localhost", "root", "password", "dconnect");
        


        $id = $_SESSION['groupID'];

        echo $id;

        $query = "DELETE FROM `groupInfo` WHERE `groupID` LIKE '%" . $id . "%'";

        mysqli_query($link, $query);

        

    
        if(mysqli_connect_error()){
            
            die("Database connection error");
            
            echo "error";
        }
        
        
      	header('Location:  view-groups.php');
            
 




?>