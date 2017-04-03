$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // autocompie js_find_address
    if ($(".js_find_address").length > 0){
        $( ".js_find_address" ).autocomplete({
            source: function( request, response ) {
                var city_id = $('.js_find_address_city_id').val();
                if (city_id == '0' || city_id == 0){
                    $(".js_find_address").val(' ');
                    $('.js_find_address_city_id').addClass('error');
                }
                else
                    $('.js_find_address_city_id').addClass('error');

                $.ajax({
                    type: "POST",
                    url: "/geocoder?name=" + request.term + "&city_id=" + city_id,
                    dataType: "json",
                    success: function ( data ) {
                        console.log(data);
                        $('.js_find_address_lat').val('0');
                        $('.js_find_address_lng').val('0');

                        if (data == '0' || data == 0)
                            $(".js_find_address").val(' ');

                        response (data);
                    },
                    error: function () {

                    }
                });
            },
            select: function(event, ui) {
                event.preventDefault();
                $(this).val(ui.item.label);
                var coords = ui.item.value;
                result= coords.split(' ');
                console.log(result);
                console.log(result[0], result[1]);
                $('.js_find_address_lat').val(result[0]);
                $('.js_find_address_lng').val(result[1]);
                console.log($('.js_find_address_lat').val(), $('.js_find_address_lng').val());
            },
        });

        $('.js_find_address_submit').click(function(){
            var city_id = $('.js_find_address_city_id').val();
            var find_address = $('.js_find_address').val();
            var lat = $('.js_find_address_lat').val();
            var lng = $('.js_find_address_lng').val();

            console.log(city_id, find_address, lat, lng);
            console.log('asdasd');

            if (city_id == '0' || city_id == 0 || find_address == '')
                return false;

            if (lat == '' || lng == '' || lat == undefined || lng == undefined || lat == 0 || lat == '0' || lng == 0 || lng == '0'){
                $( ".js_find_address" ).autocomplete("search");
                return false;
            }

            return true;
        })
    }

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
