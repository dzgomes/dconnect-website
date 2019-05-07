<?php 

    if (array_key_exists("submit", $_POST)) {
        
        $error = "";
        
         $link = mysqli_connect("localhost", "root", "password", "dconnect");
        
    
        if(mysqli_connect_error()){
            
            die("Database connection error");
            
            echo "error";
        }
        
        if(!$_POST['email']){
            
            $error.= "Email address is required";
                
        }
        
        if (!$_POST['password']) {
            
            $error.= "Password is required";
            
        }
        
        if($error !=""){
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            
            $query = "SELECT userID FROM `users` WHERE emailAddress ='".mysqli_real_escape_string($link, $_POST['email'])."'LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                $error = "This email address is taken";
                
            } else {
                
                $query = "INSERT INTO `users` (`firstName`, `lastName`, `emailAddress`, `city`, `password`, `userStatus`) VALUES ('".mysqli_real_escape_string($link, $_POST['firstName'])."','".mysqli_real_escape_string($link, $_POST['lastName'])."', '".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['city'])."', '".mysqli_real_escape_string($link, $_POST['password'])."', 0)";
                
                if (!mysqli_query($link, $query)) {
                    
                    $error = "<p>Could not sign you up</p>";
                        
                } else {
                    
                    $query = "UPDATE `users` SET password= '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE userID =".mysqli_insert_id($link)." LIMIT 1";
                    
                    mysqli_query($link, $query);
                    
                    
                    header('Location: student.php');
                    
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
    
    <link rel="stylesheet" type="text/css" href="style/register.css?version-51">
    
    <link rel="stylesheet" type="text/css" href="style/footer.css?version=51">
    
    <link rel="stylesheet" type="text/css" href="style/tutorstyle.css?version=51">
       
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    
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
    
    
        <div class="middle-column">
          
        <p id="p-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras semper magna in scelerisque dictum. Ut vitae accumsan lectus. Phasellus semper accumsan turpis. Fusce risus arcu, pellentesque eu dapibus nec, congue eu urna. Nullam interdum neque vel ipsum dictum porttitor. Vivamus eu aliquet nunc. Nullam cursus blandit diam et fringilla. Quisque malesuada maximus malesuada. Integer fringilla interdum est, tincidunt luctus purus viverra ut. Curabitur tempus convallis mi a rutrum. Cras id accumsan sem. Donec id interdum est. Etiam tincidunt tincidunt enim, vitae facilisis libero bibendum et.</p>

        <p id="p-info">Donec convallis arcu sed sagittis egestas. Curabitur aliquet lorem ut iaculis tempus. Praesent convallis, nisi interdum tempor rutrum, lorem massa laoreet metus, id hendrerit lectus risus non lorem. Maecenas rhoncus est sollicitudin nisi vestibulum, nec varius ex suscipit. Integer libero ex, vehicula eu purus eu, sodales dapibus velit. Curabitur sit amet erat non nulla molestie feugiat. Suspendisse feugiat condimentum sapien ut malesuada. Pellentesque nec auctor erat, nec aliquam massa. Maecenas a augue non erat congue varius. Ut placerat erat et leo consequat ultrices. Vivamus id sollicitudin orci, ut eleifend metus. Vestibulum eget nisi felis. Suspendisse tristique turpis rutrum libero iaculis, in sagittis lacus ornare. Donec tortor tortor, aliquet sit amet ullamcorper laoreet, accumsan pulvinar purus.</p>
           
            
            
            

                
            
            <div id="profile-menu">
                     
                     <style scoped="true">
                @import "https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
                    
                         
                    </style>
                      
                <div id="reg-menu-icons">
                       
                    <div id="register1">
                     
                        <form method="post">
                                      
                                     <h1> Join Us</h1><br>
                                      
                                      First Name

                                      <input type="firstName" name="firstName" ><br>
                                      
                                      Last Name
                                      
                                      <input type="lastName" name="lastName" ><br>
                                      
                                      City
                                      
                                      <input type="city" name="city" ><br>

                                      Email:

                                      <input type="email" name="email" ><br>

                                      Password:

                                      <input type="password" name="password"><br>

                                      <input type="submit"  name="submit" value="Register">

                                </form>
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