<!DOCTYPE html>
<html>
  <head>
    <title>LHM Mitarbeiter</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/nicEdit.js"></script>
    <script type="text/javascript">
      //<![CDATA[
      bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
      //]]>
    </script>
  </head>

  <body>
    <?php
      include "functions.php";
      $dbhandle = database_connect();
      $ma = get_mitarbeiter($_GET['id']);
    ?>

    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
      <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>" class="btn btn-default pull-right"><span class="glyphicon glyphicon-list"></span> Logbuch</a>
      <hr />

      <?php echo "<h3 class='text-center'>Neuer Eintrag</h3>"; ?>
      <?php echo "<h4 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h4>"; ?>

      <hr />
      <form action="./mitarbeiter_log.php?id=<?php echo $_GET['id'] ?>" method="POST" class="form-horizontal">
        <div class="form-group">
          <label for="kategorie" class="col-sm-2 control-label">Kategorien:</label>
          <div class="col-sm-10">
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="allgemein" value="allgemein" checked><span class='label label-default'><span class="glyphicon glyphicon-user"></span> Allgemein</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="gesundheit" value="gesundheit"><span class='label label-danger'><span class="glyphicon glyphicon-heart"></span> Gesundheit</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="arbeit" value="arbeit"><span class='label label-primary'><span class="glyphicon glyphicon-briefcase"></span> Arbeit/IB</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="foerderplanung" value="foerderplanung"><span class='label label-success'><span class="glyphicon glyphicon-flag"></span> Förderplanung</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="psychisch" value="psychisch"><span class='label label-info'><span class="glyphicon glyphicon-adjust"></span> psychische Befindlichkeit</span>
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kategorie[]" id="vernetzung" value="vernetzung"><span class='label label-warning'><span class="glyphicon glyphicon-transfer"></span> Vernetzungsarbeit</span>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Datum:</label>
          <div class="col-sm-10">

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
          </div>
        </div>
        <div class="form-group">
          <label for="betreuer" class="col-sm-2 control-label">Ausgefüllt von:</label>
          <div class="col-sm-4">
            <input class="form-control" name="betreuer"></input>
          </div>
        </div>
        <div class="form-group">
          <label for="log" class="col-sm-2 control-label">Log:</label>
          <div class="col-sm-10">
            <textarea name="log" class="form-control" rows="10"></textarea>
          </div>
        </div>
        <input type="submit" value="Speichern" class="btn btn-success pull-right" />
        <br />
        <br />
        <br />
      </form>
      <hr />
    </div>
  </body>
</html>
