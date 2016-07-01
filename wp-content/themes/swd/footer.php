<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	  <footer class="footer">
            <div class="container-fluid">
                <div class="footer-inner">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="footer-menus">
                                <ul class="footer-menu">
                                    <li><a href="#">PRIVACY POLICY</a></li>
                                    <li><a href="#">SIZE GUIDE</a></li>
                                    <li><a href="#">TERMS & CONDITIONS</a></li>
                                    <li><a href="#">ACCOUNT</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="copyright">&copy; Copyright <?php echo date("Y"); ?> - Solid Wooden Doors Ltd | All Prices Exclude VAT</div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="social-icons">
                                <ul class="social-icon">
                                    <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="https://plus.google.com" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="https://www.pinterest.com" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    <li><a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="https://www.flickr.com" target="_blank"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="search-main">
            <div class="search-field">
                <div class="search-field-inner">
                    <input type="text" class="form-control" name="name" placeholder="Search">
                    <a class="search-btn" href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
                <a class="search-close-btn" href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>


<?php wp_footer(); ?>
   <!-- <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>-->

    <!-- Sticky Nav -->
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.sticky.js"></script>
    <!-- Animation -->
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/custom.js"></script>
    <!-- Portfolio Slider -->
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.sldr.js"></script>
</body>
</html>
