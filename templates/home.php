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
                <label id="departlabel" for="depart">Departing from:</label>
                <input type="" name="departingfrom" class="form-control tags" id="depart" placeholder="Enter Airport Name" required>
            </div>
            <div class="form-group">
                <label id="goinglabel" for="goingto">Going to:</label>
                <input type="" name="goingto" class="form-control tags" id="goingto" placeholder="Enter Airport Name" required>
            </div>
            <div class="form-group">
            <label for="nonstop">Prefer non-stop:</label>
                <input type="checkbox" name="nonstop" class="form-control">
            </div>
            <div class="form-group">
                <label for="departdate">Depart:</label>
                <input type="date" name="departdate" class="form-control" id="departdate" placeholder="dd/mm/yy" required>
                <label for="departtime">Time:</label>
                <select name="departtime" class="form-control" id="departtime">
                    <option value="Any" selected="selected">Any</option>
                    <option value="01:00">1:00am</option>
                    <option value="02:00">2:00am</option>
                    <option value="03:00">3:00am</option>
                    <option value="04:00">4:00am</option>
                    <option value="05:00">5:00am</option>
                    <option value="06:00">6:00am</option>
                    <option value="07:00">7:00am</option>
                    <option value="08:00">8:00am</option>
                    <option value="09:00">9:00am</option>
                    <option value="10:00">10:00am</option>
                    <option value="11:00">11:00am</option>
                    <option value="12:00">Noon</option>
                    <option value="13:00">1:00pm</option>
                    <option value="14:00">2:00pm</option>
                    <option value="15:00">3:00pm</option>
                    <option value="16:00">4:00pm</option>
                    <option value="17:00">5:00pm</option>
                    <option value="18:00">6:00pm</option>
                    <option value="19:00">7:00pm</option>
                    <option value="20:00">8:00pm</option>
                    <option value="21:00">9:00pm</option>
                    <option value="22:00">10:00pm</option>
                    <option value="23:00">11:00pm</option>
                </select>
            </div>
            <div class="form-group">
                <label for="returndate">Return:</label>
                <input type="date" name="returndate" class="form-control" id="returndate" placeholder="dd/mm/yy" required>
                <label for="returntime">Time:</label>
                <select name="returntime" class="form-control" id="returntime">
                    <option value="Any" selected="selected">Any</option>
                    <option value="01:00">1:00am</option>
                    <option value="02:00">2:00am</option>
                    <option value="03:00">3:00am</option>
                    <option value="04:00">4:00am</option>
                    <option value="05:00">5:00am</option>
                    <option value="06:00">6:00am</option>
                    <option value="07:00">7:00am</option>
                    <option value="08:00">8:00am</option>
                    <option value="09:00">9:00am</option>
                    <option value="10:00">10:00am</option>
                    <option value="11:00">11:00am</option>
                    <option value="12:00">Noon</option>
                    <option value="13:00">1:00pm</option>
                    <option value="14:00">2:00pm</option>
                    <option value="15:00">3:00pm</option>
                    <option value="16:00">4:00pm</option>
                    <option value="17:00">5:00pm</option>
                    <option value="18:00">6:00pm</option>
                    <option value="19:00">7:00pm</option>
                    <option value="20:00">8:00pm</option>
                    <option value="21:00">9:00pm</option>
                    <option value="22:00">10:00pm</option>
                    <option value="23:00">11:00pm</option>
                </select>
                
            </div>
            <div class="form-group">
                <label for="adults">Adults:</label>
                <input type="number" name="adults" class="form-control" id="adults" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="children">Children:</label>
                <input type="number" name="children" class="form-control" id="children" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="seniors">Seniors:</label>
                <input type="number" name="seniors" class="form-control" id="seniors" placeholder="" required>
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

