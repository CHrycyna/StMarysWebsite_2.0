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
		St.Marys Nursery and Garden Center:
		<?php echo $this->fetch('title'); ?>
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
    <?php echo $this->Html->css('bootstrap/bootstrap.min.css');?>
    <?php echo $this->Html->css('style.css');?>

    <!-- CSS Header and Footer -->
    <?php echo $this->Html->css('headers/header-default.css');?>
    <?php echo $this->Html->css('footers/footer-v1.css');?>

    <!-- CSS Implementing Plugins -->
    <?php echo $this->Html->css('animate.css');?>
    <?php echo $this->Html->css('line-icons/line-icons.css');?>
    <?php echo $this->Html->css('font-awesome/font-awesome.css');?>
    
    <!-- CSS Theme -->
    <?php echo $this->Html->css('theme-colors/default.css');?>
    
    <!-- CSS Customization -->
    <?php echo $this->Html->css('custom.css');?>
	<?php echo $this->fetch('css');	?>
</head>
<body>
	
	<?php echo $this->fetch('content'); ?>

	<?php echo $this->element('sql_dump'); ?>
	
	<!-- JS Global Compulsory -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- JS Implementing Plugins -->
	<script src="assets/plugins/back-to-top.js"></script>
	<script src="assets/plugins/smoothScroll.js"></script>
	
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<?php echo $this->fetch('script'); ?>
	
	<!-- JS Page Level -->
	<script src="assets/js/app.js"></script>
	<script>
	jQuery(document).ready(function() {
	    App.init();
	});
	</script>
	
	<!--[if lt IE 9]>
	    <script src="assets/plugins/respond.js"></script>
	    <script src="assets/plugins/html5shiv.js"></script>
	    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
</body>
</html>
