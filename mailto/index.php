<!DOCTYPE html>
<html>
  <head>
    <title>Titre du document</title>
  </head>
  <body>
    <h2>Donner Feedback à notre site Web.</h2>
    <form action="mailto:kferrandon@gmail.com" method="get" enctype="text/plain">
      <p>Sujet: <input type="text" name="subject" /></p>
      <input type="hidden" name="cc" value="meni@gmail.com" />
      <p>
        Commentaires:
        <br />
        <textarea name="body" rows="12" cols="35">Envoyez votre commentaires au site Web.</textarea>
        <br />
      </p>

      <p>
        <input type="submit" name="submit" value="Send" />
        <input type="reset" name="reset" value="Clear Form" />
      </p>
    </form>
  </body>
</html>