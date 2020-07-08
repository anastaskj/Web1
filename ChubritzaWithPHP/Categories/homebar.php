<?php
session_start();
?>

<!DOCTYPE html>
<html>
 <head>
        <meta charset=" = UTF-8">
     <link rel="shortcut icon" type="image/x-icon" href="../images/fav.ico" />
        <img src  = "../images/dada.jpg" >
         <link href="../css/koko.css" type="text/css" rel="stylesheet" />
          <script src="../js/scripts.js"></script>
    </head>
    
    <body>
    <?php
        if(isset($_SESSION['u_id']))
        {
          echo '<nav class ="homebar">
        <button onclick = "visitHomeFromOutside();" type="button" style="height:50px;width:200px">Home</button>
        <button onclick = "visitMyAccountFromOutside();" type="button" style="height:50px;width:200px">My account</button>
        <button onclick = "visitSignUpFromOutside();" type="button" style="height:50px;width:200px">Sign up</button>
        <button onclick = "visitCategoriesFromOutside();" type="button" style="height:50px;width:200px">Categories</button>
        <button onclick = "visitAboutUsFromOutside();" type="button" style="height:50px;width:200px">About us</button>
      </nav>';
        }
        else
        {
          echo '<nav class ="homebar">
        <button onclick = "visitHomeFromOutside();" type="button" style="height:50px;width:200px">Home</button>
        <button onclick = "visitLogInFromOutside();" type="button" style="height:50px;width:200px">Log in</button>
        <button onclick = "visitSignUpFromOutside();" type="button" style="height:50px;width:200px">Sign up</button>
        <button onclick = "visitCategoriesFromOutside();" type="button" style="height:50px;width:200px">Categories</button>
        <button onclick = "visitAboutUsFromOutside();" type="button" style="height:50px;width:200px">About us</button>
      </nav>';
        }   

    ?>     
    