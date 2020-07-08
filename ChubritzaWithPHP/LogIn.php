 <?php
 include_once 'homebar.php';
 ?>
    <title>Log In</title>
        <article>
            <h1>
                Log In
        <hr />
        </h1>
            <fieldset>
         <label>
              
             <form id = "form_login" action="includes/login_inc.php" method = "POST">
                 <p>Email: 
                 
            <input  type="text" name="email" size="15"    maxlength="50" id="input1" /> 
                </label>
                 
                <label>
                 <p>Password: 
                  <input type="password" name="password" size="15"    maxlength="30" id="input2" /> 
                    </label> 
             
             <label>
             </label>
             <button type="submit" name = "submit"style="height:50px;width:200px">Continue</button>
             
             </form>
              <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


        if (strpos($fullUrl, "login=empty") == true) 
        {
            echo "<p class = 'error'>Please fill in all fields!</p>";
            exit();
        }
        elseif (strpos($fullUrl, "login=error") == true) 
        {
            echo "<p class = 'error'>No such account/wrong password!</p>";
            exit();
        }
        
         

        ?>
             </fieldset>
       
        </article>
<?php
 include_once 'footer.php';
 ?>