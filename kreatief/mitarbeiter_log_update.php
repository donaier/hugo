<!DOCTYPE html>
<html>
  <head>
    <title>Log gespeichert</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Home</a>

      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // mitarbeiter finden und anzeigen
        $ma = get_mitarbeiter($_GET['id']);

        // log speichern
        $date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
        $log = mysql_real_escape_string($_POST['log']);
        $creator = $_POST['betreuer'];
        $categories = join(' ', $_POST['kategorie']);

        $post_query = "UPDATE ma_logs SET log = '" . $log . "', creator = '" . $creator . "', `date` = '" . $date . "', category='" . $categories . "' WHERE `ma_logs`.`id` = " . $_POST['log_id'] . "";

        if ($dbhandle->query($post_query) === TRUE) {
          echo "<h3 class='text-center'>Log wurde gespeichert.</h3>";
          echo "<a href='./mitarbeiter_log.php?id=" . $ma['id'] . "' class='btn btn-primary'><span class='glyphicon glyphicon-chevron-left'></span>Zurück zu " . $ma['vorname'] . " " . $ma['name'] . "</a>";
        } else {
          echo "Error: " . $post_query . "<br>" . $dbhandle->error;
        }

        $dbhandle->close();
      ?>

      <hr />
    </div>
  </body>
</html>
