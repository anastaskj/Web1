<?php 
include_once 'homebar.php'; 
?>

    <title>Sign Up</title>
        <article>
             <fieldset>
         <label>
             <p>
                
             <form name="SignUp" action="includes/SignUp_inc.php" method="POST" onsubmit="return AreYouSure();"> 
                 
                 <p>
                     Full name:  <input type="text" title = "First Name" name="firstName" size="15"    maxlength="30" id="firstName" />
                     <input type="text"   title="Last Name" name="lastName" size="15"    maxlength="30" id="lastName" /> 
                 
                 
                 </p>
                
             
                    <label>
                         <p>
                             Age:  <input type="text"  name="age" size="15"    maxlength="30" id="age" />
                             
                        </p>
                 
             </label>
             <label>
                         <p>Email:  <input type="text" name="email" size="15"    maxlength="30" id= "email" />
                             
                        </p>
             </label>
             <label>
                 <p>
                     Password:<input type="password"  name="password" size="15"    maxlength="30" id="password" /> 
                     
                 </p> 
             </label>
             <label>
                         <p>
                             Repeat password:  <input type="password" name="RepeatPassword" size="15" maxlength="30" id ="repeatpass" /> 
                         </p>
             </label>
                         
                  
          
            <p>
                <button type="submit"  name = "submit" style="height:50px; width:200px">Sign Up</button>
            </p>
          
       </form>
             
              <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


        if (strpos($fullUrl, "signup=empty") == true) 
        {
            echo "<p class = 'error'>Please fill in all fields!</p>";
            exit();
        }
        elseif (strpos($fullUrl, "signup=invalid") == true) 
        {
            echo "<p class = 'error'>Please use valid characters!</p>";
            exit();
        }
        elseif (strpos($fullUrl, "signup=email") == true) 
        {
            echo "<p class = 'error'>Please enter a valid email!</p>";
            exit();
        }
         elseif (strpos($fullUrl, "signup=usertaken") == true) 
        {
            echo "<p class = 'error'>Email already in use!</p>";
            exit();
        }
        elseif (strpos($fullUrl, "signup=success") == true) 
        {
            echo "<p class = 'error'>Registration successful!</p>";
            exit();
        }

        ?>
        </fieldset>
        </article>

       
<?php
include_once 'footer.php';
?>
       