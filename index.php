<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Página Inicial</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/favicon.png" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="/libs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bs.style.css">
    </head>
    <body>
        <div ng-include="'menu.php'"></div>
        <div ng-view></div>
        <script language="JavaScript" src="/libs/jquery/dist/jquery.min.js"></script>
        <script language="Javascript" src="/libs/angular/angular.js"></script>
        <script language="JavaScript" src="libs/angular-route/angular-route.js"></script>
        <script language="JavaScript" src="libs/angular-resource/angular-resource.js"></script>
        <script language="JavaScript" src="/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script language="JavaScript" src="modules/controllers/bs.feedback.js"></script>
        <script language="JavaScript" src="modules/bs.main.js"></script>
        <script language="JavaScript" src="modules/bs.app.js"></script>
        <script language="JavaScript" src="modules/bs.routes.js"></script>
    </body>
</html>