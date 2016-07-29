<?php
include('../../../../wp-config.php');
global $wpdb;
$door_thisckness = $_POST['door_thisckness'];
$door_style = $_POST['door_style'];
$door_type = $_POST['door_type'];
$euro_conv = get_field("euro_convirtable",6);
$profit_rate = get_field("profit",6);
$results = $wpdb->get_var("SELECT `".$door_type."` FROM `im_products_price_details` where `style`='$door_style' AND `thickness` = ".$door_thisckness."");
if($results !="")
{
	$results."<br>";
	$resu1 = $results * $euro_conv."<br>";
	echo $results_final = $resu1 * $profit_rate;
}
else
{
	echo $results_final;
}