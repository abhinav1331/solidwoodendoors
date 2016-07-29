<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

 
get_header();
$case_id_product = array();
 $post_idddd = get_the_ID();
 foreach( $wpdb->get_results("SELECT * FROM `im_portfolio` Where `case_id`= '".$post_idddd."'") as $key => $row)
		{
				array_push($case_id_product , $row->product_id);
		}
 ?>
<?php while ( have_posts() ) : the_post(); ?>
  <section class="portfolio-slider-main wow fadeInDown">
            <div class="portfolio-slider">
                <div class="owl-carousel">
				 <?php  $one1 = get_post_meta(get_the_ID(),'gallery_section',true);
						$arr1=get_numerics($one1);
						foreach($arr1 as $val1)
						{
						$small_image_url1 = wp_get_attachment_image_src($val1, 'full');?>
						<div><img src="<?php echo $small_image_url1[0]; ?>" alt="" title="">
						</div>
						<?php 
						}
						?>
                </div>
                <h2><?php the_title(); ?></h2>
            </div>
        </section>


        <section class="challenge-result-3boxs">
            <div class="container-fluid">
                <div class="row">
				<?php 
				$the_challange = get_field("the_challanges", get_the_ID());
				if($the_challange != "")
				{
					?>
					
                    <div class="col-md-4">
                        <div class="challenge-result-3box challenge-box">
                            <h4>The Challenge</h4>
                           <?php the_field("the_challanges",get_the_ID()) ?>
                        </div>
                    </div>
					<?php
				}
				?>
				<?php 
				$the_results = get_field("the_results", get_the_ID());
				if($the_results != "")
				{
					?>
					
					<div class="col-md-4">
                        <div class="challenge-result-3box results-box">
                            <h4>The Results</h4>
                             <?php the_field("the_results",get_the_ID()) ?>
							<?php 
							$scope = get_field("scope", get_the_ID());
							if($scope != "")
							{
							?>
                            <h4>Scope:</h4>
                            <?php the_field("scope",get_the_ID()) ?>
							<?php 
							}
							?>
                        </div>
                    </div>
					<?php
				}
				?>
                    <div class="col-md-4">
                        <div class="challenge-result-3box door-used-box">
                            <h4>Door Used</h4>
                            <div class="challenge-result-2boxs">
							<?php
							if(count($case_id_product)>0)
							{
								?>
							<?php
							global $post;
							query_posts( array ( 'post_type' => 'products' ,'posts_per_page' => -1 , 'order' => 'asc','post__in' => $case_id_product)  ); 
						/*------------------------Attachment by url by addribute size------------------------------------------*/
						$image_id=get_post_meta($post->ID,"_thumbnail_id",true);
						$thumb = wp_get_attachment_image_src($image_id, 'portfolio_product_section' );
						$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
						$url = $thumb['0'];
						/*------------------------Attachment by url by addribute size------------------------------------------*/
							?>
							<?php while ( have_posts() ) : the_post(); ?>
							 <div class="challenge-result-2box">
                                    <figure>
                                        <a href="<?php the_permalink(); ?>">
										<?php if ( $url != "" ) 
										{
										?>
										<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" class="img_responsive">
										<?php
										}
										else
										{
										?>
										<img src="http://placehold.it/92x189&amp;text=No image found" alt="No Image Found"  class="img_responsive">
										<?php
										}?>
										</a>
                                    </figure>
                                    <div class="text">
                                        <h4><a href="<?php the_permalink(); ?>"><small>Model</small><?php the_title(); ?></a></h4>
                                        <?php the_excerpt(); ?>
                                        <a href="<?php the_permalink(); ?>" class="more">Know more>></a>
                                    </div>
                                </div>
							<?php endwhile; wp_reset_query();?>
								<?php
							}
							?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="related-case-area">
            <div class="container-fluid">
                <h3>Related case studies</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="related-case-box" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/related-case-img1.jpg');">
                            <figure>
                                <div class="overlay">
                                    <div class="related-case-box-inner">
                                        <h3>Ash Grey Stained C25</h3>
                                        <p>SolidWoodenDoors provided this property with the beautiful C25 model and the 1004 This holiday home is situated by a beautiful lake and makes use of single, double and sliding doorsets. They came prehung, fitted by SWD.</p>
                                        <p>The door uses a real oak veneer, stained to an 'Ash Grey' finish to give a truly bespoke look. This beautiful finish compliments the decor perfectly, with interior design services provided by StephensonWright.</p>
                                        <a href="#" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i> READ MORE</a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="related-case-box" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/related-case-img2.jpg');">
                            <figure>
                                <div class="overlay">
                                    <div class="related-case-box-inner">
                                        <h3>Ash Grey Stained C25</h3>
                                        <p>SolidWoodenDoors provided this property with the beautiful C25 model and the 1004 This holiday home is situated by a beautiful lake and makes use of single, double and sliding doorsets. They came prehung, fitted by SWD.</p>
                                        <p>The door uses a real oak veneer, stained to an 'Ash Grey' finish to give a truly bespoke look. This beautiful finish compliments the decor perfectly, with interior design services provided by StephensonWright.</p>
                                        <a href="#" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i> READ MORE</a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="related-case-box" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/related-case-img3.jpg');">
                            <figure>
                                <div class="overlay">
                                    <div class="related-case-box-inner">
                                        <h3>Ash Grey Stained C25</h3>
                                        <p>SolidWoodenDoors provided this property with the beautiful C25 model and the 1004 This holiday home is situated by a beautiful lake and makes use of single, double and sliding doorsets. They came prehung, fitted by SWD.</p>
                                        <p>The door uses a real oak veneer, stained to an 'Ash Grey' finish to give a truly bespoke look. This beautiful finish compliments the decor perfectly, with interior design services provided by StephensonWright.</p>
                                        <a href="#" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i> READ MORE</a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php endwhile; wp_reset_query(); ?>
<?php get_footer(); ?>
