<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["username"]))
        {
            apologize("You must provide a new username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("You must provide matching passwords.");
        }

        $submit = query("INSERT INTO users (username, hash) VALUES(?, ?)", $_POST["username"], crypt($_POST["password"]));
        
        if ($submit === false)
        {
            apologize("username already exists!");
        }
        $rows = query("SELECT LAST_INSERT_ID() AS id"); 
        $id = $rows[0]["id"];
        $_SESSION["id"] = $id;
        // add additional user info to userdetails table
        if (!isset($_POST["nonstop"])){ $_POST["nonstop"]= "off";}
        $submit = query("INSERT INTO userdetails (userid, salutation, fullname, email, phone) VALUES(?, ?, ?, ?, ?)", $_SESSION["id"], $_POST["salutation"], $_POST["fullname"], $_POST["email"], $_POST["phone"]);
         if ($submit === false)
                        {
                            apologize("Unfortunately a user is already registered with this email address, please try again.");
                        }           
         // submit any booking request and provide confirmation
                if(isset($_POST['submittedform'])){
                        $submit = query("INSERT INTO flightrequest (userid, class, type, depart, adults, children, seniors, departdate, returndate, departtime, returntime, goingto, nonstop, additional) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $_SESSION["id"], $_POST["class"], $_POST["type"], $_POST["departingfrom"], $_POST["adults"], $_POST["children"], $_POST["seniors"], $_POST["departdate"], $_POST["returndate"], $_POST["departtime"], $_POST["returntime"], $_POST["goingto"], $_POST["nonstop"], $_POST["additional"]);
                    
                    if ($submit === false)
                        {
                            apologize("unfortunately an error occured, please try again.");
                        }
                    $rows = query("SELECT LAST_INSERT_ID() AS id");
                    
                    $lastinsert= query("SELECT * FROM flightrequest WHERE id = ?",$rows[0]["id"]);
                    $flightrequested= $lastinsert[0];
                    render("confirm.php", ["title" => "Request Received", "flightrequested" => $flightrequested]);
                } else {
                    redirect("/");
                }
                exit;
    }
    else
    {
        // else render form
        render("login_form.php", ["title" => "Login or Register"]);
    }

?>
