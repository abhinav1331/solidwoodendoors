<?php 
include('../../../../wp-config.php');
global $wpdb;
require_once(ABSPATH.'wp-content/plugins/ProductImport/inc/reader.php');
$excel = new Spreadsheet_Excel_Reader();

foreach( $wpdb->get_results("SELECT * FROM `im_upload_file` ORDER BY `id` DESC Limit 1") as $key => $row)
		{
			echo $row->url;
			$check = explode("/dev/",$row->url );
			// print_r($check);
			?>
			<table  border="1">
		<?php
			$excel->read(ABSPATH.$check[1]); // set the excel file name here   
			$x=1;
			while($x<=$excel->sheets[0]['numRows']) { // reading row by row 
			// if($x > 2)
			// {
				$y=1;
				if($excel->sheets[0]['cells'][$x][2] != "" || $excel->sheets[0]['cells'][$x][2] != "NO")
				{  
			$countt = $wpdb->get_var("SELECT count(`ID`) FROM `im_posts` WHere `post_title` = ".$excel->sheets[0]['cells'][$x][2]." AND `post_type` = 'products'");
			echo $countt;
					if($countt == "0")
					{
						$new_post = array(
						'post_title'    => $excel->sheets[0]['cells'][$x][2],
						'post_status'   => 'publish',          
						'post_type'     => 'products' 
						);
						$post_id = wp_insert_post($new_post);
					}
					else
					{
						foreach( $wpdb->get_results("SELECT `ID` FROM `im_posts` where `post_title` = ".$excel->sheets[0]['cells'][$x][2]." AND `post_type` = 'products'") as $key => $row)
						{
							$post_id = $row->ID;
						}
					}
					$style = isset($excel->sheets[0]['cells'][$x][4]) ? $excel->sheets[0]['cells'][$x][4] : '';
					$doorset_leaf = isset($excel->sheets[0]['cells'][$x][5]) ? $excel->sheets[0]['cells'][$x][5] : '';
					$thickness = isset($excel->sheets[0]['cells'][$x][6]) ? $excel->sheets[0]['cells'][$x][6] : '';
					$whiteprimed = isset($excel->sheets[0]['cells'][$x][7]) ? $excel->sheets[0]['cells'][$x][7] : '';
					$crownsapele = isset($excel->sheets[0]['cells'][$x][8]) ? $excel->sheets[0]['cells'][$x][8] : '';
					$etimoe = isset($excel->sheets[0]['cells'][$x][9]) ? $excel->sheets[0]['cells'][$x][9] : '';
					$oak = isset($excel->sheets[0]['cells'][$x][10]) ? $excel->sheets[0]['cells'][$x][10] : '';
					$steamedbeech = isset($excel->sheets[0]['cells'][$x][11]) ? $excel->sheets[0]['cells'][$x][11] : '';
					$maple = isset($excel->sheets[0]['cells'][$x][12]) ? $excel->sheets[0]['cells'][$x][12] : '';
					$cherry = isset($excel->sheets[0]['cells'][$x][13]) ? $excel->sheets[0]['cells'][$x][13] : '';
					$wengue = isset($excel->sheets[0]['cells'][$x][14]) ? $excel->sheets[0]['cells'][$x][14] : '';
					$walnut = isset($excel->sheets[0]['cells'][$x][15]) ? $excel->sheets[0]['cells'][$x][15] : '';
					$zebrano = isset($excel->sheets[0]['cells'][$x][16]) ? $excel->sheets[0]['cells'][$x][16] : '';
					$ebony = isset($excel->sheets[0]['cells'][$x][17]) ? $excel->sheets[0]['cells'][$x][17] : '';
					$bleachedoak = isset($excel->sheets[0]['cells'][$x][18]) ? $excel->sheets[0]['cells'][$x][18] : '';
					$stonegrey = isset($excel->sheets[0]['cells'][$x][19]) ? $excel->sheets[0]['cells'][$x][19] : '';
					$greychoco = isset($excel->sheets[0]['cells'][$x][20]) ? $excel->sheets[0]['cells'][$x][20] : '';
					$ashgrey = isset($excel->sheets[0]['cells'][$x][21]) ? $excel->sheets[0]['cells'][$x][21] : '';
					$lightchoco = isset($excel->sheets[0]['cells'][$x][22]) ? $excel->sheets[0]['cells'][$x][22] : '';
					$rallacquer = isset($excel->sheets[0]['cells'][$x][23]) ? $excel->sheets[0]['cells'][$x][23] : '';
					$whitelacquer = isset($excel->sheets[0]['cells'][$x][24]) ? $excel->sheets[0]['cells'][$x][24] : '';
					$stainedoak = isset($excel->sheets[0]['cells'][$x][25]) ? $excel->sheets[0]['cells'][$x][25] : '';
					$stainedoak_lacquer = isset($excel->sheets[0]['cells'][$x][26]) ? $excel->sheets[0]['cells'][$x][26] : '';
					$stainedoak_hg_lacquer = isset($excel->sheets[0]['cells'][$x][27]) ? $excel->sheets[0]['cells'][$x][27] : '';
					$hg_matt_lacquer = isset($excel->sheets[0]['cells'][$x][28]) ? $excel->sheets[0]['cells'][$x][28] : '';
					$hgloss = isset($excel->sheets[0]['cells'][$x][29]) ? $excel->sheets[0]['cells'][$x][29] : '';
					$DoorOnly = isset($excel->sheets[0]['cells'][$x][30]) ? $excel->sheets[0]['cells'][$x][30] : '';
					$wpdb->insert( 'im_products_price_details', array(
					'post_id' => $post_id,
					'style' => $excel->sheets[0]['cells'][$x][4],
					'doorset_leaf' => $excel->sheets[0]['cells'][$x][5],
					'thickness' => $excel->sheets[0]['cells'][$x][6],
					'whiteprimed' => $excel->sheets[0]['cells'][$x][7],
					'crownsapele' => $excel->sheets[0]['cells'][$x][8],
					'etimoe' => $excel->sheets[0]['cells'][$x][9],
					'oak' => $excel->sheets[0]['cells'][$x][10],
					'steamedbeech' => $excel->sheets[0]['cells'][$x][11],
					'maple' => $excel->sheets[0]['cells'][$x][12],
					'cherry' => $excel->sheets[0]['cells'][$x][13],
					'wengue' => $excel->sheets[0]['cells'][$x][14],
					'walnut' => $excel->sheets[0]['cells'][$x][15],
					'zebrano' => $excel->sheets[0]['cells'][$x][16],
					'ebony' => $excel->sheets[0]['cells'][$x][17],
					'bleachedoak' => $excel->sheets[0]['cells'][$x][18],
					'stonegrey' => $excel->sheets[0]['cells'][$x][19],
					'greychoco' => $excel->sheets[0]['cells'][$x][20],
					'ashgrey' => $excel->sheets[0]['cells'][$x][21],
					'lightchoco' => $excel->sheets[0]['cells'][$x][22],
					'rallacquer' => $excel->sheets[0]['cells'][$x][23],
					'whitelacquer' => $excel->sheets[0]['cells'][$x][24],
					'stainedoak' => $excel->sheets[0]['cells'][$x][25],
					'stainedoak_lacquer' => $excel->sheets[0]['cells'][$x][26],
					'stainedoak_hg_lacquer' => $excel->sheets[0]['cells'][$x][27],
					'hg_matt_lacquer' => $excel->sheets[0]['cells'][$x][28],
					'hgloss' => $excel->sheets[0]['cells'][$x][29],
					'DoorOnly' => $excel->sheets[0]['cells'][$x][30] )
					);
				}
			// }
			  $x++;
			}
        ?>    
    </table><br/>
			<?php
		}