<div class="row">
    <div class="col-xs-12">
        <ol style="text-align:left; width:auto;" class="breadcrumb">
          <li><a href="triplist.php">My Trips</a></li>
          <li class="active">Trip ID: <? print(htmlspecialchars($trip['id']));?></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h4 style="text-align:left;">Trip Details</h4>
        <table>
            <tbody>
            <tr>
            <td><strong>Trip ID:</strong></td>
            <td><? print(htmlspecialchars($trip['id']));?></td>
            </tr>
            <tr>
            <td><strong>Status:</strong></td>
            <td><? print(htmlspecialchars($trip['status']));?></td>
            </tr>
            <tr>
            <td><strong>Depart Date:</strong></td>
            <td><? print(htmlspecialchars($trip['departdate']));?></td>
            </tr>
            <tr>
            <td><strong>Prefer Non-Stop:</strong></td>
            <td><? if($trip['nonstop']==="on"){print("Yes");} else {print("No");}?></td>
            </tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr>
            <td><strong>Type:</strong></td>
            <td><? print(htmlspecialchars($trip['type']));?></td>
            </tr>
            <tr>
            <td><strong>Class:</strong></td>
            <td><? print(htmlspecialchars($trip['class']));?></td>
            </tr>
            <tr>
            <td><strong>Adults:</strong></td>
            <td><? print(htmlspecialchars($trip['adults']));?></td>
            </tr>
            <tr>
            <td><strong>Children:</strong></td>
            <td><? print(htmlspecialchars($trip['children']));?></td>
            </tr>
            <tr>
            <td><strong>Seniors:</strong></td>
            <td><? print(htmlspecialchars($trip['seniors']));?></td>
            </tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr>
            <td><strong>Additional Information:</strong></td>
            <td><? if($trip['additional']==="") {print("n/a");}else{
            print(htmlspecialchars($trip['additional']));}?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <h4>Quotation</h4>
        <h4>Customer Service Chat</h4>
        <div class="ChatList" style="width:80%; margin: 0 auto;">
            <ul class="list-inline list-group">
                <li class="ChatItem alert-success">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-info">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-success">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-info">
                    <span>Test Data1</span>
                </li>
                <br/>
                                <li class="ChatItem alert-success">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-info">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-success">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-info">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-success">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-info">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-success">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-info">
                    <span>Test Data1</span>
                </li>
                <br/>
                                <li class="ChatItem alert-success">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-info">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-success">
                    <span>Test Data1</span>
                </li>
                <br/>
                <li class="ChatItem alert-info">
                    <span>Test Data1</span>
                </li>
                <br/>
            </ul>
        </div>
        <br/>
        <div class="input-group" style="width:75%; margin: 0 auto;">
                  <input type="text" style="width:100%!important;" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-envelope-o"></i></button>
                  </span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
    <br/>
        <h4>Itenerary</h4>
        <br/>
        <table class="table table-striped table-bordered" id="table-itenerary">
            <thead>
                <tr>
                    <th>Departure Date</th>
                    <th>Departure Time</th>
                    <th>Leaving From</th>
                    <th>Going To</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><? print(htmlspecialchars($trip['departdate']));?></td>
                    <td><? print(htmlspecialchars($trip['departtime']));?></td>
                    <td><? print(strtoupper(htmlspecialchars($trip['depart'])));?></td>
                    <td><? print(strtoupper(htmlspecialchars($trip['goingto'])));?></td>
                </tr>
                <? if($trip['type']==="Round-Trip"){ ?>
                <tr>
                    <td><? print(htmlspecialchars($trip['returndate']));?></td>
                    <td><? print(htmlspecialchars($trip['returntime']));?></td>
                    <td><? print(strtoupper(htmlspecialchars($trip['goingto'])));?></td>
                    <td><? print(strtoupper(htmlspecialchars($trip['depart'])));?></td>
                </tr>
                <? } ?>
            </tbody>
        </table>
    </div>
</div>
