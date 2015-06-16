<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en" ng-app="testApp"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en" ng-app="testApp"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en" ng-app="testApp"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en" ng-app="testApp"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US" ng-app="testApp"> <!--<![endif]-->
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Cars</title>   

<meta name="description" content="Just car website" /> 

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>   

<!-- Mobile Internet Explorer ClearType Technology -->
<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

<link href="<?php echo base_url(); ?>public/ng/css/font-awesome.css" rel="stylesheet" />
<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>public/ng/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/ng/css/bootstrap.css" rel="stylesheet">

<!-- Main Style -->
<link href="<?php echo base_url(); ?>public/ng/css/main.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/ng/css/animate.css" rel="stylesheet" />



<link href="<?php echo base_url(); ?>public/ng/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/ng/css/bootstrap-theme.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>public/ng/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">



<!-- Supersized -->
<link href="<?php echo base_url(); ?>public/ng/css/supersized.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/ng/css/supersized.shutter.css" rel="stylesheet">

<!--log in   -->

<script type="text/javascript" src="<?php echo base_url(); ?>public/ng/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ng/js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/ng/css/style.css" />


<!-- FancyBox -->
<link href="<?php echo base_url(); ?>public/ng/css/fancybox/jquery.fancybox.css" rel="stylesheet">

<!-- Font Icons -->
<link href="<?php echo base_url(); ?>public/ng/css/fonts.css" rel="stylesheet">

<!-- Shortcodes -->
<link href="<?php echo base_url(); ?>public/ng/css/shortcodes.css" rel="stylesheet">

<!-- Responsive -->
<link href="<?php echo base_url(); ?>public/ng/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/ng/css/responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="href="<?php echo base_url(); ?>public/ng/css/styles.css" />


<!-- Supersized -->
<link href="<?php echo base_url(); ?>public/ng/css/supersized.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/ng/css/supersized.shutter.css" rel="stylesheet">

<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>

<!-- Fav Icon -->
<link rel="shortcut icon" href="#">

<link rel="apple-touch-icon" href="#">
<link rel="apple-touch-icon" sizes="114x114" href="#">
<link rel="apple-touch-icon" sizes="72x72" href="#">
<link rel="apple-touch-icon" sizes="144x144" href="#">

<!-- pop up -->
<link href="<?php echo base_url(); ?>public/ng/css/basicPopup.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>public/ng/css/basicPopupDefault.css" rel="stylesheet" type="text/css">

<!-- Modernizr -->
<script src="<?php echo base_url(); ?>public/ng/js/modernizr.js"></script>

<!-- Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'Insert Code']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- End Analytics -->

</head>


<body ng-controller="mainCtrl" style="padding-bottom: 200px;">

<!-- This section is for Splash Screen -->
<div class="ole">
<section id="jSplash">
	<div id="circle"></div>
</section>
</div>
<!-- End of Splash Screen -->

<!-- Homepage Slider -->
<div id="home-slider" style="height: 630px;">	
    <div class="overlay"></div>

    <div class="slider-text">
    	<div id=""></div>
    </div>   
	
	<div class="control-nav">
        <a id="prevslide" class="load-item"><i class="fa fa-angle-left"></i></a>
        <a id="nextslide" class="load-item"><i class="fa fa-angle-right"></i></a>
        <ul id="slide-list"></ul>
        
        <a id="nextsection" href="#news"><i class="fa fa-angle-down"></i></a>
    </div>
</div>
<!-- End Homepage Slider -->



<!-- Header -->
<header style="margin-bottom: 0px;">
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
        	<a id="goUp" href="#home-slider" title="Cars">Cars web site</a>
        </div>
        
        <nav id="menu" ng-controller="menuCtrl">
           
            <ul id="menu-nav">
                <!--<li><a href="#work">Our Work</a></li>-->
                <!--<li><a href="#about">About Us</a></li>-->
                <!--<li><a href="#contact">Contact</a></li>-->
                
