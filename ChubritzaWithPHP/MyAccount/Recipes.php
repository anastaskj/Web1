<?php
include_once "homebar.php";
include_once '../includes/dbh_inc.php';
$id = $_SESSION['u_id'];
?>
<title>My recipes</title>
        <article class = "articleclass">
        <h1>
                 My recipes
        <hr />
              
        </h1>
                  <?php
                $sql = "SELECT * FROM recipes WHERE user_id = '$id';";
                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);

                if ($queryResults > 0) 
                {
                   while ($row = mysqli_fetch_assoc($result)) 
                   {
                       echo '<div class="myRecipeDiv">
                 <div class="myRecipePhoto">
                <form>
                    <input type = "image" src=../images/photoSample.png align = left hspace="15" id = "photoSample"/> <a href=../recipeSample.php> 
                </form>
                    <h2>'.$row['recipe_name'].'</h2>
                    </div>
            <div class="pMyRecipe">
                <h2>
                <a href=../recipeSample.php>Details</a>      
            </h2>   
                   '.$row['recipe_description'].'
            </div>
                 </div>';
                   }
                }
                ?>

        </article>
     <?php
include_once "footer.php";
?>