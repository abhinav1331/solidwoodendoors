<?php 
/*
* Template Name: FAQ Page Template
*/
get_header();
?>

        <div class="faq_cont">

            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="custom_faq">
                            <h1 class="text-center">FAQ's</h1>
                            <div class="panel-group user_acc col-sm-12 custom_cod" id="accordion">
								<?php 
								$var_loop = custom_post_loop_swd("faq_section","-1","DESC");
							if ( $var_loop->have_posts() ) { 
							$i=1;
							 while ( $var_loop->have_posts() ) : $var_loop->the_post();
								?>
                                <div class="panel panel-default wow fadeInUp">
                                    <div class="panel-heading highlight">
                                        <h4 class="panel-title"> <a class="accordion-toggle<?php if($i!=1){echo " accordion-toggle  collapsed";} ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><?php the_title(); ?></a> </h4>
                                    </div>
                                    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse<?php if($i==1){echo "in";} ?>">
                                        <div class="panel-body"> <?php the_content();?> </div>
                                    </div>
                                </div>
								<?php  $i++; endwhile; wp_reset_query(); 
							
							}
								else
								{
									?><h1>No Faq Found</h1><?php 
								}
								?>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
		get_footer(); 
		?>