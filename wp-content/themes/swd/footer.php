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
 <ul class="sub-menu">
 <?php
		$args = array( 'taxonomy' => 'products_category','hide_empty'=> 0 , 'parent' => 0);
		$terms = get_terms('products_category', $args);
		if (count($terms) > 0) {
			foreach ($terms as $term) 
			{
				?><li class="col-sm-3">
			<h2><a href="<?php echo get_category_link( $term->term_id ); ?>"><?php echo $term->name; ?></a></h2>
			<ul>
			<?php
			$args1 = array( 'taxonomy' => 'products_category','hide_empty'=> 0 , 'parent' => $term->term_id);
			$terms1 = get_terms('products_category', $args1);
			if (count($terms1) > 0) {
			foreach ($terms1 as $term11) 
			{
				?>
				<li><a href="<?php echo get_category_link( $term11->term_id ); ?>"><?php echo $term11->name; ?></a></li>
				
		<?php
			}
		}
		?>
			</ul>

		</li>
		<?php
			}
		}
		?>
       </ul>

<?php wp_footer(); ?>
   <!--<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>-->

    <!-- Sticky Nav -->
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.sticky.js"></script>
    <!-- Animation -->
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
    <!-- Portfolio Slider -->
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/custom.js"></script>
    <!--slider-->
    <script src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.js'></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owltwo.js"></script>
	
	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request A Brochure</h4>
      </div>
      <div class="modal-body">
		<form role="form">
			<div class="form-group">
				<label for="full_name">Name*</label>
				<input type="text" class="form-control" name="full_name" id="full_name">
			</div>
			<div class="form-group">
				<label for="c_name">Company name</label>
				<input type="text" class="form-control" name="c_name" id="c_name">
			</div>
			<div class="form-group">
				<label for="address">Address*</label>
				<input type="text" class="form-control" name="address" id="address">
			</div>
			<div class="form-group">
				<label for="t_city">Town/City*</label>
				<input type="text" class="form-control" name="t_city" id="t_city">
			</div>
			<div class="form-group">
				<label for="c_name">Postcode*</label>
				<input type="text" class="form-control" name="c_name" id="c_name">
			</div>
			<div class="form-group">
				<label for="tphone">Telephone*</label>
				<input type="text" class="form-control" name="tphone" id="tphone">
			</div>
			<div class="form-group">
				<label for="email_addr">Email*</label>
				<input type="text" class="form-control" name="email_addr" id="email_addr">
			</div>
			<div class="form-group">
				<label for="special_notes">Special notes</label>
				<input type="text" class="form-control" name="special_notes" id="special_notes">
			</div>
			<div class="form-group">
				<label for="n_dors">No. Of Doors Required*</label>
				<select name="n_dors" class="form-control" id="n_dors">
					<option value="">Choose a Value</option>
					<option value="Under 10">Under 10</option>
					<option value="10 - 20">10 - 20</option>
					<option value="20 - 30">20 - 30</option>
					<option value="Over 30">Over 30</option>
				</select>
			</div>
			<div class="form-group">
				<label for="type_of_b">Type of Brochure* </label>
				<select name="type_of_b" class="form-control" id="type_of_b">
					<option value="">Choose a Value</option>
					<option value="PDF Only">PDF Only</option>
					<option value="Hardcopy & PDF File">Hardcopy & PDF File</option>
				</select>
			</div>
			<div class="form-group">
				<label for="categories">Categories</label>
				<select name="categories" class="form-control" id="categories">
					<option value="">Choose a Value</option>
					<option value="Interior Designer">Interior Designer</option>
					<option value="Individual">Individual</option>
					<option value="Property Developer">Builder / Developer</option>
					<option value="Architect">Architect</option>
					<option value="Other">Other</option>
					<option value="Trade">Trade</option>
				</select>
			</div>
			<div class="form-group">
				<label for="find_us">How did you find us?*</label>
				<select name="find_us" class="form-control" id="find_us">
					<option value="">Choose a Value</option>
					<option value="GO">Google</option>
					<option value="WM">Word of Mouth</option>
					<option value="MM">Magazine</option>
					<option value="CS">Chelsea Showroom</option>
					<option value="WS">Weybridge Showroom</option>
					<option value="RE">Recommendation</option>
					<option value="ES">Exhibition or Show</option>
					<option value="OT">Other</option>
				</select>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
      </div>
    </div>

  </div>
</div>
</body>
</html>
