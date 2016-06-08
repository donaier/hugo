<!DOCTYPE html>
<html>
  <head>
    <title>LHM Mitarbeiter</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="./js/nicEdit.js"></script>
    <script type="text/javascript">
      //<![CDATA[
      bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
      //]]>
    </script>
  </head>

  <body>
    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
      <hr />

      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // mitarbeiter finden und anzeigen
        $query = "SELECT vorname, nachname FROM mitarbeiter WHERE id=" . $_GET['id'];
        $ma = mysqli_fetch_array(mysqli_query($dbhandle, $query));

        echo "<h3 class='text-center'>" . $ma[0] . " " . $ma[1] . "</h3>";
      ?>

      <hr />
      <form action="./mitarbeiter_detail.php?id=<?php echo $_GET['id'] ?>" method="POST" class="form-horizontal">
        <select name="day">
          <?php 
            for ($d=1; $d <= 31; $d++) {
              if ($d == date('j')) {
                echo "<option selected value='$d'>$d.</option>";
              } else {
                echo "<option value='$d'>$d.</option>";
              }
            }
          ?>
        </select>
        <select name="month">
          <?php
            for ($m=1; $m <= 12 ; $m++) { 
              if ($m == date('n')) {
                echo "<option selected value='$m'>$m.</option>";
              } else {
                echo "<option value='$m'>$m.</option>";
              }
            }
          ?>
        </select>
        <select name="year">
          <?php
            for ($y=2016; $y < 2099; $y++) { 
              if ($y == date('o')) {
                echo "<option selected value='$y'>$y</option>";
              } else {
                echo "<option value='$y'>$y</option>";
              }
            }
          ?>
        </select>
        <br />
        <br />
        <textarea name="log" class="form-control" rows="6"></textarea>
        <br />
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-8 control-label">Ausgefüllt von:</label>
          <div class="col-sm-4">
            <input class="form-control" name="betreuer"></input>
          </div>
        </div>
        <br />
        <input type="submit" value="Speichern" class="btn btn-success pull-right" />
        <br />
        <br />
        <br />
      </form>

      <?php 
        // neuer log speichern (wenn post)

        if (isset($_POST['log'])) {
          $date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
          $log = $_POST['log'];
          $creator = $_POST['betreuer'];

          $fields = 'mitarbeiter_id, date, log, creator';
          $values = [
                      "'" . $_GET['id'] . "'",
                      "'" . $date . "'",
                      "'" . $log . "'",
                      "'" . $creator . "'"
                    ];

          $post_query = "INSERT INTO ma_logs (" . $fields . ") VALUES (" . join(', ', $values) . ")";

          if ($dbhandle->query($post_query) === TRUE) {
            // worked
          } else {
            echo "Error: " . $post_query . "<br>" . $dbhandle->error;
          }

        }
      ?>

      <?php
        // logs des mitarbeiters anzeigen

        $log_query = "SELECT * FROM ma_logs WHERE mitarbeiter_id=" . $_GET['id'] . " ORDER BY date DESC";
        $log_data = mysqli_query($dbhandle, $log_query);

        echo "<table class='table'>";
          while ($row = mysqli_fetch_array($log_data)) {
            if (date('W', strtotime($row[2])) % 2 == 0) {
              echo "<tr class='active'>";
            } else {
              echo "<tr>";
            }
            echo "<td><strong>" . date('d.m.Y', strtotime($row[2])) . "</strong><br />" . wochentag($row[2]) . "</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            echo "<td><a href='log_edit.php?id=" . $_GET['id'] . "&log_id=" . $row[0] . "' class='button button-primary'><i class='glyphicon glyphicon-pencil'></i></a></td>";
            echo "</tr>";
          }
        echo "</table>";
      ?>
    </div>
  </body>
</html>
