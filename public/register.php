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
                    //Get contact info for email
                    $contact = query("SELECT * FROM userdetails WHERE userid = ? LIMIT 1", $_SESSION["id"]);
                    if ($contact === false)
                    {
                        apologize("Unfortunately there is an error, please try again.");
                    }
                    //only one row should be returned
                    if(isset($contact[0]))
                    {
                        $contact = $contact[0];
                    } else {
                        $contact = false;
                    }
                    if($contact){
                    	            //send email
	                                $mail             = new PHPMailer();

                                    $mail->IsSMTP(); // telling the class to use SMTP
                                    //$mail->Host       = "mail.yourdomain.com"; // SMTP server
                                    //$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                                                               // 1 = errors and messages
                                                                               // 2 = messages only
                                    $mail->SMTPAuth   = true;                  // enable SMTP authentication
                                    $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
                                    $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
                                    $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
                                    $mail->Username   = "lastminflights85@gmail.com";  // GMAIL username
                                    $mail->Password   = "lastmin85";            // GMAIL password

                                    $mail->SetFrom('lastminflights85@gmail.com', 'Last Min Flights');

                                    $mail->AddReplyTo("lastminflights85@gmail.com","Last Min Flights");

                                    $mail->Subject  = "Quote request received!";
                                    $mail->MsgHTML("<html><body><h1>Confirmation</h1>
                                                    <h4>Great your flight request is confirmed. A member of our team will be in touch shortly. Details are below:</h4>
                                                        <table style='margin: 0 auto;'>
                                                                <tbody>
                                                                <tr>
                                                                <td><strong>Trip ID:</strong></td>
                                                                <td>{$flightrequested['id']}</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Status:</strong></td>
                                                                <td>{$flightrequested['status']}</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Depart Date:</strong></td>
                                                                <td>{$flightrequested['departdate']}</td>
                                                                </tr>
                                                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                                                <tr>
                                                                <td><strong>Type:</strong></td>
                                                                <td>{$flightrequested['type']}</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Class:</strong></td>
                                                                <td>{$flightrequested['class']}</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Adults:</strong></td>
                                                                <td>{$flightrequested['adults']}</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Children:</strong></td>
                                                                <td>{$flightrequested['children']}</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Seniors:</strong></td>
                                                                <td>{$flightrequested['seniors']}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table> </body></html>    ");
                                    $mail->WordWrap = 50;
                                    if(isset($contact['email'])){
                                        $address = $contact['email'];
                                    } else {
                                        $address = "fail@none.none";
                                    }
                                    $mail->AddAddress($address);

                                    if(!$mail->Send()) {
                                      //echo "Mailer Error: " . $mail->ErrorInfo;
                                    } else {
                                      //echo "Message sent!";
                                    }
                     }
                    
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
