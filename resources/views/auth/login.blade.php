<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Login</title>

        <!-- Base Css Files -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="dist/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="dist/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="dist/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="dist/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="dist/css/waves-effect.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="dist/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="dist/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="dist/js/modernizr.min.js"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Number one jobs</strong> </h3>
                </div> 


                <div class="panel-body">
                    
                    <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="form-group ">
                        <div class="col-xs-12">
                             <input id="email" required="" placeholder="E-Mail" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}">
                        </div>

                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
              
            </div>                    
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" name="password" type="password" required="" placeholder="Password">
                        </div>

                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-success">
                                <input id="remember_me" name="remember_me" type="checkbox">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="{{ url('/password/reset') }}"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                         <div class="col-sm-5 text-right">
                            <a href="{{ url('/register') }}">Create an account</a>
                        </div> 
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

        
        <script>
            var resizefunc = [];
        </script>
        <script src="dist/js/jquery.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="dist/js/waves.js"></script>
        <script src="dist/js/wow.min.js"></script>
        <script src="dist/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="dist/js/jquery.scrollTo.min.js"></script>
        <script src="dist/assets/jquery-detectmobile/detect.js"></script>
        <script src="dist/assets/fastclick/fastclick.js"></script>
        <script src="dist/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="dist/assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="dist/js/jquery.app.js"></script>
    
    </body>
</html>