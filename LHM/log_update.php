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
        $query = "SELECT vorname, nachname, id FROM mitarbeiter WHERE id=" . $_GET['id'];
        $ma = mysqli_fetch_array(mysqli_query($dbhandle, $query));

        // log speichern
        $date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
        $log = mysql_real_escape_string($_POST['log']);
        $creator = $_POST['betreuer'];

        $post_query = "UPDATE ma_logs SET log = '" . $log . "', creator = '" . $creator . "', `date` = '" . $date . "' WHERE `ma_logs`.`id` = " . $_POST['log_id'] . "";

        if ($dbhandle->query($post_query) === TRUE) {
          echo "<h3 class='text-center'>Log wurde gespeichert.</h3>";
          echo "<a href='./mitarbeiter_detail.php?id=$ma[2]' class='btn btn-primary'><span class='glyphicon glyphicon-chevron-left'></span>Zurück zu $ma[0] $ma[1]</a>";
        } else {
          echo "Error: " . $post_query . "<br>" . $dbhandle->error;
        }

        $dbhandle->close();
      ?>

      <hr />
    </div>
  </body>
</html>
