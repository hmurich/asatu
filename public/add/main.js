$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // функии показа высплывающего окна
    if (($(".js_alert_mess_block").length > 0)){
		$('.js_alert_mess_block .alert-exit').click(function(){
			var parent_block = $(this).closest( ".js_alert_mess_block" );
			parent_block.remove();
		});

		setTimeout(function(){
			$( ".js_alert_mess_block" ).remove();
		}, 5000);
	}

    $('.js_add_menu_item').click(function(){
        var id = $(this).data('id');
        var menu_item = $('.js_menu_item_'+id);

        var restoran_id = menu_item.data('restoran_id');
        var menu_id = menu_item.data('id');
        var cost = menu_item.data('cost');
        var count = menu_item.val();
        console.log(restoran_id, menu_id, cost, count);
        $.post( "/restoran/menu/order", {restoran_id:restoran_id, menu_id:menu_id, count:count, cost:cost}, function( data ) {
            if (data != 'none'){
                $('.js_order_href').data('current', data);
                $('.js_total_cost').html(data);
            }

            console.log(data);
        });
    });

    $('.js_order_href').click(function(){
        var min = parseInt($(this).data('min'));
        var current = parseInt($(this).data('current'));
        if (min > current)
            return false;
    });

    $('.js_promo_key').change(function(){
        var promo_key = $(this).val();
        var restoran_id = $(this).data('restoran_id');
        var sum = $(this).data('sum');

        console.log(promo_key, restoran_id, sum);

        $.post( "/order/promo", {restoran_id:restoran_id, promo_key:promo_key, sum:sum}, function( data ) {
            console.log(data, sum, promo_key);

            if (data != 'none'){
                $('.js_promo_key_val').html(' ');
                $('.js_promo_total_sum').html(sum);
            }

            data = parseInt(data);
            sum = parseInt(sum);



            var total_sum_html = sum + ' - ' + (sum - data) + ' = ' + data;

            $('.js_promo_key_val').html(promo_key);
            $('.js_promo_total_sum').html(total_sum_html);
        });

    });

});
