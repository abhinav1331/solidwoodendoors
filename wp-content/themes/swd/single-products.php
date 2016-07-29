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
	global $wpdb;
$case_id_product = array();
$post_idddd = get_the_ID();
 foreach( $wpdb->get_results("SELECT * FROM `im_case_study` Where `product_id`= '".$post_idddd."'") as $key => $row)
		{
				array_push($case_id_product , $row->case_id);
		}

		// print_r($case_id_product);
	$whiteprimed = array();
	$crownsapele = array();
	$etimoe = array();
	$oak = array();
	$steamedbeech = array();
	$maple = array();
	$cherry = array();
	$wengue = array();
	$walnut = array();
	$zebrano = array();
	$ebony = array();
	$bleachedoak = array();
	$stonegrey = array();
	$greychoco = array();
	$ashgrey = array();
	$lightchoco = array();
	$rallacquer = array();
	$whitelacquer = array();
	$stainedoak = array();
	$stainedoak_lacquer = array();
	$stainedoak_hg_lacquer = array();
	$hg_matt_lacquer = array();
	$thickness = array();
	$hgloss = array();
	$DoorOnly = array();
	$style = array();
	foreach( $wpdb->get_results("SELECT * FROM `im_products_price_details` Where `post_id`= '$post->ID'") as $key => $row)
		{
			array_push($whiteprimed , $row->whiteprimed);
			array_push($crownsapele , $row->crownsapele);
			array_push($etimoe , $row->etimoe);
			array_push($oak , $row->oak);
			array_push($steamedbeech , $row->steamedbeechh);
			array_push($maple , $row->maple);
			array_push($cherry , $row->cherry);
			array_push($wengue , $row->wengue);
			array_push($walnut , $row->walnut);
			array_push($zebrano , $row->zebrano);
			array_push($ebony , $row->ebony);
			array_push($bleachedoak , $row->bleachedoak);
			array_push($stonegrey , $row->stonegrey);
			array_push($ashgrey , $row->greychoco);
			array_push($ashgrey , $row->ashgrey);
			array_push($rallacquer , $row->rallacquer);
			array_push($whitelacquer , $row->whitelacquer);
			array_push($stainedoak , $row->stainedoak);
			array_push($stainedoak_lacquer , $row->stainedoak_lacquer);
			array_push($stainedoak_hg_lacquer , $row->stainedoak_hg_lacquer);
			array_push($hg_matt_lacquer , $row->hg_matt_lacquer);
			array_push($hgloss , $row->hgloss);
			array_push($DoorOnly , $row->DoorOnly);
			array_push($thickness , $row->thickness);
			array_push($style , $row->style);
		}
	$c_whiteprimed = count(array_filter($whiteprimed));
	$c_crownsapele = count(array_filter($crownsapele));
	$c_etimoe = count(array_filter($etimoe));
	$c_oak = count(array_filter($oak));
	$c_cherry = count(array_filter($cherry));
	$c_wengue = count(array_filter($wengue));
	$c_walnut = count(array_filter($walnut));
	$c_zebrano = count(array_filter($zebrano));
	$c_ebony = count(array_filter($ebony));
	$c_bleachedoak = count(array_filter($bleachedoak));
	$c_stonegrey = count(array_filter($stonegrey));
	$c_greychoco = count(array_filter($greychoco));
	$c_ashgrey = count(array_filter($ashgrey));
	$c_lightchoco = count(array_filter($lightchoco));
	$c_rallacquer = count(array_filter($rallacquer));
	$c_whitelacquer = count(array_filter($whitelacquer));
	$c_stainedoak = count(array_filter($stainedoak));
	$c_stainedoak_lacquer = count(array_filter($stainedoak_lacquer));
	$c_stainedoak_hg_lacquer = count(array_filter($stainedoak_hg_lacquer));
	$c_hg_matt_lacquer = count(array_filter($hg_matt_lacquer));
	$c_hgloss = count(array_filter($hgloss));
	$c_DoorOnly = count(array_filter($DoorOnly));
	$thickness = array_unique($thickness, SORT_REGULAR);
	$style = array_unique($style, SORT_REGULAR);
	?>
        <div class="faq_cont">

            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="custom_faq">
                            <h1 class="text-center"><?php the_title(); ?></h1>
							<?php
							if(count($case_id_product)>0)
							{
								?>
							<div class="case_studies">
							<?php
							global $post;
							query_posts( array ( 'post_type' => 'case_study' ,'posts_per_page' => -1 , 'order' => 'asc','post__in' => $case_id_product)  ); ?>
							<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-lg-4">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
							<?php endwhile; wp_reset_query();?>
							</div>
								<?php
							}
							?>
                            <div class="panel-group user_acc col-sm-12 custom_cod" >
								<select class="form-control" name="door_type">
									<option value="">Choose Your Option</option>
									<?php 
									if($c_whiteprimed != 0)
									{
										?><option value="whiteprimed">Whiteprimed</option><?php 
									}
									if($c_crownsapele != 0)
									{
										?><option value="crownsapele">Crownsapele</option><?php 
									}
									if($c_etimoe != 0)
									{
										?><option value="etimoe">Etimoe</option><?php 
									}
									if($c_oak != 0)
									{
										?><option value="oak">Oak</option><?php 
									}
									if($c_cherry != 0)
									{
										?><option value="cherry">Cherry</option><?php 
									}
									if($c_wengue != 0)
									{
										?><option value="wengue">Wengue</option><?php 
									}
									if($c_walnut != 0)
									{
										?><option value="walnut">Walnut</option><?php 
									}
									if($c_zebrano != 0)
									{
										?><option value="zebrano">Zebrano</option><?php 
									}
									if($c_ebony != 0)
									{
										?><option value="ebony">Ebony</option><?php 
									}
									if($c_bleachedoak != 0)
									{
										?><option value="bleachedoak">Bleachedoak</option><?php 
									}
									if($c_stonegrey != 0)
									{
										?><option value="stonegrey">Stone Grey</option><?php 
									}
									if($c_greychoco != 0)
									{
										?><option value="greychoco">Grey Choco</option><?php 
									}
									if($c_ashgrey != 0)
									{
										?><option value="ashgrey">Ash Grey</option><?php 
									}
									if($c_lightchoco != 0)
									{
										?><option value="lightchoco">Light Choco</option><?php 
									}
									if($c_rallacquer != 0)
									{
										?><option value="rallacquer">Rallacquer</option><?php 
									}
									if($c_whitelacquer != 0)
									{
										?><option value="whitelacquer">Whitelacquer</option><?php 
									}
									if($c_stainedoak != 0)
									{
										?><option value="stainedoak">Stainedoak</option><?php 
									}
									if($c_stainedoak_lacquer != 0)
									{
										?><option value="stainedoak_lacquer">Stainedoak Lacquer</option><?php 
									}
									if($c_stainedoak_hg_lacquer != 0)
									{
										?><option value="stainedoak_hg_lacquer">Stainedoak hg lacquer</option><?php 
									}
									if($c_hg_matt_lacquer != 0)
									{
										?><option value="hg_matt_lacque">Hg Matt Lacque</option><?php 
									}
									if($c_hgloss != 0)
									{
										?><option value="hgloss">Hgloss</option><?php 
									}
									if($c_DoorOnly != 0)
									{
										?><option value="DoorOnly">DoorOnly</option><?php 
									}
									?>
									</select>
									<select  class="form-control" style="display:none;" name="door_thisckness">
									<option value="">Choose Your Option</option>
									<?php 
									foreach($thickness as $thick)
									{
										?>
										<option value="<?php echo $thick; ?>"><?php echo $thick; ?>mm</option>
										<?php
									}
									?>	
									</select>
									<select  class="form-control" style="display:none;" name="door_style">
									<option value="">Choose Your Option</option>
									<?php 
									foreach($style as $style111)
									{
									if($style111 == '0')
									{
										$style_test = "Solid door";
									}
									elseif($style111 == 'G')
									{
										$style_test = "Glazed Door";
									}
									elseif($style111 == 'FD')
									{
										$style_test = "Fire door (45mm)";
									}
									elseif($style111 == 'FDG')
									{
										$style_test = "Glazed Fire door (45mm)";
									}
										?>
										<option value="<?php echo $style111; ?>"><?php echo $style_test; ?></option>
										<?php
									}
									?>	
									</select>
									<div class="price"></div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>
