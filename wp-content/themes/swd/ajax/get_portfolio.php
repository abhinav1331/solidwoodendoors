<?php
include('../../../../wp-config.php');
global $wpdb;
$category_id_temp = $_GET['category_id'];
// echo $category_id[1];
// $term = get_term_by('slug', $category_id_temp, 'portfolio_category');
// echo "<pre>";
// print_r($term);
// echo "<pre>";
global $post;
query_posts( array ( 'post_type' => 'portfolios' ,'posts_per_page' => -1, 'order' => 'DESC','portfolio_category' => $category_id_temp)  ); 
while ( have_posts() ) : the_post();
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
									<?php endwhile; wp_reset_query(); ?>
