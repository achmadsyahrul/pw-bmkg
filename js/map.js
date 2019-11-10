require([
    "esri/Map",
    "esri/views/MapView"
], function (Map, MapView) {

    var map = new Map({
        basemap: "topo-vector"
    });

    var view = new MapView({
        container: "viewDiv",
        map: map,
        center: [110.369492, -7.795580], // longitude, latitude
        zoom: 13
    });
});
