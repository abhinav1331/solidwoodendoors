<?php
/*
Plugin Name: Product Import
Description: This plugin is to import products from Excel File in .xls File Structure
Author: Abhinav Grover
*/

if (is_admin())
{   
  function form_create_cities_section() 
	 {  
	add_menu_page("Product Import","Product Import",1,"product_import","");
	add_submenu_page("product_import","Product Import","Product Import",8,"product_import","product_import");
	 }  
   add_action('admin_menu','form_create_cities_section'); 
   
   
   
}
function product_import()
{
include('../wp-config.php');
global $wpdb;
$plugin_url = plugin_dir_url( __FILE__ );
?>
<link rel='stylesheet' href='<?php echo $plugin_url; ?>css/style.css' type='text/css'/>
<link rel='stylesheet' href='<?php echo $plugin_url; ?>css/bootstrap.min.css' type='text/css'/>
<script src="<?php echo $plugin_url; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $plugin_url; ?>js/jquery.validate.js"></script>
<script src="<?php echo $plugin_url; ?>js/form.js"></script>
<script src="<?php echo $plugin_url; ?>js/custom.js"></script>

<script>
jQuery(document).ready(function(){
jQuery('.select-option').each(function(){
	jQuery(this).click(function(){
		var data_attr = jQuery(this).data('attribute');
		window.location.href="admin.php?page=cities&req="+data_attr;	
	})
	});
	});
</script>
<div class="box-container">
<div class="bx-innr">
	<h1>Upload File(File Should Be .xls Structure) STEP 1-2</h1>
	 <form role="form" id="uploadfile" action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
		<table class="table table-striped view-all">
			<tr>
				<th>Choose a File</th>
				<th>Upload</th>
			</tr>
			<tr>
				<td><input type="file" class="form-control" id="file_upload" name="filee" multiple="true"></th>
				<td><input type="submit" value="Upload File" class="btn btn-primary add_city" /></td>
				<td><div class="loader_section" style="display:none;"><img src="http://swd.stagingdevsite.com/dev/wp-content/plugins/ProductImport/images/loader.gif"/></div></td>
			</tr>
		</table>
	</form>
<div class="message-section"></div>
</div>
<div class="bx-innr bx_inner_1" style="display:none;">
<input type="hidden" name="file_id" class="file_id" value="">
	<h1> STEP 2-2 </h1>
	<div class="section-table-details">
<p>Your File is succefully uploaded, please proceed by clicking Upload button to insert all the products.</p>
<button type="button" class="upload_products">Upload File</button>
</div>
</div>
<div class="bx-innr bx_inner_2" style="display:none;">
<input type="hidden" name="file_id" class="file_id" value="">
	<h1>Uploading Producrs</h1>
	<div class="section-table-details">
<p>Please avoid Reloading page once products are uploaded</p>
<img src="http://swd.stagingdevsite.com/dev/wp-content/plugins/ProductImport/images/progressBar.gif" class="img-responsive">
</div>
</div>
<div class="bx-innr bx_inner_3" style="display:none;">
<input type="hidden" name="file_id" class="file_id" value="">
	<h1>Upload Complete</h1>
	<div class="section-table-details">
<p>ALl the content in the File is Successfull uploaded</p>
</div>
</div>
</div>
<?php
}