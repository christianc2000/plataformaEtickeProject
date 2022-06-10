<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Optics</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-touch-icon-114x114.png') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prettyPhoto.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span> </button>
                <a class="navbar-brand" href="index.html">Etickbol</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" class="page-scroll">Home</a></li>
                    <li><a href="#about-section" class="page-scroll">About</a></li>
                    <li><a href="#services-section" class="page-scroll">Services</a></li>
                    <li><a href="#works-section" class="page-scroll">Portfolio</a></li>
                    <li><a href="#contact-section" class="page-scroll">Contact</a></li>
                    <li><a href="#" class="page-scroll btn" style="background: rgb(68, 68, 138); margin: 3px; margin-right: 5px; width: 60px; align-items: center; padding: 10px">SigIn</a></li>
                    <li><a href="#" class="page-scroll btn" style="background: rgb(235, 43, 100); margin: 3px; width: 60px; align-items: center; padding: 10px">LogIn</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header-->
 <header class="text-center" name="home">
        <div class="intro-text">
            <h1>Eticket Bolivia <span class="color">Optics</span></h1>
            <p>An award winning digital design and development company</p>
            <div class="clearfix"></div>
            <a href="#about-section" class="btn btn-default btn-lg page-scroll">Learn More</a>
        </div>
    </header>
    <!-- About Section-->
    <div id="about-section">
        <div class="container">
            <div class="section-title">
                <h2>About Us</h2>
                <hr>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Who We Are</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam.
                        Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam
                        commodo nibh ante facilisis bibendum.</p>
                </div>
                <div class="col-md-4">
                    <h4>What We Do</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam.
                        Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam
                        commodo nibh ante facilisis bibendum.</p>
                </div>
                <div class="col-md-4">
                    <h4>Why Choose Us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam.
                        Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam
                        commodo nibh ante facilisis bibendum.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Section
    <div id="services-section">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
                <hr>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-3 col-sm-6 service"> <i class="fa fa-desktop"></i>
                    <h4>Web design</h4>
                    <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque natoque
                        etiam.</p>
                </div>
                <div class="col-md-3 col-sm-6 service"> <i class="fa fa-gears"></i>
                    <h4>App Development</h4>
                    <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque.</p>
                </div>
                <div class="col-md-3 col-sm-6 service"> <i class="fa fa-pie-chart"></i>
                    <h4>Analystics</h4>
                    <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque natoque
                        etiam.</p>
                </div>
                <div class="col-md-3 col-sm-6 service"> <i class="fa fa-line-chart"></i>
                    <h4>Marketing</h4>
                    <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque natoque.
                    </p>
                </div>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-3 col-sm-6 service"> <i class="fa fa-shopping-cart"></i>
                    <h4>eCommerce</h4>
                    <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque natoque
                        etiam.</p>
                </div>
                <div class="col-md-3 col-sm-6 service"> <i class="fa fa-file-text-o"></i>
                    <h4>Content Development</h4>
                    <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque.</p>
                </div>
                <div class="col-md-3 col-sm-6 service"> <i class="fa fa-rocket"></i>
                    <h4>Branding</h4>
                    <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque natoque
                        etiam.</p>
                </div>
                <div class="col-md-3 col-sm-6 service"> <i class="fa fa-camera"></i>
                    <h4>Video & Photography</h4>
                    <p>Lorem ipsum dolor sit amet placerat facilisis felis mi in tempus eleifend pellentesque natoque.
                    </p>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Portfolio Section
    <div id="works-section">
        <div class="container"> -->
    <!-- Container
            <div class="section-title">
                <h2>Our Portfolio</h2>
                <hr>
                <div class="clearfix"></div>
            </div>
            <div class="categories">
                <ul class="cat">
                    <li>
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <li><a href="#" data-filter=".web">Web Design</a></li>
                            <li><a href="#" data-filter=".app">App Development</a></li>
                            <li><a href="#" data-filter=".branding">Branding</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="portfolio-items">
                    <div class="col-sm-6 col-md-3 col-lg-3 web">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="img/portfolio/01.jpg" rel="prettyPhoto">
                                    <div class="hover-text">
                                        <h4>Project Title</h4>
                                        <small>Web Design</small>
                                        <div class="clearfix"></div>
                                    </div>
                                    <img src="img/portfolio/01.jpg" class="img-responsive" alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 app">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="img/portfolio/02.jpg" rel="prettyPhoto">
                                    <div class="hover-text">
                                        <h4>Project Title</h4>
                                        <small>App Development</small>
                                        <div class="clearfix"></div>
                                    </div>
                                    <img src="img/portfolio/02.jpg" class="img-responsive" alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 web">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="img/portfolio/03.jpg" rel="prettyPhoto">
                                    <div class="hover-text">
                                        <h4>Project Title</h4>
                                        <small>Web Design</small>
                                        <div class="clearfix"></div>
                                    </div>
                                    <img src="img/portfolio/03.jpg" class="img-responsive" alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 web">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="img/portfolio/04.jpg" rel="prettyPhoto">
                                    <div class="hover-text">
                                        <h4>Project Title</h4>
                                        <small>Web Design</small>
                                        <div class="clearfix"></div>
                                    </div>
                                    <img src="img/portfolio/04.jpg" class="img-responsive" alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 app">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="img/portfolio/05.jpg" rel="prettyPhoto">
                                    <div class="hover-text">
                                        <h4>Project Title</h4>
                                        <small>App Development</small>
                                        <div class="clearfix"></div>
                                    </div>
                                    <img src="img/portfolio/05.jpg" class="img-responsive" alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 branding">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="img/portfolio/06.jpg" rel="prettyPhoto">
                                    <div class="hover-text">
                                        <h4>Project Title</h4>
                                        <small>Branding</small>
                                        <div class="clearfix"></div>
                                    </div>
                                    <img src="img/portfolio/06.jpg" class="img-responsive" alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 branding app">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="img/portfolio/07.jpg" rel="prettyPhoto">
                                    <div class="hover-text">
                                        <h4>Project Title</h4>
                                        <small>App Development, Branding</small>
                                        <div class="clearfix"></div>
                                    </div>
                                    <img src="img/portfolio/07.jpg" class="img-responsive" alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 web">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="img/portfolio/08.jpg" rel="prettyPhoto">
                                    <div class="hover-text">
                                        <h4>Project Title</h4>
                                        <small>Web Design</small>
                                        <div class="clearfix"></div>
                                    </div>
                                    <img src="img/portfolio/08.jpg" class="img-responsive" alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Team Section
    <div id="team-section">
        <div class="container">
            <div class="section-title">
                <h2>Meet the Team</h2>
                <hr>
            </div>
            <div id="row">
                <div class="col-md-3 col-sm-6 team">
                    <div class="thumbnail"> <img src="img/team/01.jpg" alt="..." class="team-img">
                        <div class="caption">
                            <h3>John Doe</h3>
                            <p>Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 team">
                    <div class="thumbnail"> <img src="img/team/02.jpg" alt="..." class="team-img">
                        <div class="caption">
                            <h3>Mike Doe</h3>
                            <p>Web Designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 team">
                    <div class="thumbnail"> <img src="img/team/03.jpg" alt="..." class="team-img">
                        <div class="caption">
                            <h3>Jane Doe</h3>
                            <p>Creative Director</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 team">
                    <div class="thumbnail"> <img src="img/team/04.jpg" alt="..." class="team-img">
                        <div class="caption">
                            <h3>Larry Show</h3>
                            <p>Project Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Contact Section
    <div id="contact-section">
        <div class="container">
            <div class="section-title center">
                <h2>Contact Us</h2>
                <hr>
            </div>
            <div class="col-md-4">
                <h4>Contact info</h4>
                <div class="space"></div>
                <p><i class="fa fa-map-marker"></i>4321 California St,<br>
                    San Francisco, CA 12345</p>
                <div class="space"></div>
                <p><i class="fa fa-envelope-o"></i>info@company.com</p>
                <div class="space"></div>
                <p><i class="fa fa-phone"></i>+1 123 456 1234</p>
            </div>
            <div class="col-md-8">
                <h4>Leave us a message</h4>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" placeholder="Name"
                                    required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" placeholder="Email"
                                    required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-default">Send Message</button>
                </form>
            </div>
        </div>
    </div>
    <div id="social-section">
        <div class="container">
            <div class="social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="container">
            <p>Copyright &copy; Optics. Designed by <a href="http://www.templatewire.com"
                    rel="nofollow">TemplateWire</a></p>
        </div>
    </div>
-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.1.11.1.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/SmoothScroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.isotope.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/contact_me.js') }}"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>

</html>
