<div class="row">
    <div class="col-xs-12">
        <div>
            <h1 class="page-header">Confirmation</h1>
           
            <br/>
            <br/>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
    <p class="lead">Great your flight is confirmed. A member of our team will be in touch shortly. Details are below:</p>
    <table style="margin: 0 auto;">
            <tbody>
            <tr>
            <td><strong>Trip ID:</strong></td>
            <td><? print(htmlspecialchars($flightrequested['id']));?></td>
            </tr>
            <tr>
            <td><strong>Status:</strong></td>
            <td><? print(htmlspecialchars($flightrequested['status']));?></td>
            </tr>
            <tr>
            <td><strong>Depart Date:</strong></td>
            <td><? print(htmlspecialchars($flightrequested['departdate']));?></td>
            </tr>
            <tr>
            <td><strong>Prefer Non-Stop:</strong></td>
            <td><? if($flightrequested['nonstop']==="on"){print("Yes");} else {print("No");}?></td>
            </tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr>
            <td><strong>Type:</strong></td>
            <td><? print(htmlspecialchars($flightrequested['type']));?></td>
            </tr>
            <tr>
            <td><strong>Class:</strong></td>
            <td><? print(htmlspecialchars($flightrequested['class']));?></td>
            </tr>
            <tr>
            <td><strong>Adults:</strong></td>
            <td><? print(htmlspecialchars($flightrequested['adults']));?></td>
            </tr>
            <tr>
            <td><strong>Children:</strong></td>
            <td><? print(htmlspecialchars($flightrequested['children']));?></td>
            </tr>
            <tr>
            <td><strong>Seniors:</strong></td>
            <td><? print(htmlspecialchars($flightrequested['seniors']));?></td>
            </tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr>
            <td><strong>Additional Information:</strong></td>
            <td><? if($flightrequested['additional']==="") {print("n/a");}else{
            print(htmlspecialchars($flightrequested['additional']));}?></td>
            </tr>
            </tbody>
        </table>     
    </div>
</div>

