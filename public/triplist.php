<?php

    // configuration
    require("../includes/config.php"); 
	if($_SESSION["id"]){
	//
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
