<?php
$post_id = $_POST['post_id'];
$check_post_id = $_POST['check_post_id'];
$product_id = explode(",",$check_post_id);
include('../../../../wp-config.php');
global $wpdb;
$wpdb->query(
		'DELETE  FROM `im_case_study`
		WHERE `case_id` = "'.$post_id.'"'
	);
	
	foreach($product_id as $mydata1)
	{
		$wpdb->insert( 'im_case_study', array(
		'case_id' => $post_id,
		'product_id' => $mydata1 )
		);
	}