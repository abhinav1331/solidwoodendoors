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
				$i=1;
				while ( $var_loop->have_posts() ) : $var_loop->the_post(); 
			/*------------------------Attachment by url by addribute size------------------------------------------*/
				$image_id=get_post_meta($post->ID,"_thumbnail_id",true);
				$thumb = wp_get_attachment_image_src($image_id, 'what_we_do_image_sec' );
				$url = $thumb['0'];
			/*------------------------Attachment by url by addribute size------------------------------------------*/
				?>
				<?php if ($i % 2 == 0) {
					?>
					<div class="what_we_inner col-scnd wow fadeInUp">
                    <div class="lft_what pull-right">
                        <?php if ( $url != "" ) 
						{
						?>
							<img src="<?php echo $url; ?>" alt="No Image Found" class="img_responsive">
						<?php
						}
						else
						{
						?>
						<img src="http://placehold.it/944x686&amp;text=No image found" alt="No Image Found"  class="img_responsive">
						<?php
						}?>
                    </div>
                    <div class="rt_what">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 pull-left lft_faq">
                                  <p> <?php echo substr(get_the_content(), 0,400); ?></p>
								   <a href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
					<?php
				}
				else
				{
					?>
					 <div class="what_we_inner wow fadeInDown">
                   <div class="lft_what pull-left">
						 <?php if ( $url != "" ) 
						{
						?>
							<img src="<?php echo $url; ?>" alt="No Image Found" class="img_responsive">
						<?php
						}
						else
						{
						?>
						<img src="http://placehold.it/944x686&amp;text=No image found" alt="No Image Found"  class="img_responsive">
						<?php
						}?>
                    </div>
                    <div class="rt_what">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 pull-right faq_info">
                                        <p> <?php echo substr(get_the_content(), 0,400); ?></p>
								   <a href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
					<?php
				}
				?>
              
				<?php $i++; endwhile; wp_reset_query(); ?>
				
				<!-------------------END OF QUERY------------------------->
            </div>
            <div class="pro_servce_offer display_block">
                <div class="container">
                    <div class="servc_inner  wow fadeIn">
                        <div class="row">
                            <div class="col-sm-6 offr_lft">
                               <?php the_field("left_section",18); ?>
                            </div>
                            <div class="col-sm-6 offr_rt">
                                <h2>Products & Service offered:</h2>
                                <div class="nav_faq display_block">
                                     <?php the_field("right_section",18); ?>
                                    <div class="pull-right">
									<?php
										$image_id=get_post_meta($post->ID,"logo_image",true);
										$thumb = wp_get_attachment_image_src($image_id, 'logo_what_we_do' );
										$url = $thumb['0'];
										$alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
											// if(count($alt)) echo $alt;
										?>
                                        <img src="<?php echo $url; ?>" alt="<<?php echo $alt; ?>">
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