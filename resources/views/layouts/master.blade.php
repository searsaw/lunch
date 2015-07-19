<!DOCTYPE html>
<html>
    <head>
        <title>Lunch Run</title>
        <link rel='stylesheet' href='/css/style.css' >
        <link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">  
    </head>
    <body>
        <div class='pull-right toprightmenu'>
            <a href="/organizations">Home</a> |
            <a href="/auth/logout">Logout</a>
        </div>

        <div id="page_header">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <h1> <img src="/img/round-logo.png" height="42" width="42"> Lunch Run</h1> 

                    </div><!-- end col-md-12 -->

                </div><!-- end row -->

            </div><!-- end container -->


        </div><!-- end page_header -->

        <div id="main-content">
            <div id="content_text">

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                @yield('content_text')
                @yield('content')
            </div>
        </div><!-- end content -->

        <div class="footer">
        </div>

    </body>
</html>