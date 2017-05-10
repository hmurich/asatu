
(function($) {
$(function() {

	function createCookie(name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
	}
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	function eraseCookie(name) {
		createCookie(name,"",-1);
	}

	$('.checkout-list-step').each(function(i) {
		var cookie = readCookie('tabCookie' + i);

		var form = $(".rf"),
				btn = $(this);
			
			form.find('.rfield').addClass('empty_field');
			
			// Функция проверки полей формы
			function checkInput(){
				form.find('.rfield').each(function(){
					var test  = $(this).val().trim();
					if(test ){
					
							
						$(this).removeClass('empty_field');
						
					} else {
						$(this).addClass('empty_field');

					}
				});
			}
			
			// Функция подсветки незаполненных полей
			function lightEmpty(){
				form.find('.empty_field').css({'border-color':'#d8512d'});
				setTimeout(function(){
					form.find('.empty_field').removeAttr('style');
				},500);
			}
			
			setInterval(function(){
				checkInput();
				var sizeEmpty = form.find('.empty_field').size();
				if(sizeEmpty > 0){
					if(btn.hasClass('disabled') || btn.children().hasClass('disabled')){
						return false
					} else {
						btn.addClass('disabled')
						btn.children().addClass('disabled')
					}
				} else {
					btn.removeClass('disabled')
					btn.children().removeClass('disabled')
				}
			},500);

			btn.click(function(){
				if($(this).hasClass('disabled')){
					lightEmpty();
					return false
				} else {
					if (cookie) {
						$(this).find('div').removeClass('active').eq(cookie).addClass('active')
							.closest('div.checkout-content').find('div.tabs-body__item ').removeClass('active').eq(cookie).addClass('active');
					
					}
				}
			});
		
	});

	$('.checkout-list-step').on('click', 'div:not(.active)', function() {
		var form = $(".rf"),
			btn = $(this);
			
			
			// Функция проверки полей формы
		function checkInput(){
				form.find('.rfield').each(function(){
					var test  = $(this).val().trim();
					if(test ){
					
							
						$(this).removeClass('empty_field');
						
					} else {
						$(this).addClass('empty_field');

					}
				});
			}
			// Функция подсветки незаполненных полей
			function lightEmpty(){
				form.find('.empty_field').css({'border-color':'#d8512d'});
				setTimeout(function(){
					form.find('.empty_field').removeAttr('style');
				},500);
			}
			
			setInterval(function(){
				checkInput();
				var sizeEmpty = form.find('.empty_field').size();
				if(sizeEmpty > 0){
					if(btn.hasClass('disabled') || btn.children().hasClass('disabled')){
						return false
					} else {
						btn.addClass('disabled')
						btn.children().addClass('disabled')
					}
				} else {
					btn.removeClass('disabled')
					btn.children().removeClass('disabled')
				}
			},500);

			
				if($(btn).hasClass('disabled')){
					lightEmpty();
					return false
				} else {
					console.log('test');
					$(btn)
						.addClass('active').siblings().removeClass('active')
						.closest('div.checkout-content').find('.js-checkout-tab').removeClass('active').eq($(this).index()).addClass('active');
					var ulIndex = $('.checkout-list-step').index($(this).parents('ul.checkout-list-step'));
					eraseCookie('tabCookie' + ulIndex);
					createCookie('tabCookie' + ulIndex, $(this).index(), 365);
					$('.next-step').addClass('hide');
				}
		
		
			});
$('.next-step').each(function(i) {
			var form = $(".rf"),
				btn = $(this);

			
			// Функция проверки полей формы
				function checkInput(){
				form.find('.rfield').each(function(){
					var test  = $(this).val().trim();
					if(test ){
					
							
						$(this).removeClass('empty_field');
						
					} else {
						$(this).addClass('empty_field');

					}
				});
			}
			// Функция подсветки незаполненных полей
			
			
			setInterval(function(){
				checkInput();
				var sizeEmpty = form.find('.empty_field').size();
				if(sizeEmpty > 0){
					if(btn.hasClass('disabled')){
						return false
					} else {
						btn.addClass('disabled')
					}
				} else {
					btn.removeClass('disabled')
				}
			},500);

		

				});	

			$('.next-step').on('click', function() {
			var form = $(".rf"),
				btn = $(this);
			
			// Функция проверки полей формы
			function checkInput(){
				form.find('.rfield').each(function(){
					var test  = $(this).val().trim();
					if(test ){
					
							
						$(this).removeClass('empty_field');
						
					} else {
						$(this).addClass('empty_field');

					}
				});
			}
			
			// Функция подсветки незаполненных полей
			function lightEmpty(){
				form.find('.empty_field').css({'border-color':'#d8512d'});
				setTimeout(function(){
					form.find('.empty_field').removeAttr('style');
				},500);
			}
			
			setInterval(function(){
				checkInput();
				var sizeEmpty = form.find('.empty_field').size();
				if(sizeEmpty > 0){
					if(btn.hasClass('disabled')){
						return false
					} else {
						btn.addClass('disabled')
					}
				} else {
					btn.removeClass('disabled')
				}
			},500);

	
				if($(btn).hasClass('disabled')){
					lightEmpty();
					return false
				} else {
					i = 1;
					var test = $('.checkout-list-step-item active');
					$('.checkout-list-step-item').removeClass('active').eq(i).addClass('active');
					var test2 = $('.js-checkout-tab active');
					$('.js-checkout-tab').removeClass('active').eq(i).addClass('active');
					$(this).addClass('hide');
				}
	


		});

	

		// else{
		// 	i = 2;
		// 	var test = $('.checkout-list-step-item active');
		// 	$('.checkout-list-step-item').removeClass('active').eq(i).addClass('active');
		// 	var test2 = $('.js-checkout-tab active');
		// 	$('.js-checkout-tab').removeClass('active').eq(i).addClass('active');
			
		// }
	// });

	
});
})(jQuery);