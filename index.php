<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Check if website is up or not">
        <meta name="author" content="Eslam Mahmoud">

        <title>Is It Up ?</title>
        
        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sticky-footer.css" rel="stylesheet">

        <!-- Custom CSS -->
        <style>
        body {
            padding-top: 70px;
        }
        .alert {
            display: none;
            font-size: x-large;
        }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#form').submit(function(e){
                    e.preventDefault();
                    //hide if message visible from last time
                    $('.alert').hide();

                    //send ajax request to get if site is up
                    $.post( "backend.php", {url: $('#url').val()}, function(data) {
                        //on success
                        //parse returned data to see the status of the url
                        var result_json = JSON.parse(data);
                        if (result_json.result) {
                            $('.alert-success').html(result_json.message);
                            $('.alert-success').show();
                        } else {
                            $('.alert-danger').html(result_json.message);
                            $('.alert-danger').show();
                        }
                    })
                    //on fail
                    .fail(function(data) {
                        //alert error message
                        alert("We have prolem now can you try again");
                    });
                    return false;
                });
            });
        </script>
    </head>

    <body>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <form id="form" action="./" method="post" class="form-inline">
                        <div class="form-group">
                            <h2>Check if website is up or down?</h2>
                            <input placeholder="http://example.com" class="form-control" type="text" name="url" id="url">
                            <button type="submit" class="btn btn-default">Is it up?</button>
                        </div>
                    </form>
                    <hr>
                    <div role="alert" class="alert alert-success">
                    </div>
                    <div role="alert" class="alert alert-danger">
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