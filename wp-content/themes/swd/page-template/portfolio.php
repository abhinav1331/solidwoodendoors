  <?php 
/*
* Template Name: Portfolio Page Template
*/
get_header();
?>
     <div class="product_listing_cont display_block">
            <div class="container-fluid">
                <div class="product_cont">

                    <div class="pro_lft col-sm-2 padding">
                        <h2>Portfolio</h2>
                        <div class="panel-group user_acc custom_pro display_block" id="accordion">
							<?php
							$args = array( 'taxonomy' => 'portfolio_category','hide_empty'=> 0 , 'parent' => 0);
							$terms = get_terms('portfolio_category', $args);
							if (count($terms) > 0) 
							{
								foreach ($terms as $term) 
								{
								?>
								<div class="panel panel-default wow fadeInUp">
									<div class="panel-heading highlight">
										<h4 class="panel-title"> <a id="<?php echo $term->slug; ?>" onclick="get_portfolio(this.id);" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="javascript:void(0)"><?php echo $term->name; ?></a> </h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in">
									</div>
								</div>
								<?php 
								}
							}
							?>



                        </div>
                    </div>
                    <div class="pro_rt cat_rt col-sm-8 padding">
                        <h2>Portfolio</h2>
                        <div class="inner_product">
                            <div class="pro_imgs">
                                <ul>
						<?php 
						global $post;
						$var_loop = custom_post_loop_swd("portfolios","-1","DESC");
						if ( $var_loop->have_posts() ) { 
						$i=1;
						
								
						while ( $var_loop->have_posts() ) : $var_loop->the_post();
						/*------------------------Attachment by url by addribute size------------------------------------------*/
						$image_id=get_post_meta($post->ID,"_thumbnail_id",true);
						$thumb = wp_get_attachment_image_src($image_id, 'portfolio_section_images_ajax_response' );
						$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
						$url = $thumb['0'];
						/*------------------------Attachment by url by addribute size------------------------------------------*/
								?>
                                    <li class="col-sm-3">
                                        <div class="image_list">
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
												<img src="http://placehold.it/263x323&amp;text=No image found" alt="No Image Found"  class="img_responsive">
												<?php
												}?>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <span class="model cat_nme"><a href=""><?php the_title(); ?></a></span>
                                        </div>
                                    </li>
							<?php endwhile; wp_reset_query(); 
							}
							else
							{
								?><h1>No Portfolio Available</h1><?php 
							}
								?>
                                   
                                </ul>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
<?php
get_footer();
?>