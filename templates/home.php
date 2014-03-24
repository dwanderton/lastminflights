<div class="row">
    <div class="col-xs-12">
        <div>
            <? if(isset($_SESSION["id"])){?><h4>Logged In</h4><?}else{ ?><h4>Logged Out</h4><?}?>
            <p class="lead"><? if(isset($flightrequested)){print_r($flightrequested);} ?></p>
            
            <br/>
            <br/>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <form role="form" action="flightquote.php" method="post">
            <div class="form-group">
                <label for="class">Class:</label>
                <select name="class" class="form-control">
                  <option selected="selected">Economy/Coach</option>
                  <option>Business Class</option>
                  <option>First Class</option>
                </select>            
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" class="form-control">
                  <option selected="selected">Round-Trip</option>
                  <option>One Way</option>
                </select>            
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Departing from:</label>
                <input type="" name="departingfrom" class="form-control" id="exampleInputEmail1" placeholder="Enter Airport Name/Code">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Going to:</label>
                <input type="" name="goingto" class="form-control" id="exampleInputPassword1" placeholder="Enter Airport Name/Code">
            </div>
            <div class="form-group">
                <label for="departdate">Depart:</label>
                <input type="date" name="departdate" class="form-control" id="departdate" placeholder="dd/mm/yy">
            </div>
            <div class="form-group">
                <label for="departtime">Depart Time:</label>
                <input type="time" name="departtime" class="form-control" id="departtime" placeholder="Anytime">
            </div>
            <div class="form-group">
                <label for="returndate">Return:</label>
                <input type="date" name="returndate" class="form-control" id="returndate" placeholder="dd/mm/yy">
            </div>
            <div class="form-group">
                <label for="returntime">Return Time:</label>
                <input type="time" name="returntime" class="form-control" id="returntime" placeholder="Anytime">
            </div>
            <div class="form-group">
                <label for="adults">Adults:</label>
                <input type="number" name="adults" class="form-control" id="adults" placeholder="">
            </div>
            <div class="form-group">
                <label for="children">Children:</label>
                <input type="number" name="children" class="form-control" id="children" placeholder="">
            </div>
            <div class="form-group">
                <label for="seniors">Seniors:</label>
                <input type="number" name="seniors" class="form-control" id="seniors" placeholder="">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-sm-6">
    <p>Some Lorem Ipsum text here about the history of everybody and everything in the world.</p>
    <? if(isset($_SESSION["id"])){?><a href="logout.php">Log Out</a><?}else{ ?><a href="login.php">Log In</a><?}?>
    </div>
</div>

