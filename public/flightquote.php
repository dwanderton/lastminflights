<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["goingto"]))
        {
            apologize("You must provide your destination.");
        }
        else if (empty($_POST["departingfrom"]))
        {
            apologize("You must provide your point of departure.");
        }
        
        // if all ok render login form and keep post variables
        render("login_form.php", ["title" => "Log In", "submittedform" => $_POST]);
    }
    else
    {
        // else render form
        render("home.php", ["title" => "home"]);
    }

?>
