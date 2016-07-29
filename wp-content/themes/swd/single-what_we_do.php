<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();
global $post; 
?>
        <div class="faq_cont">
<?php while ( have_posts() ) : the_post(); 
/*------------------------Attachment by url by addribute size------------------------------------------*/
$image_id=get_post_meta($post->ID,"_thumbnail_id",true);
$thumb = wp_get_attachment_image_src($image_id, 'what_we_do_image_sec' );
$url = $thumb['0'];
/*------------------------Attachment by url by addribute size------------------------------------------*/

?>
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="custom_faq">
                            <h1 class="text-center"><?php the_title(); ?></h1>
                            <div class="panel-group user_acc col-sm-12 custom_cod" >
								<div class="thumbnail_what-we-do">
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
								<div class="container-what">
								<?php the_content(); ?>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php endwhile; wp_reset_query(); ?>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Request a Brochure</button>
        </div>

<?php get_footer(); ?>
