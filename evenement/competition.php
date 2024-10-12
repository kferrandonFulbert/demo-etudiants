<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carte des lieux de compétition</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"  crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" crossorigin=""></script>
    <style>
        #map {
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body>
<h1>Carte des compétitions</h1>
    <div id="map" style="width:1024px;height:680px;"></div>
    <script>
        var map = L.map('map').setView([48.8566, 2.3522], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        fetch('data_competition.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(marker => {
                    L.marker([marker.latitude, marker.longitude])
                        .addTo(map)
                        .bindPopup(`<strong>${marker.nom_site}</strong><br>${marker.sports}<br>${marker.start_date} - ${marker.end_date}<br>${marker.adress}<br>${marker.point_geo}`);
                });
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>
</html>
