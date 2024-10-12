<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Carte des événements</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" crossorigin=""></script>
    <style>
        #map {
            width: 100%;
            height: 100vh;
        }
    </style>
</head>

<body>
    <h1>Map</h1>
    <div id="map"></div>
    <script>
        var map = L.map('map').setView([48.8566, 2.3522], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        fetch('data.php')
            .then(response => response.json())
            .then(data => {
                    data.forEach(marker => {
                            if (marker.latitude !== null) {
                            L.marker([marker.latitude, marker.longitude])
                                .addTo(map)
                                .bindPopup(`<strong>${marker.title}</strong><br>${marker.description}<br>${marker.starting_date} - ${marker.ending_date}<br>${marker.location}<br>${marker.address}<br>${marker.departement} - ${marker.commune}<br>${marker.tarif}<br><a href="${marker.instagram_link}">Instagram</a> | <a href="${marker.facebook_link}">Facebook</a> | <a href="${marker.twitter_link}">Twitter</a><br>${marker.disciplines}`);
                        }
                    });
            })
        .catch(error => console.error('Error:', error));
    </script>
</body>

</html>