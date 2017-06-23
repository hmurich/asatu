
jQuery(document).ready(function ($) {
	var height_h = $(window).height();
	$('.video-block ').height(height_h);
var top_pos = 0;
var scroll_pos ='';
var old_scroll_pos = 0;
 $(window).scroll(function(){
 var height_h = $(window).height();
 	scroll_pos = $(window).scrollTop();
console.log(old_scroll_pos)
 	if(top_pos>=old_scroll_pos){

 		$("html, body").animate({scrollTop:height_h},"slow")
 		old_scroll_pos = 1000000;
 	}else{
 		old_scroll_pos = scroll_pos;
 	}


  });


});