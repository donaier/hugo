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

  <?php
    include "functions.php";
    $dbhandle = database_connect();

    // mitarbeiter finden und anzeigen
    $ma = get_mitarbeiter($_GET['id']);

    $medi = mysqli_query($dbhandle, "SELECT * FROM ma_medis WHERE id=" . $_GET['medi_id']);
    $medi = mysqli_fetch_array($medi);
    
    $dbhandle->close();
  ?>

  <body>
    <div class="container">
      <br />
      <a href="./mitarbeiter_health.php?id=<?php echo $ma['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
      <hr />

      <?php echo "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h3>"; ?>
      <hr>
      <br>
      <h4 class="text-center">Medikament bearbeiten</h4>
      <br>
      <form action="./mitarbeiter_medi_update.php?id=<?php echo $ma['id'] ?>" method="POST" class="form-horizontal">
        <input type="hidden" name="id" value=<?php echo $medi['id'] ?> />
        <input type="hidden" name="ma_id" value=<?php echo $ma['id'] ?> />

        <div class="form-group">
          <label for="file" class="control-label col-sm-2">Medikament:</label>
          <div class="col-sm-10">
            <input name="medikament" class="form-control" value="<?php echo $medi['medikament'] ?>"></input>
          </div>
        </div>
        <div class="form-group">
          <label for="file" class="control-label col-sm-2">Zeitraum:</label>
          <div class="col-sm-10">
            <input name="zeitraum" class="form-control" value="<?php echo $medi['zeitraum'] ?>"></input>
          </div>
        </div>
        <div class="form-group">
          <label for="file" class="control-label col-sm-2">Kommentar:</label>
          <div class="col-sm-10">
            <textarea name="kommentar" class="form-control" rows="6"><?php echo $medi['kommentar'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="file" class="control-label col-sm-2">Status:</label>
          <div class="col-sm-10">
            <select name="status">
              <option value='active' <?php if ($medi['status'] === 'active') { echo "selected"; } ?>>Aktiv</option>
              <option value='inactive' <?php if ($medi['status'] === 'inactive') { echo "selected"; } ?>>Inaktiv</option>
            </select>
          </div>
        </div>

        <input type="submit" value="Speichern" class="btn btn-success pull-right" />
      </form>

    </div>
  </body>
</html>
