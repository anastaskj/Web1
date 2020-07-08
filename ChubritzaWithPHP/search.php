<?php
include_once 'includes/dbh_inc.php';
include_once 'homebar.php'; 
?>
 <title>Search</title>
<article>
	<h1>
            
                 Search
        <hr />
              
            
        </h1>
<?php
	if (isset($_POST['submit-search'])) 
	{
		$search = mysqli_real_escape_string($conn, $_POST['search']);
		$sql = "SELECT * FROM recipes WHERE recipe_name LIKE '%$search%' OR recipe_description LIKE '%$search%' OR recipe_category LIKE '%$search%' OR recipe_ingredients LIKE '%$search%'";

		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);

		echo '<p> There are '.$queryResults.' result(s). </p>';

		if ($queryResults > 0) 
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				echo " <a href='recipeSample.php?recipe_id=".$row['recipe_id']."'>
                        <div class='recipeDiv'>
                       <h2>
                ".$row['recipe_name']." 
            </h2>  
                <form>
                    <input type = 'image' src=images/photoSample.png align = left hspace='15' id = 'photoSample'/>  
                </form>
            <div class='pRecipe'>".$row['recipe_description']."
            </div>
            </div> </a>";	
			}
		}
		else
		{
			echo '<p class = "error" No results match your search </p>';
		}
	}
?>
</article>

<?php
include_once 'footer.php';
?>