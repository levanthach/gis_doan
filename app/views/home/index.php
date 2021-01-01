<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>ArcGIS JavaScript Tutorials: Create a Starter App</title>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/ycodetech/horizontal-timeline-2.0@2/css/horizontal_timeline.2.0.min.css">

  <style>
    html,
    body,
    #viewDiv {
      padding: 0;
      margin: 0;
      height: 100%;
      width: 100%;
    }
    #timeSlider {
      position: absolute;
      left: 2%;
      bottom: 20px;
      background: #fff;
      width: 650px;
      padding: 10px 20px;
  }

    .esri-time-slider__animation {
      display: none;
    }
    
    .esri-time-slider__time-extent {
      display: none!important;
    }
    
    .events-content ol li {
      display: none;
    }

    .events-content {
      height: 0!important;
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
      "esri/request"
      //"esri/widgets/TimeSlider",
    ], function(Map, MapView, Graphic, GraphicsLayer, esriRequest) {
      var map = new Map({
        basemap: "topo-vector",
        operationalLayers: [],
      });
      map.on("load", function() {
        map.graphics.enableMouseEvents();
      });

      var view = new MapView({
        container: "viewDiv",
        map: map,
        center: [107.99404907227, 14.368187904358],
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

      var call_api = "../app/views/home/api.php?name=spaghetti_json"
      esriRequest(call_api, options).then(function(response) {
        var graphicsLayer = new GraphicsLayer();
        //console.log("response", response);
        console.log(response);
        response.data.forEach(function(graphicJson) {
          var gp = new Graphic(graphicJson);
          graphicsLayer.add(gp);
          graphicsLayer.opacity = 0.6;
        });
        map.add(graphicsLayer);
      });

      view.popup.defaultPopupTemplateEnabled = true;
    });
  </script>
</head>

<body>
  <div class="wrapper">
    <div class="top-bar">
      <div class="select-option">
        <label for="province">Chọn tỉnh:</label>
        <select id="province" name="province">
          <option value="">--- Chọn Tỉnh ---</option>
          <?php foreach ($data['province'] as $key => $value) : ?>
            <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
          <?php endforeach; ?>
        </select>

        <label for="district">Chọn huyện:</label>
        <select id="district" name="district">
          <option value="" id="select-district">--- Chưa chọn Tỉnh ---</option>
        </select>

        <label for="commune">Chọn xã:</label>
        <select id="commune" name="commune">
          <option value="" id="select-commune">--- Chưa chọn Quận/Huyện ---</option>
        </select>
        <span style="float: right;">
          <label for="time">Thời gian:</label>
          <select id="time">
            <?php foreach ($data['time'] as $key => $value) : ?>
              <option value="<?= $value['time'] ?>"><?= $value['time'] ?><?= $value['time'] ?></option>
            <?php endforeach; ?>
          </select>
        </span>
      </div>
      <div id="viewDiv"></div>
      <div class="horizontal-timeline" id="timeSlider">
          <div class="events-content">
            <ol>
            <?php foreach ($data['time'] as $key => $value) : ?>
              <li data-horizontal-timeline='{"date": "1/1/<?= $value['time'] ?>"}'>
              </li>
            <?php endforeach; ?>
            </ol>
          </div>
    </div>

    </div>
</body>
<script src="<?= BASEURL;  ?>/assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/ycodetech/horizontal-timeline-2.0@2/JavaScript/horizontal_timeline.2.0.min.js"></script>
<script src="<?= BASEURL;  ?>/assets/js/custom.js"></script>
</html>