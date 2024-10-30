



jQuery(document).ready(function(){
  	jQuery(".rateit-hover").click(function(){
	   	var $nnn = jQuery(this).closest(".rateit").find(".rateit-range").attr("aria-valuenow")
    	jQuery(this).closest(".rating_stars").find(".my_rate").val($nnn);	
  	});
});
	
jQuery(document).ready(function(){
  	jQuery(".rateit-hover").click(function(){
	   	var $nnn = jQuery(this).closest(".rateit").find(".rateit-range").attr("aria-valuenow")
  	});
});
	