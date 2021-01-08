<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Bản đồ phân bố mật độ dân số vùng Tây Nguyên</title>
  <link type="text/css" href="<?= BASEURL;  ?>/assets/css/horizontal_timeline.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://js.arcgis.com/4.15/esri/themes/light/main.css">
  <link href="<?= BASEURL;  ?>/assets/css/custom.css" rel="stylesheet" />
  <script src="<?= BASEURL;  ?>/assets/js/arcgis.js"></script>

  <script>
    require([
      "esri/Map",
      "esri/views/MapView",
      "esri/Graphic",
      "esri/layers/GraphicsLayer",
      "esri/request"
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

      var call_api = "../app/views/home/api.php?name=spaghetti_json";
      esriRequest(call_api, options).then(function(response) {
        var graphicsLayer = new GraphicsLayer();
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
      <div class="color-note">
            <img src="<?= BASEURL;  ?>/assets/images/note.png" ? alt="note-color">
      </div>
    </div>
</body>
<script src="<?= BASEURL;  ?>/assets/js/jquery.min.js"></script>
<script src="<?= BASEURL;  ?>/assets/js/horizontal_timeline.min.js"></script>
<script src="<?= BASEURL;  ?>/assets/js/custom.js"></script>

</html>