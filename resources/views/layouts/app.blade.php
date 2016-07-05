<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('pageTitle')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- App style -->
    <link href="/css/app.css" rel="stylesheet">
    
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <!-- moment js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>    
    
    <!-- Date and time picker -->
    <script src="/js/bootstrap-datetimepicker.js"></script>
    
    <!-- highlight js -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/agate.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div id="nav">
            <div id="nav-contents">
                <div id="title">
                    <a href="/">HARRY DOES CODE.</a>
                </div> <!-- #title -->
                <div id="nav-links">
                    <a href="/">HOME</a> | 
                    <a href="/post/projects">PROJECTS</a> | 
                    <a href="/post/about">ABOUT</a> |
                    <a href="$settings['Github']"><b>GITHUB</b></a>
                </div> <!-- #nav-links -->
                @if (Auth::check())
                <div id="admin-menu">
                    <a href="/admin/">Admin area</a> |
                    <a href="/logout/">Logout</a>
                </div>
                @endif
            </div> <!-- #nav-contents -->
        </div> <!-- #nav -->
        <div id="content-wrapper">
            <div id="content">
                @yield('content')
            </div> <!-- #content -->
            <hr/>
            <div id="footer">
                &copy; Harry Does Code {{ date("Y") }}
            </div> <!-- #footer -->
        </div><!-- #content-wrapper -->
        
    </div> <!-- #wrapper -->
</body>
</html>
