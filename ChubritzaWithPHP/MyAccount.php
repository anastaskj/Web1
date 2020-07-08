<?php 
include_once 'homebar.php'; 
include 'includes/dbh_inc.php';
?>
    <title>My Account</title>
        <article>

            <h1> My account</h1><hr />
             
                 
                    <div class="accountDiv">
               <?php
               $email = $_SESSION['u_email'];
               $first = $_SESSION['u_first'];
               $last = $_SESSION['u_last'];
               $age = $_SESSION['u_age'];
               $id = $_SESSION['u_id'];
               echo "<div class = 'accountInfo'><p>Full name: $first $last </p> <p>Email: $email</p> <p>Age: $age years old</p> <p>Account number: $id </p> </div>";

                $select = "SELECT * FROM users";
                $result = mysqli_query($conn, $select);
                if (mysqli_num_rows($result) > 0) 
                {
                     mysqli_fetch_assoc($result);
                    
                        $id = $_SESSION['u_id'];
                        $sqlImg = "SELECT * FROM profile_image WHERE userid = '$id'";
                        $resultImg = mysqli_query($conn, $sqlImg);
                        while($rowImg = mysqli_fetch_assoc($resultImg))
                        {  
                            if($rowImg['picstatus'] == 0)
                            {
                               echo '<img src="uploads/profile'.$id.'.jpg?'.mt_rand().'" align = "left" class = "profilePicture">';
                            }
                            else
                            {
                                echo '<img src="uploads/profiledefault.png" align = "left" class = "profilePicture">';
                            }
                        }
                    
                }
              
               ?>
               <p> <a href ="includes/LogOut_inc.php" class = "pLogout" >Logout</a> </p>
                <form action = "uploadPhoto.php" method = "POST" enctype = "multipart/form-data" class = uploadPhotoForm>
                        <input type="file" name = "file">
                        <button type="submit" class = "uploadPhotoButton" name = "submit">Change Profile Picture</button>
                    </div>

             <button onclick = "visitSaved();" type="button"  style="height:50px;width:200px" >Saved recipes</button>
             <button onclick = "visitUpload();" type="button" style="height:50px;width:200px">Upload a recipe</button>
             <button onclick = "visitRecipes();" type="button" style="height:50px;width:200px">My recipes</button>   

            
           
            
        </article>
<?php 
include_once 'footer.php'; 
?>