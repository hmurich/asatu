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

        // Создаем многоугольник без вершин.
        var poly_coords = jQuery('.js_map_field_main').data('coords');
        console.log(poly_coords);
        if (poly_coords = 'none')
            poly_coords = [];
            
        var myPolygon = new ymaps.Polygon([
            poly_coords,
            []
        ]);
        // Добавляем многоугольник на карту.
        map_area.geoObjects.add(myPolygon);

        // В режиме добавления новых вершин меняем цвет обводки многоугольника.
        var stateMonitor = new ymaps.Monitor(myPolygon.editor.state);
        stateMonitor.add("drawing", function (newValue) {
            myPolygon.options.set("strokeColor", newValue ? '#FF0000' : '#0000FF');
        });


        // Включаем режим редактирования с возможностью добавления новых вершин.
        myPolygon.editor.startDrawing();
        /*
        myPolygon.editor.events.add(["beforevertexadd", "beforevertexdrag"], function (event) {
            var mapGlobalPixelCenter = map_area.getGlobalPixelCenter(),
                globalPixels = event.get("parentModel")

            console.log(myPolygon.getCoordinates());
        });+
        */
        myPolygon.geometry.events.add('change', function () {
           //
           var coords = myPolygon.geometry.getCoordinates().toString();
           //var coords = myPolygon.geometry.getCoordinates();
           console.log(myPolygon.geometry.getCoordinates());
           jQuery('.js_area_coords').val(coords);
        });

        map_area.controls.add("zoomControl");
        map_area.controls.add("mapTools");
        map_area.controls.add("typeSelector");
    }
}
