<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Last Minute Flights: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Last Minute Flights</title>
        <?php endif ?>

        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div id="top">
                    <a href="/"><img alt="C$50 Finance" src="/img/logo.gif"/></a>
                </div>
            </div>
            <div class="row">
                <div id="middle" class="col-xs-12">
