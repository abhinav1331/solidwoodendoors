  <?php 
/*
* Template Name: Contact Us Page Template
*/
get_header();
$post_id = get_the_ID();

?>

        <div class="contact_cont">
            <div class="map wow fadeInDown">
			<?php $location = get_field('google_maps',$post_id); 
				if( !empty($location) ):
								?>
								<div class="acf-map">
									<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
								</div>
								<?php endif; ?>
            </div>
            <div class="contact_info wow fadeInUp">
			<?php 
			global $post;
				$var_loop = custom_post_loop_swd("contact_address","6","DESC");
				if ( $var_loop->have_posts() ) { 
				$i=1;
				
						
				while ( $var_loop->have_posts() ) : $var_loop->the_post();
				/*------------------------Attachment by url by addribute size------------------------------------------*/
						$image_id=get_post_meta($post->ID,"_thumbnail_id",true);
						$thumb = wp_get_attachment_image_src($image_id, 'address_section_page' );
						$url = $thumb['0'];
				/*------------------------Attachment by url by addribute size------------------------------------------*/
								?>
                <div class="col-sm-6 <?php if ($i % 2 == 0) { echo "cont_rt"; } else {echo "cont_lft"; } ?>">

                    <div class="container-fluid">
                        <div class="col-sm-6 padding-left">
							<?php if ( $url != "" ) 
							{
							?>
							<img src="<?php echo $url; ?>" alt="No Image Found" class="img_responsive">
							<?php
							}
							else
							{
							?>
							<img src="http://placehold.it/437x278&amp;text=No image found" alt="No Image Found"  class="img_responsive">
							<?php
							}?>
                        </div>
                        <div class="col-sm-6 rt_contact padding-right ">
                            <h2><?php the_title() ?></h2>
							<?php 
							$addresss = get_field("address",$post->ID);
							if($addresss != "")
							{
								?>
                            <p><?php echo $addresss; ?> </p>
								<?php
							}
							?>
                            <ul>
							<?php 
							$phone = get_field("phone",$post->ID);
							if($phone != "")
							{
								?>
                             <li><a href="tel:<?php echo $addresss; ?>">Tel: <?php echo $addresss; ?> </a></li>
								<?php
							}
							?>
                               
							<?php 
							$fax = get_field("fax",$post->ID);
							if($fax != "")
							{
								?>
                             <li>Fax: <?php echo $fax; ?></li>
								<?php
							}
							?>
							<?php 
							$email = get_field("email",$post->ID);
							if($fax != "")
							{
								?>
                                <li><a target="_top " href="mailto:<?php echo $email; ?>">Email: <?php echo $email; ?></a></li>
								<?php
							}
							?>
                            </ul>
							<?php 
							$map_directions = get_field("map_directions",$post->ID);
							if($fax != "")
							{
								?>
                                <a href="<?php echo $map_directions; ?>">Click on the map for directions</a>
								<?php
							}
							?>
                        </div>
                    </div>
					</div>
					<?php  $i++; endwhile; wp_reset_query(); 	
					}
					else
					{
						?><h1>No Physical Address Available</h1><?php 
					}
						?>

            </div>
        </div>
    </div>
	
	<!------------------------Google Maps Scripts--------------------------------->
	<style type="text/css">

.acf-map {
	display: inline-block;
    height: 727px;
    vertical-align: top;
    width: 100%;
}

</style>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {

/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function render_map( $el ) {

	// var
	var $markers = $el.find('.marker');

	// vars
	var args = {
		zoom		: 30,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
		scrollwheel : false,
	};

	// create map	        	
	var map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});

	// center map
	center_map( map );

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 15 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/

$(document).ready(function(){

	$('.acf-map').each(function(){

		render_map( $(this) );

	});

});

})(jQuery);
</script>
	<!------------------------Google Maps Scripts--------------------------------->
	<?php 
	get_footer(); 
	?>