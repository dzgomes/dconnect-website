<?php


	session_start();
    
    $userID ="";


	if (!isset($_SESSION['userStatus'])) {

		exit();
	}	

	echo "</br>".$_SESSION['userStatus'];
	

	if ($_SESSION['userStatus'] == 1) {
  	header('Location:  student.php');
        
    }

    if (array_key_exists("submit", $_POST)) {
        
        $error = "";
        
        $link = mysqli_connect("localhost", "root", "password", "dconnect");
        

        $userID = $_SESSION['userID'];
        $groupID = $_SESSION['groupID'];
        $usersCounter = $_SESSION['usersCount'];
        $maxMembers = $_SESSION['maxMembers'];
        
        echo $usersCounter;
        
        echo $maxMembers;
        
        if ($usersCounter < $maxMembers) {
        
        $query = "INSERT INTO `groupList` (`userID`, `groupID`) VALUES ('$userID', '$groupID')";
        
        mysqli_query($link, $query);
        
        }
    
        if(mysqli_connect_error()){
            
            die("Database connection error");
            
            echo "error";
        }
        
        
        
            
 }

header('Location: results.php')


?>