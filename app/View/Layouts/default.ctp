<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>
		<?php echo $this->fetch('title'); ?> - 
		St.Marys Nursery and Garden Centers
	</title>
	
	<!-- Meta -->
	<?php echo $this->Html->charset(); ?>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Web Page for St.Marys Nursery and Garden Center" name="description">
    <meta content="Cameron Hrycyna" name="author">

    <!-- Favicon -->
    <?php echo $this->Html->meta('icon'); ?>

    <!-- Web Fonts -->
    <link rel="shortcut" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&subset=cyrillic,latin">
    
    <!-- CSS Global Compulsory -->
    <?php echo $this->Html->css('plugins/bootstrap/bootstrap.min.css');?>
    <?php echo $this->Html->css('style.css');?>

    <!-- CSS Header and Footer -->
    <?php echo $this->Html->css('headers/header-v6.css');?>
    <?php echo $this->Html->css('footers/footer-v5.css');?>

    <!-- CSS Implementing Plugins -->
    <?php echo $this->Html->css('plugins/animate.css');?>
    <?php echo $this->Html->css('plugins/line-icons/line-icons.css');?>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <?php echo $this->Html->css('plugins/revolution-slider/settings.css');?>
    <!--[if lt IE 9]><?php echo $this->Html->css('plugins/revolution-slider/settings-ie8.css');?><!--[endif]-->
    
    <!-- CSS Theme -->
    <?php echo $this->Html->css('theme-colors/dark-blue.css');?>
    
    <!-- CSS Customization -->
    <?php echo $this->Html->css('custom.css');?>
	<?php echo $this->fetch('css');	?>
