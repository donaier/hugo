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

        $query = "SELECT id, vorname, nachname FROM mitarbeiter WHERE id=" . $_GET['id'];
        $ma = mysqli_fetch_array(mysqli_query($dbhandle, $query));

        // Mitarbeiter aktivieren/deaktivieren
        if ($_GET['action'] == 'activate') {
          $query = "UPDATE `mitarbeiter` SET status='active' WHERE `mitarbeiter`.`id` = " . $ma['id'];
          $response = "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['nachname'] . " wurde aktiviert.</h3>";
        } elseif ($_GET['action'] == 'deactivate') {
          $query = "UPDATE `mitarbeiter` SET status='inactive' WHERE `mitarbeiter`.`id` = " . $ma['id'];
          $response = "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['nachname'] . " wurde deaktiviert.</h3>";
        }

        if ($dbhandle->query($query) === TRUE) {
          echo $response;
        } else {
          echo "Error: " . $query . "<br>" . $dbhandle->error;
        }

        $dbhandle->close();
      ?>

      <hr />
    </div>
  </body>
</html>
