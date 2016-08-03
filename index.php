<!DOCTYPE html>
<html lang="en" ng-app="isitupApp">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Check if website is up or not">
        <meta name="author" content="Eslam Mahmoud">

        <title>Is It Up ?</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sticky-footer.css" rel="stylesheet">

        <!-- Angular from CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <!-- Angular sanitize from CDN. needed to display html -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-sanitize.js"></script>

        <!-- Custom angular controller for this app -->
        <script src="js/isitup.js"></script>

        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" ng-controller="UrlFormController as urlForm">
                    <form class="form-inline" ng-submit="urlForm.checkURL()">
                        <div class="form-group">
                            <h2>Check if website is up or down?</h2>
                            <input ng-model="urlForm.url" placeholder="http://example.com" class="form-control" type="text" name="url" id="url">
                            <button ng-disabled="urlForm.checkingURL" type="submit" class="btn btn-default">Is it up?</button>
                        </div>
                    </form>
                    <hr>
                    <div role="alert" ng-bind-html="urlForm.successMessage" ng-show="urlForm.checkingURLSuccess" class="alert alert-success">
                    </div>
                    <div role="alert" ng-bind-html="urlForm.failMessage" ng-show="urlForm.checkingURLFail" class="alert alert-danger">
                    </div>
                    <div role="alert" ng-show="urlForm.checkingURL" class="alert alert-info">
                        Checking {{urlForm.url}} ...
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

        <footer class="footer">
            <div class="container">
                <hr>
                <p class="text-muted">Created with <img src="./img/heart.png"> by <a href="http://eslam.me">Eslam Mahmoud</a></p>
            </div>
        </footer>
    </body>

</html>