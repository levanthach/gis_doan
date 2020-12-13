<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>ArcGIS JavaScript Tutorials: Create a Starter App</title>
  <style>
    html, body, #viewDiv {
      padding: 0;
      margin: 0;
      height: 100%;
      width: 100%;
    }
  </style>
  
    <link rel="stylesheet" href="https://js.arcgis.com/4.15/esri/themes/light/main.css">
  <script src="https://js.arcgis.com/4.15/"></script>
  
  <script>
    require([
      "esri/Map",
      "esri/views/MapView",
      "esri/Graphic",
      "esri/layers/GraphicsLayer",
      "esri/request",
      "esri/layers/GeoJSONLayer"
    ], function(Map, MapView, Graphic, GraphicsLayer, esriRequest, GeoJSONLayer) {

		var map = new Map({
		basemap: "topo-vector"
		});
		 map.on("load", function(){
          map.graphics.enableMouseEvents();
        });

		var view = new MapView({
		container: "viewDiv",
		map: map,
		center: [107.9860458374, 14.389535903931],
		zoom: 12,
          highlightOptions: {
            color: "blue"
          }
		});
		var options = {
          query: {
            f: "json"
          },
          responseType: "json"
        };
		// esriRequest('api.php?name=spaghetti_json', options).then(function (response) {
		// 	var graphicsLayer = new GraphicsLayer();
    //         //console.log("response", response);
    //         response.data.forEach(function(graphicJson){
	  //           var gp = new Graphic(graphicJson);
		// 		graphicsLayer.add(gp);
    //         });
		// 	map.add(graphicsLayer);
		// });
		const geojsonLayer = new GeoJSONLayer({
          url: "../app/views/home/api.php?name=spaghetti_geojson"
        });
        geojsonLayer.renderer = {
          type: "simple",
          symbol: {
					type: "simple-fill",
					color: [227, 139, 79, 0.4],
					outline: {
						color: [255, 255, 255],
						width: 1
					}
				}
        };
        map.add(geojsonLayer);
        view.popup.defaultPopupTemplateEnabled = true;
    });
  </script>
</head>
<body>
  <div id="viewDiv"></div>
</body>
</html>