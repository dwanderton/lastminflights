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
        
        //is user logged in already
        if (isset($_SESSION["id"]))
        {
                // submit any booking request in place and provide confirmation
                if(isset($_POST['class'])){
                        $submit = query("INSERT INTO flightrequest (userid, class, type, depart, adults, children, seniors, departdate, returndate, departtime, returntime, goingto) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $_SESSION["id"], $_POST["class"], $_POST["type"], $_POST["departingfrom"], $_POST["adults"], $_POST["children"], $_POST["seniors"], $_POST["departdate"], $_POST["returndate"], $_POST["departtime"], $_POST["returntime"], $_POST["goingto"]);
                    
                    if ($submit === false)
                        {
                            apologize("unfortunately an error occured, please try again.");
                        }
                    $rows = query("SELECT LAST_INSERT_ID() AS id");
                    
                    $lastinsert= query("SELECT * FROM flightrequest WHERE id = ?",$rows[0]["id"]);
                    $flightrequested= $lastinsert[0];
                    render("confirm.php", ["title" => "Request Received", "flightrequested" => $flightrequested]);
                } else {
                    //error should never occur
                    redirect("/");
                }
                exit;  
        }
        // if not logged in and all ok render login form and keep post variables
        render("login_form.php", ["title" => "Log In", "submittedform" => $_POST]);
    }
    else
    {
        // else render form
        render("home.php", ["title" => "home"]);
    }

?>
