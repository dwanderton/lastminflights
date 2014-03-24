<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <?php if (isset($title)): ?>
            <title>Last Minute Flights: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Last Minute Flights</title>
        <?php endif ?>

        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
        <style>
        *{
            font-family: 'Gafata', sans-serif;
        }
        .ChatList
        {
            overflow-y:scroll;
            overflow-x:hidden;
            height:200px;
            width:100%;
            padding: 0 10px;
        }

        .ChatItem
        {
            padding:0;
            width:100%;
        }
        </style>
    </head>

    <body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Last Minute Flights</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <? if(isset($_SESSION["admin"])){ 
              if($_SESSION["admin"]===1){?>
              <li class="active"><a href="admin.php">Admin</a></li>
              <?}   
            }?>
            <? if(isset($_SESSION["id"])){ 
            if(!isset($_SESSION["admin"])){?><li><a href="triplist.php">My Trips</a></li><?}?>
            <li><a href="logout.php">Logout</a></li>
            <? } else { ?>
            <li><a href="login.php">Login</a></li>
            <? } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
        <div style="margin-top:60px;"class="container">
            <div class="row">
                <div id="top">
                </div>
            </div>
            <div class="row">
                <div id="middle" class="col-xs-12">
