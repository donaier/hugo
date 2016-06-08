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
        $ma = get_mitarbeiter($_GET['id']);

        // Mitarbeiter speichern
        if ($ma['status'] == 'active') {
          $query = "UPDATE `clients` SET status='inactive' WHERE `clients`.`id` = " . $ma['id'];
        } else {
          $query = "UPDATE `clients` SET status='active' WHERE `clients`.`id` = " . $ma['id'];
        }

        if ($dbhandle->query($query) === TRUE) {
          echo "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . " wurde aktualisiert.</h3>";
        } else {
          echo "Error: " . $query . "<br>" . $dbhandle->error;
        }

        $dbhandle->close();
      ?>

      <hr />
    </div>
  </body>
</html>
