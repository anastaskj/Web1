<?php
include_once "homebar.php";
?>
<title>Upload a recipe</title>
        <article>
        <h1>
                 Upload  <hr />
            
        </h1>
            
                <div class="uploadDiv">
                <form name="UploadRecipe" action="../includes/UploadRecipe_inc.php" method="POST" onsubmit="return AreYouSureRecipe();"> 
                    <fieldset>
                    <div class="RecipeName">
          
                    Recipe name: 
                    <input type="text" name="recipe_name" id = "recipe_name" size="45" maxlength="60" >
            
                </div>
                    
                    <div class="RecipeCategory">
            
                Choose category:
                <select name="recipe_category">
                    <option value=Desserts>Desserts</option>
                    <option value=Mains>Mains</option>
                    <option value=Salads>Salads</option>
                    <option value=Pastry>Pastry</option>
                    <option value=Vegetarian>No meat</option>
                    <option value=Soups>Soups</option>
                    <option value=Starters>Starters</option>
                    <option value=Others>Others</option>
                </select>
                        </div>
                    </fieldset>
                <fieldset>
                    <div class="RecipeIngredients">
                       <p>Enter ingredients:</p> 
                    <textarea  id = "recipe_ingredients" name = "recipe_ingredients" cols="15" rows = "20" ></textarea>
                
                    </div>
                    
                    <div class="RecipeDescription">
                                         <p>  Enter description:</p> 
                    <textarea id = "recipe_description" name = "recipe_description" cols="45" rows = "20" ></textarea>
               
                </div>
                    </fieldset>
                    
                    <fieldset>
                    <div class="UploadRecipe">
                
                    <input type="submit" name="submit" value = "Upload" id="uploadRecipeButton"/>
                
                        </div>
                         <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


        if (strpos($fullUrl, "uploadrecipe=empty") == true) 
        {
            echo "<p class = 'error'>Please fill in all fields!</p>";
            exit();
        }
        elseif (strpos($fullUrl, "uploadrecipe=invalidname") == true) 
        {
            echo "<p class = 'error'>Please use letters for the recipe name!</p>";
            exit();
        }
        elseif (strpos($fullUrl, "uploadrecipe=nametaken") == true) 
        {
            echo "<p class = 'error'>Name already taken!</p>";
            exit();
        }
         elseif (strpos($fullUrl, "uploadrecipe=uploadrecipe=nametoolong") == true) 
        {
            echo "<p class = 'error'>Name is too long!</p>";
            exit();
        }
        elseif (strpos($fullUrl, "uploadrecipe=success") == true) 
        {
            echo "<p class = 'error'>Recipe uploaded!</p>";
            exit();
        }

        
        ?>
                    </fieldset>
                    </form>
                    
          </div>
        </article>
<?php
include_once "footer.php";
?>