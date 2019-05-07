<?php 

    if (array_key_exists("submit", $_POST)) {
        
        $error = "";
        
         $link = mysqli_connect("localhost", "root", "password", "dconnect");
        
    
        if(mysqli_connect_error()){
            
            die("Database connection error");
        }
        
        if(!$_POST['email']){
            
            $error = "Email address is required";
                
        }
        
        if (!$_POST['password']) {
            
            $error = "Password is required";
            
        }
        
        if($error !=""){
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            
            $query = "SELECT userID FROM `users` WHERE emailAddress ='".mysqli_real_escape_string($link, $_POST['email'])."'LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                $error = "This email address is taken";
                
            } else {
                
                $query = "INSERT INTO `users` (`firstName`, `lastName`, `emailAddress`, `city`, `password`, `userStatus`) VALUES ('".mysqli_real_escape_string($link, $_POST['firstName'])."','".mysqli_real_escape_string($link, $_POST['lastName'])."', '".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['city'])."', '".mysqli_real_escape_string($link, $_POST['password'])."', 1)";
                
                if (!mysqli_query($link, $query)) {
                    
                    $error = "<p>Could not sign you up</p>";
                        
                } else {
                    
                    $query = "UPDATE `users` SET password= '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE userID =".mysqli_insert_id($link)." LIMIT 1";
                    
                    mysqli_query($link, $query);
                    
                    
                    header('Location: tutor.php');
                    
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
    
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">-->
    

    

       

        

    
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
          
        <p id="p-info">Tutors make use of their knowledge and expertise in a specific area to teach students outside a classroom. 
        A tutor in D.connect will be a person who gives  instruction in small group classes. The purpose of tutoring is to help students help themselves, or to assist or guide them to the point at which they become an independent learner.
        You have to be motivated and have a good knowledge of teaching resources. Wanting to share knowledge and skills is what really counts when you decide to do this job.
        Your lessons need to be instructional and provide a learning experience that makes adults happy they’re continuing their learning. </p>

        <p id="p-info">Content knowledge is an essential ingredient for a tutor; however, to be truly effective, a tutor must combine content knowledge with empathy, honesty and humor. Empathy requires a tutor to "read" the emotional states, attitudes and perceptions of their students. Empathy is the ability to see others from their personal frame of reference, and to communicate this understanding to the person involved. In order for tutors to establish a supportive relationship with their students, tutors must be open and honest. Students are often reluctant to talk with a stranger about their academic problems. If a tutor is perceived as genuine and having a strong desire to listen, students will be more willing to open up and discuss their problems. Humor can also play an important part in a tutoring session. Humor can reduce tension. Shared laughter is a powerful way to reinforce learning. Humor can set students at ease and increase rapport. Humor can also be used to compliment, to guide or to provide negative feedback in a positive manner.</p>
          
          <p id="p-info">In addition, a successful tutor demonstates a caring attitude. Caring consists of being organized for the tutoring session, being punctual, establishing a learning relationship with the student, developing unique tutoring strategies, and becoming familiar with the learning process. Ultimately, tutoring is sharing yourself with another student in a way that makes a difference in both your lives.</p>
           
            
            
            

                
            
            <div id="profile-menu">
                     
                     <style scoped="true">
                @import "https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
                    
                         
                    </style>
                      
                <div id="reg-menu-icons">
                       
                     <div id="register1">
   
                        <form method="post" align= "right">
                                      
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