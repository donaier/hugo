<!DOCTYPE html>
<html>
  <head>
  	<title>Neuer Mitarbeiter erfassen</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
      <hr />

      <form action="mitarbeiter_save.php" method="POST" class="form-horizontal">
        <div class="form-group">
          <label for="name" class="control-label col-sm-2">Vorname:</label>
          <div class="col-sm-10">
            <input name="vorname" class="form-control"></input>
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="control-label col-sm-2">Nachname:</label>
          <div class="col-sm-10">
            <input name="nachname" class="form-control"></input>
          </div>
        </div>
        <input type="submit" value="Speichern" class="btn btn-success pull-right"></input>
      </form>
    </div>
  </body>
</html>
