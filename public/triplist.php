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
        }
	//get trip id details where user = userid - stop unauthorised access unless admin
	
	render("tripdetails.php",["title"=> "Trip " .$_GET['tripid'] ." details", "trip" => $trip]);
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