</head>
<body class="header-fixed header-fixed-space">
	<div class="wrapper">
		<!--=== Header v6 ===-->
    	<div class="header-v6 header-classic-white header-sticky">
	        <!-- Navbar -->
	        <div class="navbar mega-menu" role="navigation">
	            <div class="container container-space">
	                <!-- Brand and toggle get grouped for better mobile display -->
	                <div class="menu-container">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	
	                    <!-- Navbar Brand -->
	                    <div class="navbar-brand">
	                        <a href="index.html">
	                            <img class="shrink-logo" src="/img/unify/logo1-default.png" alt="Logo">
	                        </a>
	                    </div>
	                    <!-- ENd Navbar Brand -->
	                    
	                    <!-- Header Inner Right -->
	                    <div class="header-inner-right">
	                        <ul class="menu-icons-list">
	                            <li class="menu-icons">
	                                <i class="menu-icons-style search search-close search-btn fa fa-search"></i>
	                                <div class="search-open">
	                                    <input type="text" class="animated fadeIn form-control" placeholder="Start searching ...">
	                                </div>
	                            </li>
	                        </ul>
	                    </div>
	                    <!-- End Header Inner Right -->
	                </div>
	
	                <!-- Collect the nav links, forms, and other content for toggling -->
	                <div class="collapse navbar-collapse navbar-responsive-collapse">
	                    <div class="menu-container">
	                        <ul class="nav navbar-nav">
	                            <!-- Home -->
	                            <li><a href="/"> Home</a></li>
	                            <!-- End Home -->
	
	                            <!-- Garden Center -->
	                            <li class="dropdown">
	                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
	                                    Garden Center
	                                </a>
	                                <ul class="dropdown-menu">
	                                	<li class="dropdown-submenu">
	                                        <a href="javascript:void(0);">Greenhouse</a>
	                                        <ul class="dropdown-menu">
			                                    <li><a href="perennials.html">Perennials </a></li>
			                                    <li><a href="annuals.html">Annuals </a></li>
			                                    <li><a href="fruits_and_vegetables.html">Fruits and Vegetables </a></li>
												<li><a href="tropicals.html">Tropicals </a></li>
		                                    </ul>
	                                    </li>
	                                    <li class="dropdown-submenu">
	                                        <a href="javascript:void(0);">Nursery</a>
	                                        <ul class="dropdown-menu">
			                                    <li><a href="trees_and_shrubs.html">Trees and Shrubs</a></li>
			                                    <li><a href="large_stock.html">Large Stock </a></li>
		                                    </ul>
	                                    </li>
	
	                                    <li><a href="page_about2.html">Plant Finder </a></li>
	                                    <li><a href="pottery_and_containers.html">Pottery & Containers </a></li>
	                                    <li><a href="garden_pieces.html">Garden Pieces </a></li>
	                                    <li><a href="fountains_and_miniature_ponds.html">Fountains & Miniature Ponds </a></li>
	                                </ul>
	
	                            </li>
	                            <!-- End Pages -->
	                            								
	                            <!-- Gift Store -->
	                            <li class="dropdown">
	                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
	                                    Gift Store
	                                </a>
	                                <ul class="dropdown-menu">
	                                    <li><a href="feature_gallery.html">Fashion</a></li>
	                                    <li><a href="feature_animations.html">Gourmet</a></li>
	                                    <li><a href="feature_parallax_counters.html">Home Decor</a></li>
	                                    <li><a href="feature_testimonials_quotes.html">Christmas</a></li>
	                                </ul>
	                            </li>
	                            <!-- End Gift Store -->
	                            
								<!-- Landscaping -->
	                            <li class="dropdown">
	                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
	                                    Landscaping
	                                </a>
	                                <ul class="dropdown-menu">
	                                    <li><a href="feature_gallery.html">Landscape Design</a></li>
	                                    <li><a href="feature_animations.html">Landscape Installation</a></li>
	                                    <li><a href="feature_parallax_counters.html">Commercial Landscaping</a></li>
	                                    <li><a href="feature_testimonials_quotes.html">Affiliates</a></li>
	                                </ul>
	                            </li>
	                            <!-- End Landscaping -->
	
								<!-- About Us -->
								<li class="dropdown">
	                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
	                                    Community
	                                </a>
	                                <ul class="dropdown-menu">
                                	    <li><?php echo $this->Html->link('Blog', array('controller' => 'posts', 'action' => 'index'))?></li>	
                                	    <li><a href="who_are_we.html">Event Calendar</a></li>
	                                </ul>
	                            </li>
	                            <!-- End About Us -->
	
	                            <!-- About Us -->
								<li class="dropdown">
	                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
	                                    About Us
	                                </a>
	                                <ul class="dropdown-menu">
                                	    <li><a href="WhoAreWe">Who Are We</a></li>
                                	    <li><a href="OurExperience">Our Experience</a></li>	
	                                	<li><a href="job_opportunities.html">Job Opportunities</a></li>
	                                	<li><a href="contact_us.html">Contact Us</a></li>
	                                </ul>
	                            </li>
	                            <!-- End About Us -->
	                            <?php if (isset($loggedIn)) : ?>
	                            <li class="">
	                            	<a href="/admin/logout">Log Out</a>
	                            </li>
	                            <?php endif;?>
	                        </ul>
	                    </div>
	                </div><!--/navbar-collapse-->
	            </div>
	        </div>
	        <!-- End Navbar -->
	    </div>
	    <!--=== End Header v6 ===-->
    	
    	<?php echo $this->fetch('content'); ?>
		
		<?php echo $this->element('sql_dump'); ?>
		
		
		<div id="footer-v5" class="footer-v5">
	        <div class="footer">
	            <div class="container">
	                <div class="row">
	                    <!-- About Us -->
	                    <div class="col-md-3 sm-margin-bottom-40">
	                        <div class="heading-footer"><h2>About Us</h2></div>
	                        <p>Today we continue the basis of our historical roots while changing with the times. Our gift shop is a "realm of shops within shops" , comprised of the latest in home décor and gift extending into local & world gourmet; while featuring unique and latest fashions from Canada and abroad.</p><br>
	                        <ul class="list-inline dark-social-v2">
	                            <li><a href="https://www.facebook.com/pages/St-Marys-Nursery-and-Garden-Centre-Ltd/128776243867073"><i class="rounded-sm fa fa-facebook"></i></a></li>
	                            <li><a href="https://twitter.com/StMarysNursery"><i class="rounded-sm fa fa-twitter"></i></a></li>
	                            <!-- <li><a href="#"><i class="rounded-sm fa fa-google-plus"></i></a></li> -->
	                            <li><a href="http://instagram.com/stmarysnursery?ref=badge"><i class="rounded-sm fa fa-instagram"></i></a></li>
	                            <!-- <li><a href="#"><i class="rounded-sm fa fa-tumblr"></i></a></li> -->
	                            <!-- <li><a href="#"><i class="rounded-sm fa fa-pinterest"></i></a></li> -->
	                        </ul>
	                    </div>
	                    <!-- End About Us -->
	
	                    <!-- Recent News -->
	                    <div class="col-md-3 sm-margin-bottom-40">
	                        <div class="heading-footer"><h2>Recent Newsletters</h2></div>
	                        <ul class="list-unstyled link-news">
                        	<?php $campaigns = array( ); ?>
                        	<?php foreach ($campaigns as $newsletter) :?>
	                            <li>
	                                <a href="#">Apple Conference</a>
	                                <small>12 July, 2014</small>
	                            </li>
	                            <li>
	                                <a href="#">Bootstrap Update</a>
	                                <small>12 July, 2014</small>
	                            </li>
	                            <li>
	                                <a href="#">Themeforest Templates</a>
	                                <small>12 July, 2014</small>
	                            </li>
                            <?php endforeach; ?>
	                        </ul>
	                    </div>
	                    <!-- End Recent News -->
	
	                    <!-- Recent Blog Entries -->
	                    <div class="col-md-3 sm-margin-bottom-40">
	                        <div class="heading-footer"><h2>Recent Blog Entries</h2></div>
	                        <ul id="rPosts" class="list-unstyled thumb-news"></ul>
	                    </div>
	                    <!-- End Recent Blog Entries -->
	
	                    <!-- Latest Tweets -->
	                    <div class="col-md-3">
	                        <div class="heading-footer"><h2>Latest Tweets</h2></div>
	                        <ul class="list-unstyled tweets">
	                            <li>
	                                <i class="fa fa-twitter"></i>
	                                <div class="overflow-h">
	                                    <p><a href="#">@Toronto </a>voluptates repudiandae sint et molestiae non recusandae.</p>
	                                    <small>3 Hours ago</small>
	                                </div>
	                            </li>
	                            <li>
	                                <i class="fa fa-twitter"></i>
	                                <div class="overflow-h">
	                                    <p><a href="#">@Twitter </a>Maecenas pharetra tellus et fringilla. Praesent ut consectetur diam.</p>
	                                    <small>7 Hours ago</small>
	                                </div>
	                            </li>
	                        </ul>
	                    </div>
	                    <!-- End Latest Tweets -->
	                </div>
	            </div><!--/container -->
	        </div>
	
	        <div class="copyright">
	            <div class="container">
	                <ul class="list-inline terms-menu">
	                    <li class="silver">Copyright © 2015 - All Rights Reserved</li>
	                    <li><a href="/TermsOfUse">Terms of Use</a></li>
	                    <li><a href="/PrivacyPolicy">Privacy Policy</a></li>
	                    <li><a href="/License">License</a></li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</div>
	
	<!-- JS Global Compulsory -->
    <?php echo $this->Html->script('plugins/jquery/jquery.min.js');?>
    <?php echo $this->Html->script('plugins/jquery/jquery-migrate.min.js');?>
    <?php echo $this->Html->script('plugins/bootstrap/bootstrap.min.js');?>
	
	<!-- JS Implementing Plugins -->
	<?php echo $this->Html->script('back-to-top.js');?>
    <?php echo $this->Html->script('plugins/smoothScroll.js');?>
	<?php echo $this->Html->script('plugins/jquery.parallax.js');?>
	<?php echo $this->Html->script('plugins/counter/waypoints.min.js');?>
	<?php echo $this->Html->script('plugins/counter/jquery.counterup.min.js');?>
	<?php echo $this->Html->script('plugins/revolution-slider/jquery.themepunch.tools.min.js');?>
	<?php echo $this->Html->script('plugins/revolution-slider/jquery.themepunch.revolution.min.js');?>

	<!-- JS Customization -->
	<?php echo $this->Html->script('custom.js');?>
	
	<!-- JS Page Level -->
	<?php echo $this->Html->script('app.js');?>
	<?php echo $this->Html->script('api.js')?>
	<?php echo $this->Html->script('plugins/revolution-slider.js')?>
	<?php echo $this->fetch('script');	?>
	
	<script>
	jQuery(document).ready(function() {
	    App.init();
	    App.initCounter();
	    App.initParallaxBg();
	    RevolutionSlider.initRSfullScreenOffset();
	});
	</script>
	
	<!--[if lt IE 9]>
	    <script src="assets/plugins/respond.js"></script>
	    <script src="assets/plugins/html5shiv.js"></script>
	    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
</body>
</html>
