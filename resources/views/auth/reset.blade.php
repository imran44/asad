<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="{{ URL::asset('dist/images/index.ico') }}">

        <title>Food Point  @yield('title')</title>

        <!-- Base Css Files -->
        <link rel="stylesheet" href="{{ URL::asset('dist/css/bootstrap.min.css') }}" />
       

        <!-- matrial deisgin -->
        
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('materialize/css/materialize.min.css') }}" />
        
<link rel="stylesheet" href="{{ URL::asset('materialize/css/ripples.min.css') }}" />
       <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css"> -->
        <!-- Font Icons -->
        <link rel="stylesheet" href="{{ URL::asset('dist/assets/font-awesome/css/font-awesome.min.css') }}" />
        
        <link rel="stylesheet" href="{{ URL::asset('dist/assets/ionicon/css/ionicons.min.css') }}" />
        <link href="" rel="stylesheet" />
        <link rel="stylesheet" href="{{ URL::asset('dist/css/material-design-iconic-font.min.css') }}" />
        

        <!-- animate css -->
        <link rel="stylesheet" href="{{ URL::asset('dist/css/animate.css') }}" />
        

        <!-- Waves-effect -->
        <link rel="stylesheet" href="{{ URL::asset('dist/css/waves-effect.css') }}" />
       

        <!-- sweet alerts -->
        <link rel="stylesheet" href="{{ URL::asset('dist/assets/sweet-alert/sweet-alert.min.css') }}" />
       

        <!-- Custom Files -->
        <link rel="stylesheet" href="{{ URL::asset('dist/css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('dist/css/helper.css') }}" />
        



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

<!-- form validation -->
        <!--Form Wizard-->
        <link rel="stylesheet" href="{{ URL::asset('dist/assets/form-wizard/jquery.steps.css') }}" />

        <script src="{{ URL::asset('dist/js/modernizr.min.js') }}"></script>



    </head>
<body>
        
<div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">

                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Reset Password </h3>
                </div> 

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                 </div>                                 
                
            </div>
        </div>
<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->

<script type="text/javascript" src="{!! asset('dist/js/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/waves.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/wow.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/jquery.nicescroll.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/jquery.scrollTo.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/chat/moment-2.2.1.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/jquery-sparkline/jquery.sparkline.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/jquery-detectmobile/detect.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/fastclick/fastclick.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/jquery-slimscroll/jquery.slimscroll.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/jquery-blockui/jquery.blockUI.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/sweet-alert/sweet-alert.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/sweet-alert/sweet-alert.init.js') !!}"></script>
@include('sweet::alert')
<script type="text/javascript" src="{!! asset('dist/assets/flot-chart/jquery.flot.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/flot-chart/jquery.flot.time.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/flot-chart/jquery.flot.tooltip.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/flot-chart/jquery.flot.resize.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/flot-chart/jquery.flot.pie.js') !!}"></script>

<script type="text/javascript" src="{!! asset('dist/assets/flot-chart/jquery.flot.selection.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/flot-chart/jquery.flot.stack.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/flot-chart/jquery.flot.crosshair.js') !!}"></script>


<script type="text/javascript" src="{!! asset('dist/assets/counterup/waypoints.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/counterup/jquery.counterup.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/jquery.todo.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/jquery.app.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/jquery.dashboard.js') !!}"></script>


<script type="text/javascript" src="{!! asset('dist/js/jquery.chat.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/jquery.validate/jquery.validate.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/assets/jquery.validate/form-validation-init.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('dist/assets/jquery.validate/form-validation-init.js') !!}"></script>
        <!--Form Wizard-->
        <script type="text/javascript" src="{!! asset('dist/assets/form-wizard/jquery.steps.min.js') !!}"></script>
          <script type="text/javascript" src="{!! asset('dist/assets/jquery.validate/jquery.validate.min.js') !!}"></script>

        <!--wizard initialization-->
        <script src="" type="text/javascript"></script>
<script type="text/javascript" src="{!! asset('dist/assets/form-wizard/wizard-init.js') !!}"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.1.5/js/ripples.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script type="text/javascript" src="{!! asset('materialize/js/arrive.min.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('materialize/js/ripples.min.js') !!}"></script>  
 <script>
  $.material.init();
</script>     

       
        <!-- flot Chart -->
       
        

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */

         
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
    
    </body>
</html>
