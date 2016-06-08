<!DOCTYPE html>
<html>
  <head>
    <title>Mitarbeiter gespeichert</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>

      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // Mitarbeiter speichern
        $query = "INSERT INTO mitarbeiter (vorname, nachname) VALUES ('" . $_POST['vorname'] . "', '" . $_POST['nachname'] . "')";

        if ($dbhandle->query($query) === TRUE) {
          echo "<h3 class='text-center'>" . $_POST['vorname'] . " " . $_POST['nachname'] . " wurde gespeichert.</h3>";
        } else {
          echo "Error: " . $query . "<br>" . $dbhandle->error;
        }

        $dbhandle->close();
      ?>

      <hr />
    </div>
  </body>
</html>
