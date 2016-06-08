<!DOCTYPE html>
<html>
  <head>
    <title>Log gespeichert</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php 
      include "functions.php";
      $dbhandle = database_connect();

      // mitarbeiter finden
      $ma = get_mitarbeiter($_GET['id']);
    ?>
    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Home</a>

      <?php
        // medi speichern
        $post_query = "UPDATE ma_medis SET medikament = '" . $_POST['medikament'] . "', zeitraum = '" . $_POST['zeitraum'] . "', kommentar= '" . $_POST['kommentar'] . "', status='" . $_POST['status'] . "' WHERE `ma_medis`.`id` = " . $_POST['id'] . "";

        if ($dbhandle->query($post_query) === TRUE) {
          echo "<h3 class='text-center'>Medikament wurde gespeichert.</h3>";
          echo "<a href='./mitarbeiter_health.php?id=" . $ma['id'] . "' class='btn btn-primary'><span class='glyphicon glyphicon-chevron-left'></span>Zurück zu " . $ma['vorname'] . " " . $ma['name'] . "</a>";
        } else {
          echo "Error: " . $post_query . "<br>" . $dbhandle->error;
        }

        $dbhandle->close();
      ?>

      <hr />
    </div>
  </body>
</html>
