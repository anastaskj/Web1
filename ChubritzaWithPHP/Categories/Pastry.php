<?php
include_once "homebar.php";
include_once '../includes/dbh_inc.php';
?>
     <title>Pastry</title>
    
        <article>
        <h1>
            Pastry
        <hr />
              
            
        </h1>
             <form class = "search" align="right" action="../search.php" method = "POST">
                Search:
                <input type = "text" name = "search" />
                <button type = "submit" name = "submit-search" id="searchButton" class="searchbutton">Search</button>
            </form>

                <?php
                $sql = "SELECT * FROM recipes WHERE recipe_category = 'Pastry';";
                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);

                if ($queryResults > 0) 
                {
                   while ($row = mysqli_fetch_assoc($result)) 
                   {
                       echo " <a href='../recipeSample.php?recipe_id=".$row['recipe_id']."'>
                        <div class='recipeDiv'>
                       <h2>
                ".$row['recipe_name']." 
            </h2>  
                <form>
                    <input type = 'image' src=../images/photoSample.png align = left hspace='15' id = 'photoSample'/>  
                </form>
            <div class='pRecipe'>".$row['recipe_description']."
            </div>
            </div> </a>";
                   }
                }
                ?>
                 
        </article>
    <?php
include_once "footer.php";
?>