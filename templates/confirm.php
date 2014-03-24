<div class="row">
    <div class="col-xs-12">
        <div>
            Confirmation Page:
           
            <br/>
            <br/>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
    Great your flight is confirmed. Details are below:
    <p><? if(isset($flightrequested)){print_r($flightrequested);} ?></p>
            
    </div>
    <div class="col-sm-6">
    <p>Some Lorem Ipsum text here about the history of everybody and everything in the world.</p>
    <? if(isset($_SESSION["id"])){?><a href="logout.php">Log Out</a><?}else{ ?><a href="login.php">Log In</a><?}?>
    </div>
</div>

