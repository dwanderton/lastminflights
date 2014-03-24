       <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul style="margin-top:50px;" class="nav nav-sidebar">
            <li class="active"><a href="admin.php">Flight Requests</a></li>
            <li><a href="quote.php">Quotations</a></li>
          </ul>
        </div>
        <div class="col-sm-9  col-md-10">
          <h1 class="page-header">Flight Requests</h1>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Status</th>
                    <th>Depart</th>
                    <th>To</th>
                    <th>Departure Date</th>
                    <th>Trip Type</th>
                    <th>Class</th>
                    <th>Actions</th>
                </tr>
              </thead>
             
              <tbody>
               <?php
            
            foreach ($flightrequest as $line) {
                ?>
                    <tr>
                       <td><?php print $line["id"];?></td>
                       <td><?php print $line["status"];?></td>
                       <td><?php print $line["depart"];?></td>
                       <td><?php print $line["goingto"];?></td>
                       <td><?php print $line["departdate"];?></td>
                       <td><?php print $line["type"];?></td>
                       <td><?php print $line["class"];?></td>
                       <td>
                       
                        <a href="triplist.php?tripid=<?=$line["id"]?>">Details</a>
                       
                       </td>
                    </tr>
            <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
