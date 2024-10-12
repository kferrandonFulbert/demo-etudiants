document.addEventListener("DOMContentLoaded", function () {
    const ipAddresses = [
        { ip: '88.213.233.148', name: 'Client VIP' },
        { ip: '192.168.1.2', name: 'Serveur local test' }
    ]; // Ajoutez vos adresses IP ici
    const ipGrid = document.getElementById('ip-grid');
    const alertSound = document.getElementById('alert-sound');

    function createIPAddressElement(ipData) {
        const ipAddressDiv = document.createElement('div');
        ipAddressDiv.classList.add('ip-address');
        ipAddressDiv.dataset.ip = ipData.ip;

        const squareDiv = document.createElement('div');
        squareDiv.classList.add('square');
        ipAddressDiv.appendChild(squareDiv);

        const nameSpan = document.createElement('span');
        nameSpan.classList.add('name');
        nameSpan.textContent = ipData.name;
        ipAddressDiv.appendChild(nameSpan);

        const addressSpan = document.createElement('span');
        addressSpan.classList.add('address');
        addressSpan.textContent = ipData.ip;
        ipAddressDiv.appendChild(addressSpan);

        const infoSpan = document.createElement('span');
        infoSpan.classList.add('info');
        ipAddressDiv.appendChild(infoSpan);

        ipGrid.appendChild(ipAddressDiv);
        console.log(ipGrid);
    }

    function updateStatus() {
        ipAddresses.forEach(ipData => {
            ping(ipData.ip, function (result) {
                const ipAddressDiv = document.querySelector(`.ip-address[data-ip="${ipData.ip}"]`);
                const infoSpan = ipAddressDiv.querySelector('.info');
                const squareDiv = ipAddressDiv.querySelector('.square');

                if (result.error) {
                    infoSpan.textContent = result.error;
                    infoSpan.classList.add('error');
                    squareDiv.style.backgroundColor = '#f44336'; // Rouge
                    alertSound.play();
                } else {
                    infoSpan.textContent = `Octets: ${result.bytes}, Temps: ${result.time}ms, TTL: ${result.ttl}`;
                    infoSpan.classList.remove('error');
                    squareDiv.style.backgroundColor = '#4CAF50'; // Vert
                }
            });
        });
    }

    setInterval(updateStatus, 10000); // Rafraîchissement toutes les 10 secondes

    function ping(ip, callback) {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    callback(response);
                } else {
                    callback({ error: 'IP injoignable' });
                }
            }
        };
        xhr.open('GET', `ping.php?ip=${ip}`, true);
        xhr.send();
    }

    // Créer les éléments pour chaque adresse IP au chargement de la page
    ipAddresses.forEach(ipData => {
        createIPAddressElement(ipData);
    });
});
