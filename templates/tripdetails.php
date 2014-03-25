<div class="row">
    <div class="col-xs-12">
        <ol style="text-align:left; width:auto;" class="breadcrumb">
          <? if(isset($_SESSION["admin"])){?>
          <li><a href="admin.php">Admin Dashboard</a></li>
          <?}else{?>
          <li><a href="triplist.php">My Trips</a></li>
          <?}?>
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
            <td><? if($trip['nonstop']=="on"){print("Yes");} else {print("No");}?></td>
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
            <td><? if($trip['additional']=="") {print("n/a");}else{
            print(htmlspecialchars($trip['additional']));}?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <h4>Quotation</h4>
        <h4><small>Ticket Cost per person. All prices US Dollars and inclusive of all taxes and fees.</small></h4>
        <? if($quote){ ?>
        <table class="table">
        <thead><td></td><td># of people</td><td>Cost per person</td><thead>
        <tbody>
        <tr><td>Adults</td><td><?=$trip['adults']?></td><td>$<?=number_format($quote['adultprice'], 2, '.', '')?></td></tr>
        <tr><td>Children</td><td><?=$trip['children']?></td><td>$<?=number_format($quote['childprice'], 2, '.', '')?></td></tr>
        <tr><td>Seniors</td><td><?=$trip['seniors']?></td><td>$<?=number_format($quote['seniorprice'], 2, '.', '')?></td></tr>
        <tr><td><strong>Total</strong></td><td><strong><?=$trip['adults']+$trip['children']+$trip['seniors']?></strong></td><td><strong>$<?=number_format(($quote['adultprice']+$quote['childprice']+$quote['seniorprice']), 2, '.', '')?></strong></td></tr>
        </tbody>
        </table>
        
        <? } else { if(isset($_SESSION["admin"])){?>
        <form  action="quote.php" method="post">
        <fieldset>
        <table class="table">
        <thead><td></td><td># of people</td><td>Cost per person</td><thead>
        <tbody>
        <tr><td>Adults</td><td><?=$trip['adults']?></td><td>$&nbsp;<input name="adultprice" type="text" class="form-control"></td></tr>
        <tr><td>Children</td><td><?=$trip['children']?></td><td>$&nbsp;<input name="childprice" type="text" class="form-control"></td></tr>
        <tr><td>Seniors</td><td><?=$trip['seniors']?></td><td>$&nbsp;<input name="seniorprice" type="text" class="form-control"></td></tr>
        </tbody>
        </table>
        <? foreach ($trip as $key => $value) {?>
         <input type="hidden" name="<?=$key ?>" value="<?=$value?>"/>
         <? }?>
         <input type="hidden" name="tripid" value="<?=$trip['id']?>"/>
        <button type="submit" class="btn btn-default">Submit Quote</button>
        </fieldset>
        </form>
        <?}?>
        <h4><small>One of our customer service representatives is currently reviewing your request. Once this has been reviewed this space will update with your quotation</small></h4>
        <? }?>
        <? if(isset($_SESSION["admin"])){ ?>
        <h4>Conact Details<h4>
        <br/>
        <table style="margin: 0 auto;">
            <tbody>
            <tr>
            <td><strong>Name:</strong></td>
            <td>&nbsp;<? print(htmlspecialchars($contact['salutation']));?>&nbsp;<? print(htmlspecialchars($contact['fullname']));?></td>
            </tr>
            <tr>
            <td><strong>Email:</strong></td>
            <td>&nbsp;<? print(htmlspecialchars($contact['email']));?></td>
            </tr>
            <tr>
            <td><strong>Phone:</strong></td>
            <td>&nbsp;<? print(htmlspecialchars($contact['phone']));?></td>
            </tr>
            </tbody>
        </table>   
        <?}?>  
        <br/>
        <h4>Customer Service Chat</h4>
        <div class="ChatList" style="width:80%; margin: 0 auto;">
            <ul class="list-inline list-group">
            <? if(isset($chat)){
            foreach ($chat as $chit) {
                if($chit['admin']){?>
            
                <li class="ChatItem alert-success">
                     <span>
                        <div class="row" style="padding:4px;">
                         <div class="col-xs-3"
                            <strong><?=$chit['timestamp']?>&nbsp;&nbsp;&nbsp;</strong>
                         </div>
                        
                        <div class="col-xs-9"><?= $chit['message']?></div>
                       </div>
                    </span>
                </li>
            
                <br/>
                <?} else {?>
                <li class="ChatItem alert-info">
                    <span>
                        <div class="row">
                         <div class="col-xs-3"
                            <strong><?=$chit['timestamp']?>&nbsp;&nbsp;&nbsp;</strong>
                         </div>
                        
                        <div class="col-xs-9"><?= $chit['message']?></div>
                       </div>
                    </span>
                </li>
                <br/>
                <?}}}?>
            </ul>
        </div>
        <br/>
        <form action="triplist.php?tripid=<?=$trip['id']?>" method="post">
        <fieldset>
        <div class="input-group" style="width:75%; margin: 0 auto;">
                  <input type="text" name="message" style="width:100%!important;" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-envelope-o"></i></button>
                  </span>
        </div>
        </fieldset>
        </form>
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
<script>
$(document).ready(function(){
        $('.ChatList').animate({
            scrollTop: $('.chat').scrollTop()+10000
        }, 500);
});
</script>
