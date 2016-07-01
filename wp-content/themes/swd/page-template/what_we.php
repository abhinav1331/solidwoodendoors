  <?php 
/*
* Template Name:What We do Page Template
*/
get_header();
?>


        <div class="faq_cont what_we">
            <div class="top_faq">
			<?php 
			global $post;
				$var_loop = custom_post_loop_swd("what_we_do","6","DESC");
				if ( $var_loop->have_posts() ) { 
				$i=1;
				while ( $var_loop->have_posts() ) : $var_loop->the_post(); ?>
                <div class="what_we_inner <?php if($i==1){echo " wow fadeInDown";} else {echo "col-scnd wow fadeInUp"} ?>">
                    <div class="lft_what pull-left">
						<?php if ( has_post_thumbnail("home_page_banner_image_slider") ) 
						{
						the_post_thumbnail('home_page_banner_image_slider_inner');
						}
						else
						{
						?>
						<img src="http://placehold.it/1400x550&amp;text=No image found">
						<?php
						}?>
                    </div>
                    <div class="rt_what">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 pull-right faq_info">
                                    <h1>Specialized<br>Specialist</h1>
                                    <p>With an established reputation for commitment to innovative design, unsurpassed craftsmanship and excellent client service, Solid Wooden Doors offers the very best in manufacturing bespoke timber doors for residential and commercial purposes.</p>
                                    <p> Our team of professional craftsmen use the latest state of the art technology to achieve a perfect finish . With experienced staff and state-of-the-art machinery all of our products are manufactured with exceptional standard and lasting quality.</p>
                                    <p> We strive to provide lasting value through our high standards in production and provide the care and detail to meet your requirements.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="what_we_inner col-scnd wow fadeInUp">
                    <div class="lft_what pull-right">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/what_rt.jpg" alt="">
                    </div>
                    <div class="rt_what">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 pull-left lft_faq">
                                    <h1>At SWD<br>we believe</h1>
                                    <p>We use only the finest, sustainably sourced timber. Our veneer options allow you to select a combination that reflects your taste while complementing your design.The natural timber veneers we use can vary significantly in colour and grain patterns. These variations are part of the natural beauty of the timber</p>
                                    <p> Whether renovating, extending or building a new home, our experienced staff, extensive showroom displays and photo library will surely satisfy your need to visualize ideas and show how timber windows will bring your home to life. With your imagination, our knowledge, together we will create a window solution to suit your home.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="pro_servce_offer display_block">
                <div class="container">
                    <div class="servc_inner  wow fadeIn">
                        <div class="row">
                            <div class="col-sm-6 offr_lft">
                                <p>What makes us stand out from the rest is our reputation for quality, innovation and reliability. Our team share over forty years of experience in the building and design industry which we strongly feel is fundamental in building strong, sound working relationships with our clients who are mostly designers, architects and builders. That’s why they keep coming back to us.</p>
                                <p>

                                    A wholly Uk-owned private company, SWD is innovative and progressive at the forefront of delivering the highest standards in product solutions and customer service.</p>
                            </div>
                            <div class="col-sm-6 offr_rt">
                                <h2>Products & Service offered:</h2>
                                <div class="nav_faq display_block">
                                    <ul>
                                        <li>Internal doors and Prehung Doorsets</li>
                                        <li>Bespoke Front Doors</li>
                                        <li>Flooring</li>
                                    </ul>
                                    <ul>
                                        <li>Ironmongery</li>
                                        <li>Industry leading lead times on bespoke doors</li>
                                        <li>Fitting service available</li>
                                    </ul>
                                    <div class="pull-right">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/faq_logo.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php 
get_footer();