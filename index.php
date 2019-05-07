<?php 

    session_start();

        $passError = "";
        
        $emailError = "";

        $userStatus = null;

        

    if (array_key_exists("submit", $_POST)) {
        
        $error = "";
        

        
         $link = mysqli_connect("localhost", "root", "password", "dconnect");
        
    
        if(mysqli_connect_error()){
            
            die("Database connection error");
            
            echo "error";
        }
        
        if(!$_POST['email']){
            
            $emailError = "Email address is required<br>";
  
        }
        
        if (!$_POST['password']) {
            
            $passError = "Password is required<br>"; 
            
        }
        
        if($error !=""){
            
            $error = "<p>There were error(s) in your form:</p>".$error;

        }
        
        if($_POST['email'] || $_POST['password']) {
        
        $query = "SELECT * from `users` WHERE emailAddress =  '".mysqli_real_escape_string($link, $_POST['email'])."'";
        
        
        $result = mysqli_query($link, $query);
        
        $row = mysqli_fetch_array($result);
        
        if(array_key_exists("userID", $row)){
            
            $hashedPassword = md5(md5($row['userID']).$_POST['password']);
            

             $_SESSION['userStatus'] = $row['userStatus'];
             $_SESSION['firstName']  = $row['firstName'];
             $_SESSION['lastName']  = $row['lastName'];
             $_SESSION['city']  = $row['city'];
             $_SESSION['userID']  = $row['userID'];
             $_SESSION['email'] =$row['email'];
             $_SESSION['tutorSkills'] = $row['tutorSkills'];
            
             $userStatus = $_SESSION['userStatus'] ;
            
            
            if($hashedPassword == $row['password']) {
                
                if($row['userStatus'] == 0) {
                    
                    header("Location: student.php");

                    
                } else {
                    
                    header("Location: tutor.php");

                    
                }
            }
                
        }
    }
            
 }
        

?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" type="text/css" href="style/stylesheet.css?version=51">
    
    <link rel="stylesheet" type="text/css" href="style/footer.css?version=51">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    

    <title>D.CONNECT</title>
    
    </head>

    <body>

        <div id="topbar">   
           
           
                <div id="logo">

                    <a href="index.php">

                        <img src="images/D.connect-03.jpg" width="350px">

                    </a>

                </div>

                <?php
            
            
            if($userStatus == null) {

                
             include('includes/login.php');   
                
            } else {
                
                
            }
            
              
            ?>
    
            </div>

        <?php
        
            include('includes/menu.php');
        
        
        ?>

        <div id="frontpage">

            <div id="mural" align="left">
       
               <img id="mural-pic" src="images/people-network.jpg">
       
            </div>
       
        </div>

        <?php 
        
            include('includes/footer.php');
        
        ?>

</body>
</html>