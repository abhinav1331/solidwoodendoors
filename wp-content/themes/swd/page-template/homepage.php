<?php 
/*
* Template Name: Home page Template
*/
get_header();
?>
        <section class="banner wow fadeInDown">
            <div id="home-banner" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active banner-image" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-banner1.jpg');"></div>
                    <div class="item banner-image" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-banner2.jpg');"></div>
                    <div class="item banner-image" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-banner3.jpg');"></div>
                </div>
            </div>
            <div class="home-text">
                <div class="home-text-inner">
                    <h1>Welcome to SolidWoodenDoors</h1>
                    <p>Browse through our range of high end bespoke internal wooden doors and external solid wooden doors, we have designs for all tastes and budgets. Our Solid core doors with veneer doors come in many different veneers and stained finishes. All doors can be ordered as leafs or pre hung door sets. Our range comes in most standard sizes and includes fire doors and many glazing options. We can also manufacture bespoke doors sizes upto2.4m tall and 1.2m wide. Some doors are available up to 2.7M. For all door handles and ironmongery requirements visit our sister site: swd-ironmongery.com You can order a full colour brochure or Digital PDF for FREE</p>
                    <p>Bespoke Designs</p>
                    <p>We can manufacture almost any design you have with our range of custom joineries in Spain, and the UK. We can create wood doors in almost any wood veneer with a large range of finishes from unfinished solid woods to stained veneers. One of our best finishes is the high gloss polyester finish which gives a piano like finish to the wood. We have carried out designs for some of the top interior designers and property developers in the country. If you would like to discuss our specialist services please call us or email: sales@solidwoodendoors.com</p>
                </div>
                <a class="home-text-btn" href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i><i class="fa fa-caret-left" aria-hidden="true"></i></a>
            </div>
        </section>
        <section class="home-4boxs wow fadeInDown">
		<?php
		$args = array( 'taxonomy' => 'products_category','hide_empty'=> 0 , 'parent' => 0);
		$terms = get_terms('products_category', $args);
		if (count($terms) > 0) {
			foreach ($terms as $term) 
			{
			/*------------------------Attachment by url by addribute size------------------------------------------*/
			echo $image_id=get_post_meta($term->term_id,"featured_image",true);
			$thumb = wp_get_attachment_image_src($image_id, 'home_page_category_sect' );
			$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
			$url = $thumb['0'];
			/*------------------------Attachment by url by addribute size------------------------------------------*/
				?>
            <div class="home-4box">
                <a href="<?php echo get_category_link( $term->term_id ); ?>">
                    <figure>
					 <?php if ( $url != "" ) 
					{
					?>
					<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" class="img_responsive">
					<?php
					}
					else
					{
					?>
					<img src="http://placehold.it/263x323&amp;text=No image found" alt="No Image Found"  class="img_responsive">
					<?php
					}?>
					</figure>
                    <div class="overlay">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="text">
                                    <h6><?php echo $term->name; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
			<?php
			}
		}
		?>
        </section>
<?php
get_footer(); 
?>