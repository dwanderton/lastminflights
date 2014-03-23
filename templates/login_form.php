<div class="row">
    <div class="col-xs-12">
        <strong>
        <? 
        if(isset($submittedform)){
            print_r($submittedform); 
        }
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
                <div class="control-group">
                    <input autofocus name="username" placeholder="Username" type="text"/>
                </div>
                <div class="control-group">
                    <input name="password" placeholder="Password" type="password"/>
                    <input name="confirmation" placeholder="Confirm Password" type="password"/>
                </div>
                <div class="control-group">
                    <button type="submit" class="btn-primary">Register</button>
                </div>
            </fieldset>
        </form>
    </div>
