if (jQuery("#map_area").length > 0){
    console.log('info');

    var map_area;
    ymaps.ready(init);

    function init()
    {
        var city_center = jQuery('.js_map_field_main').data('city_center');
        city_center = city_center.split(',');
        
        map_area = new ymaps.Map("map_area",{
            center: [city_center[0], city_center[1]],
            zoom: 12,
            behaviors: ["default", "scrollZoom"]
        },
        {
            balloonMaxWidth: 300
        });


        lng = city_center[0];
        lat = city_center[1];
        myPlacemark = new ymaps.Placemark([lng, lat]);
        map_area.geoObjects.add(myPlacemark);

        map_area.controls.add("zoomControl");
        map_area.controls.add("mapTools");
        map_area.controls.add("typeSelector");
    }
}
