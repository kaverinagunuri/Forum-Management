<?php
include 'Login.php';
include 'UpdateUser.php';
$UserQuery = "SELECT AddressOne,AddressTwo, City FROM UserData WHERE Id='" . $_SESSION['id'] . "' LIMIT 1";
$UserResult = mysqli_query($Link, $UserQuery);
$Address = mysqli_fetch_array($UserResult);
$Variable = $Address['0'] . " " . $Address['1']." ".$Address['2'];
echo $Variable;
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript">
            var geocoder = new google.maps.Geocoder();
            var address = "<?php echo $Variable; ?>";
            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                }
                var myCenter = new google.maps.LatLng(latitude, longitude);
                function initialize()
                {
                    var mapProp = {
                        center: myCenter,
                        zoom: 5,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };

                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                    var marker = new google.maps.Marker({
                        position: myCenter,
                        title: 'Click to zoom'
                    });

                    marker.setMap(map);

// Zoom to 9 when clicking on marker
                    google.maps.event.addListener(marker, 'click', function () {
                        map.setZoom(9);
                        map.setCenter(marker.getPosition());
                    });
                    $("#MapModal").on("shown.bs.modal", function () {
                        google.maps.event.trigger(googleMap, "resize");
                        return map.setCenter(myCenter);
                    });
                }
                google.maps.event.addDomListener(window, 'load', initialize);

            });

        </script>
    </head>

    <body>
        <div id="googleMap" style="height:380px;"></div>
    </body>






</html>