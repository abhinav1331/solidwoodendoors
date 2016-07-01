<?php
$post_id = $_POST['post_id'];
$final_id = explode("post_id_",$post_id);
setcookie($post_id, $final_id[1], time() + (86400 * 30), "/"); // 86400 = 1 day
include('../../../../wp-config.php');
global $wpdb;

$countt = $wpdb->get_var("SELECT count(`post_id`) FROM `im_like_blog` where `post_id`='$final_id[1]'");
// echo $countt;
	if($countt == 0)
	{
		$wpdb->insert( 'im_like_blog', array(
		'post_id' => $final_id[1],
		'like_count' => 1 )
		);
		echo "1";
	}
	else
	{
		$result1 = $wpdb->get_results( "SELECT * FROM `im_like_blog` where `post_id`='$final_id[1]'");
		// echo "<pre>";
		// print_r($result1);
		// echo "</pre>";
		$result1['0']->like_count;
		echo $result_like =  $result1['0']->like_count + 1;
		$query1="UPDATE `im_like_blog` SET `like_count` = '$result_like' WHERE `post_id`= $final_id[1]";
		$wpdb->query($query1);
	}