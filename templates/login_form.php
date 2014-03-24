<div class="row">
    <div class="col-xs-12">
        <strong>
        <? 
        if(isset($submittedform)){
            print_r($submittedform); 
        } else { print("no flight booking request submitted - dry login?");}
        ?>
        </strong>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <h4>Login Here or...</h4>
        <form action="login.php" method="post">
            <fieldset>
                <div class="form-group">
                    <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" placeholder="Password" type="password"/>
                </div>
                <? if(isset($submittedform)){ ?>
                        <input type="hidden" name="submittedform" value="true"/>
                        <?foreach ($submittedform as $key => $value) {?>
                            <input type="hidden" name="<?=$key ?>" value="<?=$value?>"/>
                <? }} ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-sm-6">
        <h4>Register Below</h4>
        <form action="register.php" method="post">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" name="username" placeholder="Username" type="text"/>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" placeholder="Password" type="password"/>
                    <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
                </div>
                <div class="form-group">
                    <select  name="salutation" class="form-control">
                        <option selected="selected" value="0">Title</option><option>Mr.</option><option>Mrs.</option>
                    </select>
                    <input class="form-control" name="fullname" placeholder="Full Name" type="text"/>
                </div>
                <div class="form-group">
                    <input class="form-control" name="email" placeholder="Email Address" type="email"/>
                    <input class="form-control" name="phone" placeholder="Phone Number"/>
                </div>
                <div class="form-group">
                    <textarea style="width:85%; min-height:150px;resize:none;" name="additional" class="form-control" placeholder="Any additional information/requests"></textarea>
                </div>
                
                
                <? if(isset($submittedform)){ ?>
                        <input type="hidden" name="submittedform" value="true"/>
                        <? foreach ($submittedform as $key => $value) {?>
                            <input type="hidden" name="<?=$key ?>" value="<?=$value?>"/>
                <? }} ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </fieldset>
        </form>
    </div>
