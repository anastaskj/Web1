<?php
include_once "homebar.php";
include_once 'includes/dbh_inc.php';
?>
        <article>
        <?php
          $recipe_id= mysqli_real_escape_string($conn, $_GET['recipe_id']);

                $sql = "SELECT * FROM recipes WHERE recipe_id = '$recipe_id';";
                $result = mysqli_query($conn, $sql);
                   $row = mysqli_fetch_assoc($result);
                   
                       echo '<h1>
                  '.$row['recipe_name'].'
        <hr />
        </h1>
        <title>'.$row['recipe_name'].'</title>
                       
                </div>
                 <div class="recipeSampleDiv">
                <div class="photoRecipe">
                <img src=images/photoSample.png alt="Photo of recipe." align = center id = "photoSample"/> 
                <form>
                    <button>Save Recipe</button>
                    <input type="hidden" name = "bookmark" value = "recipe"/>
            </form>
            </div>
                <div class="ingredientsDiv">
                <h2>Ingredients:</h2>
                    <p>'.$row['recipe_ingredients'].'</p>
                </div>
                <div class="pRecipeSample">
            <p>
                <h2>Description</h2>
                '.$row['recipe_description'].'
             </p>
                    
    </div>
              ';
            
            ?>  
        </article>

<?php
include_once "footer.php";
?>