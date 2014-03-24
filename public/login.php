<?php

    // configuration
    require("../includes/config.php"); 
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }

        // query database for user
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];

                // submit any booking request and provide confirmation
                if(isset($_POST['submittedform'])){
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
                    redirect("/");
                }
                exit;
            }
        }

        // else apologize
        apologize("Invalid username and/or password.");
    }
    else
    {
        // else render form
        render("login_form.php", ["title" => "Login or Register"]);
    }

?>
