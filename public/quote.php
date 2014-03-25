<?php

    // configuration
    require("../includes/config.php"); 
	if($_SESSION["id"]){
	//has a specific trip been requested?
	    if(isset($_POST['tripid'])){
	
	     //give admin unrestricted access to ids
            if(isset($_SESSION["admin"])){ 
                        //admin has submitted a new quotation
                        $rows = query("INSERT INTO quote (tripid, adultprice, seniorprice, childprice) VALUES(?, ?, ?, ?)", $_POST['tripid'],$_POST['adultprice'],$_POST['seniorprice'],$_POST['childprice']);
                        if ($rows === false)
                        {
                            apologize("Unfortunately there is an error, please try again.");
                        }
                        $rows = query("UPDATE flightrequest SET status= ? WHERE id= ?", "Fare Quote Issued", $_POST['tripid']);
                        if ($rows === false)
                        {
                            apologize("Unfortunately there is an error, please try again.");
                        }
                        //get user id and then email
                        $lastinsert= query("SELECT * FROM flightrequest WHERE id = ?",$_POST['tripid']);
                        $lastinsert= $lastinsert[0];
                        //Get contact info for email
                        $contact = query("SELECT * FROM userdetails WHERE userid = ? LIMIT 1", $lastinsert["userid"]);
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
                                    $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
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
                                    if(isset($contact['email'])){
                                        $address = $contact['email'];
                                    } else {
                                        $address = "fail@none.none";
                                    }
                                    $mail->AddAddress($address);

                                    $mail->WordWrap = 50;
                                    $mail->Subject  = "New Quotation Received!";
                                    
                                    $mail->MsgHTML("<html><body><h1>Quotation</h1>
                                                    <h4>Great news! Your flight request has received a quotation from our team. Please respond to the offer by chat or contacting us directly. Details are below:</h4>
                                                        <table style='margin: 0 auto;'>
                                                                <tbody>
                                                                <tr>
                                                                <td><strong>Trip ID:</strong></td>
                                                                <td>{$_POST['tripid']}</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Status:</strong></td>
                                                                <td>Fare Quote Issued</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Depart Date:</strong></td>
                                                                <td>{$lastinsert['departdate']}</td>
                                                                </tr>
                                                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                                                <tr>
                                                                <td><strong>Type:</strong></td>
                                                                <td>{$lastinsert['type']}</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Class:</strong></td>
                                                                <td>{$lastinsert['class']}</td>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                                
                                                                <table>
                                                                <thead><tr><th></th><th>Number of people</th><th>Price per Person</th></tr></thead>
                                                                <tbody>
                                                                <tr>
                                                                <td><strong>Adults:</strong></td>
                                                                <td>{$lastinsert['adults']}</td>
                                                                <td>\${$_POST['adultprice']}</td>
                                                                
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Children:</strong></td>
                                                                <td>{$lastinsert['children']}</td>
                                                                <td>\${$_POST['childprice']}</td>
                                                                </tr>
                                                                <tr>
                                                                <td><strong>Seniors:</strong></td>
                                                                <td>{$lastinsert['seniors']}</td>
                                                                <td>\${$_POST['seniorprice']}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table> </body></html>    ");
                                    

                                    if(!$mail->Send()) {
                                      //echo "Mailer Error: " . $mail->ErrorInfo;
                                    } else {
                                      //echo "Message sent!";
                                    }
                     
                        
                }
                $address = "triplist.php?tripid=";
                $address .= $_POST['tripid'];
                redirect("$address");
                exit;
           }
           }
           }   

        // else render form
        redirect("/");
 
?>
