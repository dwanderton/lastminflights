<?php

    // configuration
    require("../includes/config.php"); 
	if($_SESSION["id"]){
	//has a specific trip been requested?
	if(isset($_GET['tripid'])){
	 //give admin unrestricted access to ids
        if(isset($_SESSION["admin"])){ 
              if($_SESSION["admin"]===1){
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
	//get trip id details where user = userid - stop unauthorised access unless admin
	
	render("tripdetails.php",["title"=> "Trip " .$_GET['tripid'] ." details", "trip" => $trip, "quote" => $quote, "contact"=> $contact]);
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
