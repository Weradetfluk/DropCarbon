<!doctype html>
<html>

<head>
    <title>Hike map</title>
    <style>
        html,
        body,
        #map {
            height: 80%;
            width: 60%;
        }
    </style>
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script>
        var map, vectorLayer, selectedFeature;
        var lat = 13.739265947352873;
        var lon = 101.02800517730239;
        var zoom = 14;
        var curpos = new Array();
        var markers = new OpenLayers.Layer.Markers("Markers");
        var position;

        var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
        var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
        var cntrposition = new OpenLayers.LonLat(lon, lat).transform(fromProjection, toProjection);

        OpenLayers.Layer.OSM.HikeMap = OpenLayers.Class(OpenLayers.Layer.OSM, {
            initialize: function (name, options) {
                var url = [
                    "http://a.tile.thunderforest.com/outdoors/${z}/${x}/${y}.png?apikey=698be2e6da1a43b191eb6265f1c002aa",
                    "http://b.tile.thunderforest.com/outdoors/${z}/${x}/${y}.png?apikey=698be2e6da1a43b191eb6265f1c002aa",
                    "http://c.tile.thunderforest.com/outdoors/${z}/${x}/${y}.png?apikey=698be2e6da1a43b191eb6265f1c002aa",
                ];
                var newArguments = [name, url, options];
                OpenLayers.Layer.OSM.prototype.initialize.apply(this, newArguments);
            },
        });

        function init() {
            map = new OpenLayers.Map("map");
            var cycleLayer = new OpenLayers.Layer.OSM.HikeMap("Hiking Map");

            map.addLayer(cycleLayer);
            map.setCenter(cntrposition, zoom);

            var click = new OpenLayers.Control.Click();
            map.addControl(click);

            click.activate();
        };

        OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {
            defaultHandlerOptions: {
                'single': true,
                'double': false,
                'pixelTolerance': 0,
                'stopSingle': false,
                'stopDouble': false
            },

            initialize: function (options) {
                this.handlerOptions = OpenLayers.Util.extend({}, this.defaultHandlerOptions);
                OpenLayers.Control.prototype.initialize.apply(this, arguments);
                this.handler = new OpenLayers.Handler.Click(this, {
                    'click': this.trigger
                }, this.handlerOptions);
            },

            trigger: function (e) {
                var lonlat = map.getLonLatFromPixel(e.xy);
                lonlat1 = new OpenLayers.LonLat(lonlat.lon, lonlat.lat).transform(toProjection, fromProjection);

                markers.clearMarkers();
                $('#com_lat').val(lonlat1.lat);
                $('#com_lon').val(lonlat1.lon);
                show_maker(lonlat1.lat, lonlat1.lon);


            },
        });

        function show_maker(lon, lat) {
            console.log(lon + " " + lat);
            var lonLat = new OpenLayers.LonLat(lat, lon)
                .transform(
                    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                    map.getProjectionObject() // to Spherical Mercator Projection
                );

            var zoom = 16;
         
            map.addLayer(markers);

            markers.addMarker(new OpenLayers.Marker(lonLat));

            map.setCenter(lonLat, zoom);
        }
    </script>
</head>

<body onload='init();'>

    <p>เลือกที่ตั้งของสถานถี่</p>
    <div id="map"></div>
</body>

</html>
