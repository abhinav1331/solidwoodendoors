<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">  
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<?php wp_head(); ?>
	  <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,200italic,100italic,300,300italic,400italic,500,500italic,600,700,700italic,600italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="main">
        <header class="header">
            <div class="container-fluid">
                <div class="header-inner">
                    <div class="top-contact">
                        <ul>
                            <li>Chelsea: <a href="tel:02073767000">0207 376 7000</a></li>
                            <li>Esher: <a href="tel:01932851081">01932851081</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <nav class="navbar">
                <div class="container-fluid">
                    <a class="logo" href="<?php echo site_url(); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="Logo" title=""></a>
                    <div class="right-menu pull-right">
                        <ul>
                            <li class="search-li">
                                <a class="search-icon" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            </li>
                            <li class="account-li dropdown">
                                <a href="#" class="dropdown-toggle" id="setting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="setting">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="cart-li dropdown">
                                <a href="#" class="dropdown-toggle" id="setting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-shopping-bag" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="setting">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="main-menu pull-right">
                        <ul>
                            <li><a href="">About</a></li>
                            <li class="menu-item-has-children"><a href="http://swd.stagingdevsite.com/product_category.html">Products</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#">Products 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Products 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Products 3</a>
                                    </li>
                                    <li>
                                        <a href="#">Products 4</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Size guide</a></li>
                            <li><a href="http://swd.stagingdevsite.com/portfolio.html">Portfolio</a></li>
                            <li><a href="http://swd.stagingdevsite.com/FAQ.html">Faq</a></li>
                            <li><a href="http://swd.stagingdevsite.com/Blog.html">Blog</a></li>
                            <li><a href="http://swd.stagingdevsite.com/contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>