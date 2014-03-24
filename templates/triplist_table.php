<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-bordered" id="table-portfolio">
            <thead>
                <tr>
                    <th>Trip ID</th>
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
            
            foreach ($triplist as $line) {
                ?>
                    <tr>
                       <td><?php print $line["id"];?></td>
                       <td><?php print $line["status"];?></td>
                       <td><?php print $line["depart"];?></td>
                       <td><?php print $line["goingto"];?></td>
                       <td><?php print $line["departdate"];?></td>
                       <td><?php print $line["type"];?></td>
                       <td><?php print $line["class"];?></td>
                       <td>Actions Here</td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
