<div class="row">
    <div class="col-xs-12">
        <div>
            <br/>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
    <h4>Request a Flight Quote</h4>
    <br/>
        <form role="form" action="flightquote.php" method="post">
            <div class="form-group">
                <label for="class">Class:</label>
                <select name="class" class="form-control">
                  <option selected="selected">Economy/Coach</option>
                  <option>Business Class</option>
                  <option>First Class</option>
                </select>
                <label for="type">Type:</label>
                <select name="type" class="form-control">
                  <option selected="selected">Round-Trip</option>
                  <option>One Way</option>
                </select>                 
            </div>
            <div class="form-group">
                <label for="depart">Departing from:</label>
                <input type="" name="departingfrom" class="form-control" id="depart" placeholder="Enter Airport Name">
            </div>
            <div class="form-group">
                <label for="goingto">Going to:</label>
                <input type="" name="goingto" class="form-control" id="goingto" placeholder="Enter Airport Name">
            </div>
            <div class="form-group">
            <label for="nonstop">Prefer non-stop:</label>
                <input type="checkbox" name="nonstop" class="form-control">
            </div>
            <div class="form-group">
                <label for="departdate">Depart:</label>
                <input type="date" name="departdate" class="form-control" id="departdate" placeholder="dd/mm/yy">
                <label for="departtime">Time:</label>
                <input type="time" name="departtime" class="form-control" id="departtime" placeholder="Anytime">
            </div>
            <div class="form-group">
                <label for="returndate">Return:</label>
                <input type="date" name="returndate" class="form-control" id="returndate" placeholder="dd/mm/yy">
                <label for="returntime">Time:</label>
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
            <div class="form-group">
                    <textarea maxlength="200" style="width:85%; min-height:150px;resize:none;" name="additional" class="form-control" placeholder="Any additional information/requests"></textarea>
                </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-sm-6">
    <p>Some Lorem Ipsum text here about the history of everybody and everything in the world.</p>
    </div>
</div>

