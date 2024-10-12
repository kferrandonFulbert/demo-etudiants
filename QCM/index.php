<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <label for="q1">
        Combien font 2 + 2
    </label>
    <p id="erreur"></p>
    <input id="q1" type="radio" name="question1">
    <input id="q2" type="radio" name="question1">
    <input id="q3" type="radio" name="question1">
    <input id="q4" type="radio" name="question1">
    <a href="#" onclick="valideForm()">Valider</a>

    <script>
        function valideForm() {
            var donnees = document.getElementsByName("question1");
            let elt = null;
            donnees.forEach(element => {
                if (element.checked) {
                    elt = element.id;
                }
            });

            let jsonElt = JSON.stringify(elt);
            console.log(jsonElt);
            fetch("reponse.php?id=" + encodeURI(jsonElt))
                .then(reponse => {
                   return reponse.json();
                  //  return JSON.parse(reponse);
                }).then(data => {
                   let message = document.getElementById("erreur");
                    message.innerHTML = data.id;
                })
        }
    </script>
</body>

</html>