<!--		<li><a  href="#/news"  class="external">Home</a></li>
                <li><a  href="#/profile"  class="external">User Profile</a></li>
                <li><a  href="#/login"  class="external">Log in</a></li>
                <li><a  href="#/reg"  class="external">Sign up</a></li>-->
                <!--<li><a href="#/contact" class="external">contact</a></li>-->
                <li ng-repeat="item in mainMenuItems">
                    <a href="#{{ item.url }}" class="external">{{item.title}}</a>
                </li>
            
                
                <li ng-hide="user">
                        <a href="#/login" class="external">Login</a>
                    </li>
                    <li ng-hide="user">
                        <a href="#/reg" class="external">Register</a>
                    </li>
                
                
                
                    <li ng-show="user">
                        <a href="#/logout" class="external">Logout</a>
                    </li>
                    <li ng-show="user">
                        <a href="#/profile" class="external">Welcome, {{user.name}}</a>
                    </li>
                
            </ul>
                
            
        </nav>
        
    </div
</header>
<!-- End Header -->




<div ng-view style="background-color: #5f656c;padding-top: 90px;"></div>


<!-- Footer -->
<div style=" margin-bottom: 0px; " class="footer ">

<!--<div style="margin-top:550px; margin-bottom: 0px;" class="footer">-->
    <footer class="navbar footer" style="margin-bottom: 0px; background: #26292E;
">
    
    
<!-- Socialize -->
<div id="social-area">
	<div class="container">
    	<div class="row" style="background: #26292E;">
            <div class="span12">
                <nav id="social" style="background: #26292E;">
                    <ul>
                        <li><a href="https://twitter.com" title="Follow Us on Twitter" target="_blank"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="http://dribbble.com" title="Follow Us on Dribbble" target="_blank"><span class="fa fa-dribbble"></span></a></li>
                        <li><a href="https://www.facebook.com" title="Follow Us on Facebook" target="_blank"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="https://plus.google.com" title="Follow Us on Google Plus" target="_blank"><span class="fa fa-google-plus"></span></a></li>
                        <li><a href="http://www.linkedin.com" title="Follow Us on LinkedIn" target="_blank"><span class="fa fa-linkedin"></span></a></li>
                    

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Socialize -->
                        	<p class="credits span3">&copy;2015. </p>

</footer>
    
<!-- End Footer -->
</div>
<!-- Back To Top -->
<a id="back-to-top" href="#">
	<i class="fa fa-angle-up"></i>
</a>
<!-- End Back to Top -->




<!-- Js -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- jQuery Core -->
<script src="<?php echo base_url(); ?>public/ng/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="<?php echo base_url(); ?>public/ng/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
<script src="<?php echo base_url(); ?>public/ng/js/waypoints.js"></script> <!-- WayPoints -->
<script src="<?php echo base_url(); ?>public/ng/js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
<script src="<?php echo base_url(); ?>public/ng/js/jquery.isotope.js"></script> <!-- Isotope Filter -->
<script src="<?php echo base_url(); ?>public/ng/js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
<script src="<?php echo base_url(); ?>public/ng/js/jquery.fancybox-media.js"></script> <!-- Fancybox for Media -->
<script src="<?php echo base_url(); ?>public/ng/js/jquery.tweet.js"></script> <!-- Tweet -->
<script src="<?php echo base_url(); ?>public/ng/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<script src="<?php echo base_url(); ?>public/ng/js/main.js"></script> <!-- Default JS -->
<script src="<?php echo base_url(); ?>public/ng/js/angular.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/ng/js/angular-route.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/ng/js/app.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ng/js/script.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ng/js/placeholder.js type="text/javascript"></script>
<!--<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>-->
<script src="<?php echo base_url(); ?>public/ng/js/jquery.basicPopup.js"></script>
<!--<script src="<?php echo base_url(); ?>public/ng/js/scripts.js"></script>-->
<!--<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->




<!--<script src="<?php echo base_url(); ?>public/ng/js/jquery-1.11.0.min.js" charset="UTF-8"></script>-->
<script src="<?php echo base_url(); ?>public/ng/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="<?php echo base_url(); ?>public/ng/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<!-- End Js -->

</body>
</html>
