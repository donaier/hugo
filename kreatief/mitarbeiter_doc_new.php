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
      <h4 class="text-center">Neue Datei</h4>
      <br>
      <form action="./mitarbeiter_health.php?id=<?php echo $ma['id'] ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="MAX_FILE_SIZE" value="512000" />

        <div class="form-group">
          <label for="file" class="control-label col-sm-3">Datei:</label>
          <div class="col-sm-9">
            <input name="file" class="form-control" type="file"></input>
          </div>
        </div>

        <input type="submit" value="Speichern" class="btn btn-success pull-right" />
      </form>

    </div>
  </body>
</html>
