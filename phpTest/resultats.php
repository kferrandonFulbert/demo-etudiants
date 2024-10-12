<?php
/* Je récupère la valeur de mon formulaire à 'aide de la fonction 
filter_input et je peux lui indiquer le type de valeur attendu avec 
Filter_Sanitize https://www.php.net/manual/en/filter.filters.sanitize.php
ou Filter_Validate https://www.php.net/manual/en/filter.filters.validate.php
Evitez l'utilisation de $_POST['mail']
*/ 
$mailToString = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_ENCODED);
$mail= filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
echo "Mail en chaine de caractères $mailToString <br>";
echo "Mail: $mail"; 
/* Si une variable n'est pas affichée c'est que la fonction 
 filter_input a renvoyé false donc penser a tester la variable
 après l'utilisation de filter_input si besoin if(!$mail){...}
 */