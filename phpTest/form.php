<!-- l'attribut action sera le script qui sera executé
 à la validation du formulaire.
La méthode représente la façon de récupérer les données 
dans le script resultats.php
 !-->
<form action="resultats.php" method="post">
    <label for="mail">E-Mail</label>  
    <input type="mail" name="mail" required/>
    <input type="submit" value="OK">
</form>