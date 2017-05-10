var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    console.log('main js');
    // check new email
    $('.js_check_new_email').change(function(){
        $.post( "/check-email", {email:$(this).val()}, function( data ) {
            if (data == '1' || data == 1){
                $('.js_check_new_email_message').show();
            }
            else {
                $('.js_check_new_email_message').hide();
            }
        });
    });

    //change form and ajax catalog
    $('.js_change_form_ajax input').change(function(){
        var form = $(this).closest('form');
        var data = form.serialize();

        $.post( "/catalog/ajax?"+data, function( data ) {
            if (data == 0 || data == '0')
                return false;

            $('.js-catalog-list').html(data);
        });

    })

    //change form and send
    $('.js_change_form input').change(function(){
        //console.log('changed checkbox');
        $(this).closest('form').submit();
    });

    //getUrlParameter open modal
    if (getUrlParameter('login')){
        $('#overlay').css('display', 'block');
        $('#modal_login').css('display', 'block');
        $('#modal_login').css('opacity', '1');
    }

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
                    beforeSend: function(){
                        $( ".js_find_address" ).addClass('ajax_loader');
                    },
                    success: function ( data ) {
                        $( ".js_find_address" ).removeClass('ajax_loader');

                        $('.js_find_address_lat').val('0');
                        $('.js_find_address_lng').val('0');

                        /*
                        if (data == '0' || data == 0)
                            $(".js_find_address").val(' ');
                        */

                        response (data);
                    },
                    error: function () {

                    },
                    focus: function (event, ui) {
                        //this.value = ui.item.label;
                        console.log('focus');
                        $('#autocomplete-input').val(ui.item.label);

                        // Prevent the default focus behavior.
                        event.preventDefault();
                        // or return false;
                    }
                });
            },
            select: function(event, ui) {
                if (ui.item.point_user == 0 || ui.item.point_user == '0'){
                    event.preventDefault();
                    //console.log('empty');
                    return false;
                }
                //alert('asdas');
                event.preventDefault();

                //console.log('point_user');
                //console.log(ui.item.point_user);
                $(this).val(ui.item.label);
                var coords = ui.item.point_user;
                if (coords != 0 || coords != '0'){
                    result= coords.split(' ');
                    $('.js_find_address_lat').val(result[0]);
                    $('.js_find_address_lng').val(result[1]);
                }
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
        var title = menu_item.data('title');
        var cat = menu_item.data('cat');
        var count = menu_item.val();
        console.log(restoran_id, menu_id, cost, count);
        $.post( "/restoran/menu/order", {restoran_id:restoran_id, menu_id:menu_id, count:count, cost:cost}, function( data ) {
            if (data == 'none'){
                $('.js_busket_item_li_'+menu_id).remove();
                return false;
            }


            $('.js_order_href').data('current', data);
            $('.js_total_cost').html(data);

            if (parseInt(count) == 0){
                $('.js_busket_item_li_'+menu_id).remove();
                return false;
            }

            if ($('.js_busket_item_li_'+menu_id).length == 0)
                $('.js_busket_list').append('<li class="js_busket_item_li_' + menu_id + '"></li>');

            var html_text =  '<div class="busket-item">'+
                                    '<div class="busket-item__name">'+
                                        '<div class="busket-item__name-category">'+
                                            cat +
                                        '</div>'+ title +
                                    '</div>'+
                                    '<div class="busket-item__count">x' + count + '</div>'+
                                    '<div class="busket-item__del js_busket_item_li_delete" data-id="'+menu_id+'" data-restoran_id="'+restoran_id+'"></div>'+
                                '</div>';
            $('.js_busket_item_li_'+menu_id).html(html_text);


            $('.js_asdasdas').css('color', 'inherit');

            console.log(data);
        });
    });

    $( "body" ).on( "click", ".js_busket_item_li_delete", function() {
        var menu_id = $(this).data('id');
        var restoran_id = $(this).data('restoran_id');
        var li = $(this).parent().parent();

        $.post( "/restoran/menu/order", {restoran_id:restoran_id, menu_id:menu_id, count:0, cost:0}, function( data ) {
            if (data == 'none')
                return false;

            $('.js_order_href').data('current', data);
            $('.js_total_cost').html(data);

            li.remove();
        });
        console.log(menu_id, restoran_id);
    });

    $('.js_order_href').click(function(){
        var min = parseInt($(this).data('min'));
        var current = parseInt($(this).data('current'));
        if (min > current){
            $('.js_asdasdas').css('color', 'red');

            return false;
        }

    });

    $('.js_promo_key').change(function(){
        var promo_key = $(this).val();
        var restoran_id = $(this).data('restoran_id');
        var sum = $(this).data('sum');

        console.log(promo_key, restoran_id, sum);

        $.post( "/order/promo", {restoran_id:restoran_id, promo_key:promo_key, sum:sum}, function( data ) {
            console.log(data, sum, promo_key);

            if (data == 'none' || data == NaN){
                $('.js_promo_key_val').html(' ');
                $('.js_promo_total_sum').html(sum);
                return true;
            }

            data = parseInt(data);
            sum = parseInt(sum);

            var total_sum_html = sum + ' - ' + (sum - data) + ' = ' + data;

            $('.js_promo_key_val').html(promo_key);
            $('.js_promo_total_sum').html(total_sum_html);
        });

    });

});
