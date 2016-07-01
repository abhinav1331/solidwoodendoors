  <?php 
/*
* Template Name: Blog Page Template
*/
get_header();
?>

  <div class="blog_cont display_block">
            <div class="container">
                <div class="blog_lft">
				<?php 
				global $post;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts(array( 	'post_type'      => 'post', // You can add a custom post type if you like
									'paged'          => $paged,
									'posts_per_page' => 2,
									'ORDER' => 'DESC'
								));
								if ( have_posts() ) : 
								while ( have_posts() ) : the_post(); ?>
                    <div class="blog_list display_block wow fadeInUp">
                        <ul>
                            <li class="list-col display_block">
                                <h2><a href=""><?php the_title(); ?></a></h2>
                                <div class="pro_list display_block">
                                    <div class="product-img">
                                        <a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) 
										{
										the_post_thumbnail('blog_section_outer');
										}
										else
										{
										?>
										<img src="http://placehold.it/457x447&amp;text=No image found">
										<?php
										}?>
                                    </div>
                                    <div class="product-info display_block">
                                        <div class="pro_title">
                                            <h3 class="pull-left">By <?php echo $author = get_the_author(); ?></h3>
                                            <div class="comment_cont">
                                                <ul> 
                                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_time( 'H:i', $post->ID ); ?></li>
													<?php 
													$countt = $wpdb->get_var("SELECT count(`post_id`) FROM `im_like_blog` where `post_id`='$post->ID'");
													if($countt == 0)
													{
														?>
														<li><a id="post_id_<?php echo $post->ID; ?>" href="javascript:void(0);" onclick="like_count(this.id);"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 0</a></li>
														<?php 
													}
													else
													{
														$result1 = $wpdb->get_results( "SELECT * FROM `im_like_blog` where `post_id`='$post->ID'");
														if(!isset($_COOKIE["post_id_".$post->ID])) {
														?>
														 <li><a id="post_id_<?php echo $post->ID; ?>" href="javascript:void(0);" onclick="like_count(this.id);"><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php echo$result1['0']->like_count ?></a></li>
														<?php
														}
														else
														{
														?>
														 <li><a id="post_id_<?php echo $post->ID; ?>" href="javascript:void(0);"><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php echo$result1['0']->like_count ?></a></li>
														<?php
														}
													}
													
													?>
                                                    <li><a href=""><i class="fa fa-comments" aria-hidden="true"></i> <?php echo get_comments_number(); ?> </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="pro_info display_block">
                                            <?php the_content(); ?>
                                            <a href="<?php the_permalink(); ?>">(Read More)</a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <div class="date_cont">
                            <span><?php echo $pfx_date = get_the_date( "d", $post->ID ); ?></span>
                            <div class="month_dat">
                                <p><?php echo $pfx_date = get_the_date( "F", $post->ID ); ?></p>
                                <p> <?php echo $pfx_date = get_the_date( "Y", $post->ID ); ?></p>
                            </div>
                        </div>
                    </div>
							<?php endwhile; wp_reset_query(); ?>
							
							<?php my_pagination(); ?>

							<?php else : ?>

								   <h1>No posts found</h1>

							<?php endif; ?>
                </div>

                <div class="blog_rt">
					<form role="search" method="get" id="searchform" class="searchform search_bar display_block wow fadeInUp" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input class="search_txt" type="text" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" id="s" />
						<button  type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
                    <div class="recent_cmnts display_block wow fadeInUp">
                        <h2>Archives</h2>
							<?php $args = array(
							'type'            => 'monthly',
							'limit'           => '',
							'format'          => 'html', 
							'before'          => '',
							'after'           => '',
							'show_post_count' => false,
							'echo'            => 1,
							'order'           => 'DESC'
							); 
							?>
                        <ul class="wow fadeInUp">
						<?php  wp_get_archives( $args ); ?>
                        </ul>
                    </div>
                    <div class="recent_cmnts recent_post display_block wow fadeInUp">
                        <h2>Recent Posts</h2>
                        <ul>
						<?php
						$result2 = $wpdb->get_results( "SELECT * FROM `im_like_blog` order by `post_id` DESC Limit 5");
						$var_post_id = array();
						foreach($result2 as $result)
						{
							array_push($var_post_id, $result->post_id);
						}
							query_posts(array( 	'post_type'      => 'post', // You can add a custom post type if you like
												'post__in' => $var_post_id,
												'posts_per_page' => 5
											));
								if ( have_posts() ) : 
								while ( have_posts() ) : the_post(); ?>
                            <li class="cmnts-list wow fadeInUp">
                                <div class="img_post">

                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/post-1.jpg" alt="">
                                </div>
                                <div class="post_info">
                                    <strong><?php echo $pfx_date = get_the_date( "d F, Y", $post->ID ); ?></strong>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                </div>
                            </li>
							<?php endwhile; wp_reset_query(); ?>
							<?php else : ?>
									<li class="cmnts-list wow fadeInUp">
										<h4>No posts found</h4>
									</li>
							<?php endif; ?>
                            <!--<li class="cmnts-list wow fadeInUp">
                                <div class="img_post">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/post-2.jpg" alt="">
                                </div>
                                <div class="post_info">
                                    <strong>27 March, 2015</strong>
                                    <h4><a href="">Integer eget</a></h4>
                                </div>
                            </li>
                            <li class="cmnts-list wow fadeInUp">
                                <div class="img_post">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/post-3.jpg" alt="">
                                </div>
                                <div class="post_info">
                                    <strong>02 April, 2015</strong>
                                    <h4><a href="">Integer eget</a></h4>
                                </div>
                            </li>
                            <li class="cmnts-list wow fadeInUp">
                                <div class="img_post">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/post-4.jpg" alt="">
                                </div>
                                <div class="post_info">
                                    <strong>22 April, 2015</strong>
                                    <h4><a href="">Integer eget</a></h4>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>

        </div>
		<script>
		function like_count(event)
		{
			var post_id = event;
			jQuery.ajax({
			type: "POST",
			url:"<?php echo site_url(); ?>/wp-content/themes/swd/ajax/final_submit.php",
			data:{post_id:post_id,format:'raw'},
			success:function(resp){
				jQuery("#"+event).parent().empty().append('<a id="post_id_<?php echo $post->ID; ?>" href="javascript:void(0);"><i class="fa fa-thumbs-up" aria-hidden="true"></i>'+resp+'</a>');

			}
			});
		}
		</script>
		<?php
/********************Pagination Function*****************************/
if ( ! function_exists( 'my_pagination' ) ) :
function my_pagination() {
global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
'format' => '?paged=%#%',
'current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages
) );
}
endif;

/******************** /Pagination Function*****************************/
?>
		<?php
		get_footer();
		?>