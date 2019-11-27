@if (Auth::check())
    <script> window.location="{{ route('dashboard') }}"</script>
@endif    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | G-Hire</title>
    <link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="pages/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="pages/assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="pages/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="pages/assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Core JS files -->
    <script src="global_assets/js/main/jquery.min.js"></script>
    <script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

</head><!--/head-->

<body>
    <header id="header">      
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ route('default') }}">
                        <h1>G-Hire</h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{ route('Devregister') }}">Work as a Developer</a></li> 
                        <li><a href="{{ route('login') }}">Sign-In</a></li> 
                        <li><a href="{{ route('POregister') }}">REGISTER</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div class="main-slider">
                    <div class="slide-text">
                        <h1>Find The Perfect Developer Services For Your Project</h1>
                         <form role="form">
                            <div class="form-group-feedback form-group-feedback-right">
                                <input type="text" name="with_icon" class="form-control" required="" placeholder="Search Service" aria-invalid="true">
                                <div class="form-control-feedback">
                                    <i class="icon-search4"></i>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div>
                            <span>Popular: </span>
                            <button type="button" class="btn btn-outline-secondary btn-sm">Web Development</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">App Development</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">Desktop Application</button>
                        </div>
                    </div>
                    <img src="images/home/slider/pc.png" class="slider-hill" alt="slider image">
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="images/home/testing_maintain.svg" alt="">
                        </div>
                        <h2>Full-Stack Developer</h2>
                        <p>Ground round tenderloin flank shank ribeye. Hamkevin meatball swine. Cow shankle beef sirloin chicken ground round.</p>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                            <img src="images/home/UI_UX.svg" alt="">
                        </div>
                        <h2>Front-End Developer</h2>
                        <p>Hamburger ribeye drumstick turkey, strip steak sausage ground round shank pastrami beef brisket pancetta venison.</p>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <img src="images/home/programming_tech.svg" alt="">
                        </div>
                        <h2>Back-End Developer</h2>
                        <p>Venison tongue, salami corned beef ball tip meatloaf bacon. Fatback pork belly bresaola tenderloin bone pork kevin shankle.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="action" class="responsive">
        <div class="vertical-center">
             <div class="container">
                <div class="row">
                    <div class="action take-tour">
                        <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                            <b><h2>Find Developer Services For Your Project Today</h2></b>
                            <h5>We've got you covered for all your projects needs</h5>
                        </div>
                        <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="tour-button">
                                <a href="pages/login_registration_advanced.php" class="btn btn-common">Get Started</a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="features">
        <div class="container">
            <div class="row">
                <div class="single-features">
                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="images/home/vcs.png" class="img-responsive" alt="">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1>Version Control System</h1>
                        <P>Now control Projects with more extended feature of Version Control System to get more from one project.</P>
                    </div>
                </div>
                <div class="single-features">
                    <div class="col-sm-6 col-sm-offset-1 align-right wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1>Screen Sharing</h1>
                        <P>Developer can Share Screen anytime to let you know about the current situation of the project.</P>
                    </div>
                    <div class="col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="images/home/screen-sharing.png" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="single-features">
                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="images/home/payment-protection.png" class="img-responsive" alt="">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1>Payment Protection, Guaranteed</h1>
                        <P>Payment is released to the freelancer once you’re pleased and approve the work you get.</P>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!--/#features-->


    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <p>&copy; G-Hire 2019. All Rights Reserved.</p>
                        <a target="_blank" href="http://www.themeum.com">Privacy Policy</a> |
                        <a target="_blank" href="http://www.themeum.com">Terms of Services</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
