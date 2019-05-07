                <div id="login">

                    <form method="post" align= "right">

                          Username:

                          <input type="email" name="email" >
                          <span class = "error"><?php echo $emailError;?></span> 
                          Password:

                          <input type="password" name="password">
                          <span class = "error"><?php echo $passError;?></span> 
                          <input type="submit" name= "submit" value="Login">


                    </form>

                </div>