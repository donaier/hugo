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
      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // mitarbeiter finden und anzeigen
        $ma = get_mitarbeiter($_GET['id']);

        // log finden
        $log_query = "SELECT * FROM ma_logs WHERE mitarbeiter_id=" . $_GET['id'] . " AND id=" . $_GET['log_id'];
        $log = mysqli_fetch_array(mysqli_query($dbhandle, $log_query));
      ?>

      <br />
      <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
      <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>" class="btn btn-default pull-right"><span class="glyphicon glyphicon-list"></span> Logbuch</a>
      <hr />

      <?php echo "<h3 class='text-center'>Eintrag Bearbeiten</h3>"; ?>
      <?php echo "<h4 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h4>"; ?>


      <hr />
      <form action="./mitarbeiter_log_update.php?id=<?php echo $_GET['id'] ?>" method="POST" class="form-horizontal">
        <input name="log_id" value="<?php echo $_GET['log_id'] ?>" hidden></input>
        <div class="form-group">
          <label for="kategorie" class="col-sm-2 control-label">Kategorien:</label>
          <div class="col-sm-10">
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="allgemein" value="allgemein" <?php if(strpos($log['category'], 'allgemein') !== false) { echo 'checked'; } ?>><span class='label label-default'><span class="glyphicon glyphicon-user"></span> Allgemein</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="gesundheit" value="gesundheit" <?php if(strpos($log['category'], 'gesundheit') !== false) { echo 'checked'; } ?>><span class='label label-danger'><span class="glyphicon glyphicon-heart"></span> Gesundheit</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="arbeit" value="arbeit" <?php if(strpos($log['category'], 'arbeit') !== false) { echo 'checked'; } ?>><span class='label label-primary'><span class="glyphicon glyphicon-briefcase"></span> Arbeit/IB</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="foerderplanung" value="foerderplanung" <?php if(strpos($log['category'], 'foerderplanung') !== false) { echo 'checked'; } ?>><span class='label label-success'><span class="glyphicon glyphicon-flag"></span> Förderplanung</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="psychisch" value="psychisch" <?php if(strpos($log['category'], 'psychisch') !== false) { echo 'checked'; } ?>><span class='label label-info'><span class="glyphicon glyphicon-adjust"></span> psychische Befindlichkeit</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="vernetzung" value="vernetzung" <?php if(strpos($log['category'], 'vernetzung') !== false) { echo 'checked'; } ?>><span class='label label-warning'><span class="glyphicon glyphicon-transfer"></span> Vernetzungsarbeit</span>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="kategorie" class="col-sm-2 control-label">Datum:</label>
          <div class="col-sm-10">

            <select name="day">
              <?php 
                for ($d=1; $d <= 31; $d++) {
                  if ($d == date('j', strtotime($log['date']))) {
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
                  if ($m == date('n', strtotime($log['date']))) {
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
                  if ($y == date('o', strtotime($log['date']))) {
                    echo "<option selected value='$y'>$y</option>";
                  } else {
                    echo "<option value='$y'>$y</option>";
                  }
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="betreuer" class="col-sm-2 control-label">Ausgefüllt von:</label>
          <div class="col-sm-4">
            <input class="form-control" name="betreuer" value="<?php echo $log['creator'] ?>"></input>
          </div>
        </div>
        <div class="form-group">
          <label for="log" class="col-sm-2 control-label">Log:</label>
          <div class="col-sm-10">
            <textarea name="log" class="form-control" rows="10"><?php echo $log['log'] ?></textarea>
          </div>
        </div>
        <input type="submit" value="Speichern" class="btn btn-success pull-right" />
        <br />
        <br />
        <br />
      </form>
    </div>
  </body>
</html>
