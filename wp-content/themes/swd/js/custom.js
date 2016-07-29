/*****************************Link***************************************/
var link = "http://swd.stagingdevsite.com/dev/";
/*****************************Link***************************************/
/********************************Stickey Header*****************************/
        jQuery(window).load(function () {
            jQuery("nav.navbar").sticky({
                topSpacing: 0
            });
        });
/********************************Stickey Header*****************************/
/*********************************Search Icon********************************/
		jQuery(".search-icon").click(function () {
            jQuery(".search-icon").addClass("active");
            jQuery(".search-field").addClass("active");
        });
        jQuery(".search-close-btn").click(function () {
            jQuery(".search-icon").removeClass("active");
            jQuery(".search-field").removeClass("active");
        });
/*********************************Search Icon********************************/
/*******************************Text Button********************************/
		jQuery(".home-text-btn").click(function () {
            jQuery(".home-text").toggleClass("active");
        });
/*******************************Text Button********************************/
/********************************Scroll Name********************************/
		if (navigator.userAgent.match(/Trident\/7\./)) { // if IE
            jQuery('body').on("mousewheel", function () {
                // remove default behavior
                event.preventDefault();

                //scroll without smoothing
                var wheelDelta = event.wheelDelta;
                var currentScrollPosition = window.pageYOffset;
                window.scrollTo(0, currentScrollPosition - wheelDelta);
            });
        }
/********************************Scroll Name********************************/
/********************************Wow Js***********************************/
		var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 140,
            mobile: true,
            live: true,
            callback: function (box) {},
            scrollContainer: null
        });
        wow.init();
/********************************Wow Js***********************************/
/**********************************Product*************************************/
	jQuery(document).ready(function(){
		jQuery("select[name='door_type']").change(function(){
			jQuery("select[name='door_thisckness']").show();
			var lenth = jQuery("select[name='door_thisckness']>option:last").val();
			if(lenth=="")
			{
				jQuery("select[name='door_thisckness']>option:last").remove();
			}
			jQuery("select[name='door_thisckness']").removeAttr("style");
			var door_style = jQuery("select[name='door_style']").val();
			var door_type = jQuery("select[name='door_type']").val();
			var door_thisckness = jQuery("select[name='door_thisckness']").val();
			if(door_style != "" && door_thisckness !="" && door_type !="")
			{
				jQuery.ajax({
					type: "POST",
					url: link+"/wp-content/themes/swd/ajax/get_quote.php",
					data:{door_style:door_style,door_type:door_type,door_thisckness:door_thisckness,format:'raw'},
					success:function(resp){
						if(resp!="")
						{
							jQuery(".price").empty().append("<p>Your Price is £"+resp+".</p>");
						}
						else
						{
							jQuery(".price").empty().append("<p>No price Found for this combination</p>");
						}
						
					}
				});
			}
		});
		jQuery("select[name='door_thisckness']").change(function(){
			jQuery("select[name='door_style']").show();
			jQuery("select[name='door_style']").removeAttr("style");
			var door_style = jQuery("select[name='door_style']").val();
			var door_type = jQuery("select[name='door_type']").val();
			var door_thisckness = jQuery("select[name='door_thisckness']").val();
			if(door_style != "" && door_thisckness !="" && door_type !="")
			{
				jQuery.ajax({
					type: "POST",
					url: link+"/wp-content/themes/swd/ajax/get_quote.php",
					data:{door_style:door_style,door_type:door_type,door_thisckness:door_thisckness,format:'raw'},
					success:function(resp){
						if(resp!="")
						{
							jQuery(".price").empty().append("<p>Your Price is £"+resp+".</p>");
						}
						else
						{
							jQuery(".price").empty().append("<p>No price Found for this combination</p>");
						}
						
					}
				});
			}
		});
		jQuery("select[name='door_style']").change(function(){
			var door_style = jQuery("select[name='door_style']").val();
			var door_type = jQuery("select[name='door_type']").val();
			var door_thisckness = jQuery("select[name='door_thisckness']").val();
			if(door_style != "" && door_thisckness !="" && door_type !="")
			{
				jQuery.ajax({
					type: "POST",
					url: link+"/wp-content/themes/swd/ajax/get_quote.php",
					data:{door_style:door_style,door_type:door_type,door_thisckness:door_thisckness,format:'raw'},
					success:function(resp){
						if(resp!="")
						{
							jQuery(".price").empty().append("<p>Your Price is £"+resp+".</p>");
						}
						else
						{
							jQuery(".price").empty().append("<p>No price Found for this combination</p>");
						}
						
					}
				});
			}
		})
	});
/**********************************Product*************************************/
/***********************************Mega Menu************************************/
jQuery(document).ready(function(){
	jQuery(".sub-menu").detach().appendTo('.menu-item-has-children');
});
/***********************************Mega Menu************************************/
/************************************Portfolio Ajax******************************/
function  get_portfolio(event)
{
	var category_id = event;
	jQuery.ajax({
			type: "GET",
			url: link+"/wp-content/themes/swd/ajax/get_portfolio.php",
			data:{category_id:category_id,format:'raw'},
			success:function(resp){
				jQuery(".pro_imgs>ul").empty().append(resp);
			}
		});
}
/************************************Portfolio Ajax******************************/