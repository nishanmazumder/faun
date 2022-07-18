// Silence is golden

jQuery(document).ready(function($) {
	//Hide Product Information
	nm_hide_product_info()
	
	//Background color change
	nm_change_header_bg_scroll()
	
// 	nm_mobile_toggle()
	
	//Hide Product Information
   	function nm_hide_product_info(){
		var windowHeight = $(window).height()
	 
     var hide_element = $('.nm-hide-scroll')
	 var hide_point = $('.nm-subscribe-section').offset().top + 200
	
// 	 var footerSelector = $('.footer').offset().top

	 $(window).scroll(function () {
		 var scrollHeight = $(window).scrollTop()
		 var footerView = scrollHeight + windowHeight
		 
		 		
		if (footerView >= hide_point) {
			hide_element.hide()
		} else {
			hide_element.show()
		}

	 })
	}
	
	//Background color change
	function nm_change_header_bg_scroll(){
		var header = $('.nm-header-home')
		
		 $(window).scroll(function () {
			 if($(window).scrollTop() > 100){
				 header.css('background', '#00000038')
// 				 if ($(window).width() < 600) {
// 					   header.css('background', '#00000000')         
// 					}
// 					else { 
// 					   header.css('background', '#00000038')
// 					}
			}else{
				header.css('background', '#00000000')
			}
		 })
	}
	
})
