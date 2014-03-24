<?php

    // configuration
    require("../includes/config.php"); 
	if($_SESSION["id"]){
	//has a specific trip been requested?
	    if(isset($_POST['tripid'])){
	
	     //give admin unrestricted access to ids
            if(isset($_SESSION["admin"])){ 
                if($_SESSION["admin"]===1){
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
