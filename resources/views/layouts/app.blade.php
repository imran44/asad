<!DOCTYPE html>
<html>
    <head>
       @include('layouts.header')
    </head>


   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="asset/img/logo.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div #="logo">
                            <h5 class="header-logo"> Number Jobs
                               <img src="asset/images/logo/loo.jpg" alt="">
                               </h5>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">

                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{ url('/login') }}" class="btn head-btn1 button-login">Login</a>
                                    <a href="{{ url('/register') }}" class="btn head-btn2 button-signup">Sign Up</a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>


    <main>

        <!--- Welcome starts   -->
    <section>
        <div class="welcome">
            <div class="container">
                <div class="section-welcome">
                     <div class="row">
                        <div class="col-xl-12 col-lg-12">
                             <h5>   <span>60 ,000</span> members.</h5>
                             <p class="jobsite"> Welcome to number 1 job posting site. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome End-->
    </section>
     <div class="container-fluid">
        <div class="row">
            <div class="pull-left">
                <button class="members-feedback"> Feedback</button>
            </div>
        </div>
    </div>

    


                        <!-- Start Widget -->
                        @yield('content')
                       




<footer>
    

 @include('layouts.footer')
</footer>


    </body>
</html>