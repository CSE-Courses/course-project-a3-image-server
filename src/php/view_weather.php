<?php
session_start();
include 'api.php';
include 'connect_db.php';
global $conn;


$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT location from imagemeta where image_id = '".$_GET['id']."' "));
$report  = json_decode(fetch_weather_report($row['location']));

?>

<!doctype html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- local bootstrap css-->
    <link rel="stylesheet" href="../styles/bootstrap.min.css">

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="../styles/customstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>


    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />

    <title>Home - Image Server</title>
</head>

<!-- The classes help format the sticky footer -->
<body class="d-flex flex-column h-100">

<script src="../js/customfunctions.js"> </script>

<script src="../js/sessionVar.php"> </script>

<div id="navbar"></div>

<!-- The classes help format the sticky footer -->
<main role="main" class="flex-shrink-0">
    <div id="content" class="container">

        <!-- Most of the body is here. It's just a row with an 8/12 column -->
        <div class="row justify-content-center w-100 my-5">
            <div class="container" style="border-radius: 10px">
                <?php

                if(isset($_SESSION['success'])){
                    ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                    <?php
                    unset($_SESSION['success']);
                }
                else if(isset($_SESSION['error'])){
                    ?>
                    <div class="alert alert-success"><?=$_SESSION['error']?></div>
                    <?php
                    unset($_SESSION['error']);
                }
                ?>
                <!-- Need to make this section taller -->
               <?php
               if(isset($report->success) && $report->success == false){
                   ?>
                <div class="card text-center w-100 border-0 rounded-0" style="border-radius: 10px">
                        <div class="alert alert-danger">
                            No results found may be due to invalid city name or invalid api key
                        </div>

                </div>
                <?php
               }else{
                   ?>
                   <div class="card text-center w-100 border-0 rounded-0" style="border-radius: 10px">
                       <div class="card-body">
                           <div class="alert alert-primary" role="alert">
                               Weather Information
                           </div>
                           <div class="row">
                               <div class="col">
                                   <div class="card" style="width: 18rem;">
                                       <div class="card-header">
                                           Location
                                       </div>
                                       <ul class="list-group list-group-flush">
                                           <li class="list-group-item">City   <code><?=$report->location->name?></code></li>
                                           <li class="list-group-item">Country <code><?=$report->location->country?></code></li>
                                           <li class="list-group-item">Region <code><?=$report->location->region?></code></li>
                                       </ul>
                                   </div>

                               </div>
                               <div class="col">
                                   <div class="card" style="width: 18rem;">
                                       <div class="card-header">
                                           Weather Details
                                       </div>
                                       <ul class="list-group list-group-flush">
                                           <li class="list-group-item">Wind Speed      <code><?=$report->current->wind_speed. ' km/hr'?></code></li>
                                           <li class="list-group-item">Wind Degree     <code><?=$report->current->wind_degree?></code></li>
                                           <li class="list-group-item">Wind Direction  <code><?=$report->current->wind_dir?></code></li>
                                           <li class="list-group-item">Presure         <code><?=$report->current->pressure.' m'?></code></li>

                                       </ul>
                                   </div>
                               </div>


                               <div class="col">
                                   <div class="alert alert-info">
                                       The current weather is <strong><?=$report->current->weather_descriptions[0]?></strong> <img style="border-radius: 10px" src="<?=$report->current->weather_icons[0]?>"/>
                                   </div>

                                   <div class="card" style="width: 18rem;">
                                       <div class="card-header">
                                           Weather Details
                                       </div>
                                       <ul class="list-group list-group-flush">
                                           <li class="list-group-item">Temperate        <code><?=$report->current->temperature?><span>&#8451;</span> </code></li>
                                           <li class="list-group-item">Humidity        <code><?=$report->current->humidity.' %'?></code></li>
                                           <li class="list-group-item">Cloud cover     <code><?=$report->current->cloudcover.' %'?></code></li>
                                           <li class="list-group-item">Visibility      <code><?=$report->current->visibility.' m'?></code></li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                           <br/>
                           <h5> Location </h5>
                           <div id='map' style='width: 100%; height: 500px;'></div>
                           <script>
                               mapboxgl.accessToken = 'pk.eyJ1IjoibXVoYW1tbWFkYXRpZiIsImEiOiJja2Y3czEwZ2swNWIyMnFzNmMwcDd5MHY3In0.8N8gcgzUpOiCOXCoxkmcSA';
                               var map = new mapboxgl.Map({
                                   container: 'map',
                                   style: 'mapbox://styles/mapbox/streets-v11',
                                   center: [<?= $report->location->lon?>, <?= $report->location->lat?>],
                                   zoom: 13
                               });

                               var marker = new mapboxgl.Marker()
                                   .setLngLat([<?=$report->location->lon?>, <?=$report->location->lat?>])
                                   .addTo(map);
                               /* given a query in the form "lng, lat" or "lat, lng" returns the matching
                               * geographic coordinate(s) as search results in carmen geojson format,
                               * https://github.com/mapbox/carmen/blob/master/carmen-geojson.md
                               */
                               var coordinatesGeocoder = function (query) {
// match anything which looks like a decimal degrees coordinate pair
                                   var matches = query.match(
                                       /^[ ]*(?:Lat: )?(-?\d+\.?\d*)[, ]+(?:Lng: )?(-?\d+\.?\d*)[ ]*$/i
                                   );
                                   if (!matches) {
                                       return null;
                                   }

                                   function coordinateFeature(lng, lat) {
                                       return {
                                           center: [lng, lat],
                                           geometry: {
                                               type: 'Point',
                                               coordinates: [lng, lat]
                                           },
                                           place_name: 'Lat: ' + lat + ' Lng: ' + lng,
                                           place_type: ['coordinate'],
                                           properties: {},
                                           type: 'Feature'
                                       };
                                   }

                                   var coord1 = Number(<?=$report->location->lat?>);
                                   var coord2 = Number(<?=$report->location->lon?>);
                                   var geocodes = [];

                                   if (coord1 < -90 || coord1 > 90) {
// must be lng, lat
                                       geocodes.push(coordinateFeature(coord1, coord2));
                                   }

                                   if (coord2 < -90 || coord2 > 90) {
// must be lat, lng
                                       geocodes.push(coordinateFeature(coord2, coord1));
                                   }

                                   if (geocodes.length === 0) {
// else could be either lng, lat or lat, lng
                                       geocodes.push(coordinateFeature(coord1, coord2));
                                       geocodes.push(coordinateFeature(coord2, coord1));
                                   }

                                   return geocodes;
                               };


                           </script>

                           </p>
                       </div>
                   </div>
                <?php
               }

               ?>
            </div>
        </div>
        <div class="row justify-content-center w-100 my-5">
            <div id="imageDescription" class="col-8"></div>
        </div>
    </div>


</main>

<!-- The footer -->
<footer id="footer" class="footer mt-auto py-3"></footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script>
    var status = '<?php echo isset($_SESSION['email'] ) ? 'authenticated':'not_authenticated' ?>';
    ImgServerView.insertNavbar(status);
    if(status === 'not_authenticated'){
        document.getElementById("sessionName").innerHTML='<p>Status : Disconnected</p>'
    }
    ImgServerView.insertFooter(status);
    ImgServerController.setupMenuEvents();
</script>
</body>
</html>

