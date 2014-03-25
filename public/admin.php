<?php

    // configuration
    require("../includes/config.php");
    
	if($_SESSION["id"]){
	 if(isset($_SESSION["admin"])){ 	 
	 
                //admin query
	            $rows = query("SELECT * FROM flightrequest ORDER BY id DESC");
                if ($rows === false)
                {
                    apologize("Unfortunately there is an error, please try again.");
                }   
                // else render form
                render("admin_dashboard.php", ["title" => "Admin Panel", "flightrequest" => $rows]);
                exit;
              
          }
    }
    redirect("/");
    
?>
