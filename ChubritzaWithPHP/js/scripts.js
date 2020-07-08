function visitHome(){
        location.href = "index.php";
}
function visitCategories(){
        location.href = "Categories.php";
}
function visitMyAccount(){
        location.href = "MyAccount.php";
}
function visitLogIn(){
        location.href = "LogIn.php";
}
function visitSignUp(){
        location.href = "SignUp.php";
}
function visitAboutUs(){
        location.href = "AboutUs.php";
}
function visitAboutUsFromOutside(){
        location.href = "../AboutUs.php";
}
function visitSignUpFromOutside(){
        location.href = "../SignUp.php";
}
function visitLogInFromOutside(){
        location.href = "../LogIn.php";
}
function visitMyAccountFromOutside(){
        location.href = "../MyAccount.php";
}
function visitCategoriesFromOutside(){
        location.href = "../Categories.php";
}
function visitHomeFromOutside(){
        location.href = "../index.php";
}
function visitRecipes(){
    location.href = "MyAccount/Recipes.php";
}
function visitSaved(){
    location.href = "MyAccount/Saved.php";
}
function visitUpload(){
    location.href = "MyAccount/Upload.php";
}

function AreYouSure()
{
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var age = document.getElementById("age").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var repeatpass = document.getElementById("repeatpass").value;
    var ok = false;
    if (firstName == "" || lastName == "" || age == "" || email== "" || password == "" || repeatpass == "" ) 
    {
       ok = true;
    }
    if(ok == true || password != repeatpass)
        {
             alert("Please fill in all fields/ Non-matching passwords.");
        return false;
        }
    else
    {
        return true;
    }
}

function AreYouSureRecipe(){
    
    var recipeName = document.getElementById("rName").value;
    var recipeIngredients = document.getElementById("rIngredients").value;
    var recipeDescription = document.getElementById("rDescription").value;
    
    var valid = false;
    
    
    if (recipeName == "" || recipeDescription == "" || recipeIngredients == "") 
    {
       valid = true;
    }
    if(valid)
        {
            alert("Please fill in all fields")
            return false;
        }
     else
    {
        return true;
    }
    
}






