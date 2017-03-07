$(document).ready(function(){
		$( ".nav-menu > li" ).mouseover(function() {
	    	$( ".nav-menu > li > ul > li" ).mouseover(function() {
		    	if($(this).hasClass("firstopen")){
		    		$(this).removeClass("firstopen");
		    		$(".nav-menu > li > ul > li:first-child").removeClass("firstopen");
		    	}else{
		    		$(this).addClass("firstopen");
		    		$(".nav-menu > li > ul > li:first-child").removeClass("firstopen");
		    	}
		  	}).mouseout(function() {$(this).removeClass("firstopen");});
		}).mouseout(function() {$(this).removeClass("firstopen");$(".nav-menu > li > ul > li:first-child").addClass("firstopen");});
});
		