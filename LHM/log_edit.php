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

        // log finden
        $log_query = "SELECT * FROM ma_logs WHERE mitarbeiter_id=" . $_GET['id'] . " AND id=" . $_GET['log_id'];
        $log = mysqli_fetch_array(mysqli_query($dbhandle, $log_query));
      ?>

      <hr />
      <form action="./log_update.php?id=<?php echo $_GET['id'] ?>" method="POST" class="form-horizontal">
        <select name="day">
          <?php 
            for ($d=1; $d <= 31; $d++) {
              if ($d == date('j', strtotime($log[2]))) {
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
              if ($m == date('n', strtotime($log[2]))) {
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
              if ($y == date('o', strtotime($log[2]))) {
                echo "<option selected value='$y'>$y</option>";
              } else {
                echo "<option value='$y'>$y</option>";
              }
            }
          ?>
        </select>
        <br />
        <br />
        <textarea name="log" class="form-control" rows="6"><?php echo $log[3] ?></textarea>
        <br />
        <div class="form-group">
          <label for="betreuer" class="col-sm-8 control-label">Ausgefüllt von:</label>
          <div class="col-sm-4">
            <input class="form-control" name="betreuer" value="<?php echo $log[4] ?>"></input>
          </div>
        </div>
        <br />
        <input name="log_id" value=" <?php echo $_GET['log_id'] ?>" type="hidden"></input>
        <input type="submit" value="Speichern" class="btn btn-success pull-right" />
        <br />
        <br />
        <br />
      </form>
    </div>
  </body>
</html>
