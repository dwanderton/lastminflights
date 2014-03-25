<?php

    // configuration
    require("../includes/config.php"); 
	if($_SESSION["id"]){
	//has a specific trip been requested?
	if(isset($_GET['tripid'])){

	    
	    
	 //give admin unrestricted access to ids
        if(isset($_SESSION["admin"])){ 
              
                //admin query
                $rows = query("SELECT * FROM flightrequest WHERE id = ?  LIMIT 1", $_GET['tripid']);
                if ($rows === false)
                {
                    apologize("Unfortunately there is an error, please try again.");
                }   
                //only one row should be returned
                if(isset($rows[0]))
                {
                    $trip = $rows[0];
                } else {
                    apologize("Unfortunately there is no trip with that id, please try again.");
                }
                //get quotes
                $quotes = query("SELECT * FROM quote WHERE tripid = ? LIMIT 1", $_GET['tripid']);
                if ($quotes === false)
                {
                    apologize("Unfortunately there is an error, please try again.");
                }
                //only one row should be returned
                if(isset($quotes[0]))
                {
                    $quote = $quotes[0];
                } else {
                    $quote = false;
                }
                //find out trip users id
                $id = query("SELECT * FROM flightrequest WHERE id = ? LIMIT 1", $_GET['tripid']);
                if ($id === false)
                {
                    apologize("Unfortunately there is an error, please try again.");
                }
                 if(isset($id[0]))
                {
                    $id = $id[0];
                } else {
                    $id = false;
                }
                
                $contact = query("SELECT * FROM userdetails WHERE userid = ? LIMIT 1", $id['userid']);
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
                 
        } else { 
        // normal query
         $rows = query("SELECT * FROM flightrequest WHERE id = ? AND userid = ?  LIMIT 1", $_GET['tripid'], $_SESSION["id"]);
            if ($rows === false)
            {
                apologize("Unfortunately there is an error, please try again.");
            }   
            //only one row should be returned
                if(isset($rows[0]))
                {
                    $trip = $rows[0];
                } else {
                    apologize("Unfortunately you have no trip with that id, please try again.");
                }
                
                
                $quotes = query("SELECT * FROM quote WHERE tripid = ? LIMIT 1", $_GET['tripid']);
                if ($quotes === false)
                {
                    apologize("Unfortunately there is an error, please try again.");
                }
                //only one row should be returned
                if(isset($quotes[0]))
                {
                    $quote = $quotes[0];
                } else {
                    $quote = false;
                }
                                //find out trip users id
                $id = query("SELECT * FROM flightrequest WHERE id = ? LIMIT 1", $_GET['tripid']);
                if ($id === false)
                {
                    apologize("Unfortunately there is an error, please try again.");
                }
                 if(isset($id[0]))
                {
                    $id = $id[0];
                } else {
                    $id = false;
                }
                
                $contact = query("SELECT * FROM userdetails WHERE userid = ? LIMIT 1", $id['userid']);
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
        }
	
		    //chat message sent?
	    if(isset($_POST['message'])){
	        if(isset($_SESSION["admin"])){ $admin = 1; } else { $admin = 0; }
	        //post chat message
	        $chat = query("INSERT INTO chat (tripid, admin, authorid, message) VALUES(?, ?, ?, ?)", $_GET['tripid'], $admin, $_SESSION["id"], $_POST['message']);
            if ($chat === false)
            {
            apologize("Unfortunately there is an error, please try again.");
            }
            if($admin){
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
                                    if(isset($contact['email'])){
                                        $address = $contact['email'];
                                    } else {
                                        $address = "fail@none.none";
                                    }
                                    $mail->AddAddress($address);

                                    $mail->WordWrap = 50;
                                    $mail->Subject  = "New Message Received!";
                                    
                                    $mail->MsgHTML("<html><body><h1>Chat Message Received</h1>
                                                    <h4>You have recieve a new chat message for trip id {$_GET['tripid']}. Login now to view!</body></html>    ");
                                    

                                    if(!$mail->Send()) {
                                      //echo "Mailer Error: " . $mail->ErrorInfo;
                                    } else {
                                      //echo "Message sent!";
                                    }
            }
  
  
  
  
	    }
	//get chat messages
	$chat = query("SELECT * FROM chat WHERE tripid = ? ORDER BY id", $_GET['tripid']);
    if ($chat === false)
    {
      apologize("Unfortunately there is an error, please try again.");
    }
    //if no rows send false to template
	if(!isset($chat[0])) { $chat= false;}
	
	render("tripdetails.php",["title"=> "Trip " .$_GET['tripid'] ." details", "trip" => $trip, "quote" => $quote, "contact"=> $contact, "chat" =>$chat]);
	exit;
	}
	
	//get trips for user from db
	$rows = query("SELECT * FROM flightrequest WHERE userid = ?  ORDER BY id DESC", $_SESSION["id"]);
    $count = count($rows);

	// render triplist table
	render("triplist_table.php", ["title" => "My Trips", "triplist" => $rows, "count" => $count]);
    }    else
    {
        // else render form
        render("login_form.php", ["title" => "Login or Register"]);
    }
?>
