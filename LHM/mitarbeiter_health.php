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
        $ma = get_mitarbeiter($_GET['id']);
        $uploaddir = './mitarbeiter_files/' . $ma['vorname'] . $ma['nachname'] . '/';

        if (!file_exists($uploaddir)) {
          mkdir($uploaddir, 0777, true);
        }

        echo "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['nachname'] . "</h3>";

        // file speichern
        if (isset($_POST['MAX_FILE_SIZE'])) {
          $uploadfile = $uploaddir . basename($_FILES['file']['name']);

          if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            // nice
          } else {
            echo "Upload failed";
            print_r($_FILES);
          }
        }

        // medi speichern
        if (isset($_POST['medikament'])) {
          $fields = 'ma_id, medikament, zeitraum, kommentar, status';
          $values = [
                      "'" . $_POST['ma_id'] . "'",
                      "'" . $_POST['medikament'] . "'",
                      "'" . $_POST['zeitraum'] . "'",
                      "'" . mysql_real_escape_string($_POST['kommentar']) . "'",
                      "'" . $_POST['status'] . "'"
                    ];

          $post_query = "INSERT INTO ma_medis (" . $fields . ") VALUES (" . join(', ', $values) . ")";

          if ($dbhandle->query($post_query) === TRUE) {
            // worked
          } else {
            echo "Error: " . $post_query . "<br>" . $dbhandle->error;
          }
        }

        // allergie / diagnose speichern
        if (isset($_POST['allergie'])) {
          $post_query = "UPDATE mitarbeiter SET allergie = '" . $_POST['allergie'] . "' WHERE `mitarbeiter`.`id` = " . $ma['id'] . "";

          if ($dbhandle->query($post_query) === TRUE) {
            // nice
            $ma = get_mitarbeiter($_GET['id']);
          } else {
            echo "Error: " . $post_query . "<br>" . $dbhandle->error;
          }
        }
        if (isset($_POST['diagnose'])) {
          $post_query = "UPDATE mitarbeiter SET diagnose = '" . $_POST['diagnose'] . "' WHERE `mitarbeiter`.`id` = " . $ma['id'] . "";

          if ($dbhandle->query($post_query) === TRUE) {
            // nice
            $ma = get_mitarbeiter($_GET['id']);
          } else {
            echo "Error: " . $post_query . "<br>" . $dbhandle->error;
          }
        }

        // files laden
        $folders = array('..', '.');
        $files = array_diff(scandir($uploaddir), $folders);

        // medis laden
        $medis = get_medis($ma['id']);

        $dbhandle->close();
      ?>

      <hr />
      <br />
      <h4>Medikamente</h4>
      <table class="table table-bordered table-condensed">
        <tr>
          <th colspan="5">
            Medikamente:
            <a href="./mitarbeiter_medi_new.php?id=<?php echo $ma['id'] ?>" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Neues Medikament</a>
          </th>
        </tr>
        <tr>
          <th>Bezeichnung</th>
          <th>Zeitraum</th>
          <th>Kommentar</th>
          <th>Aktiv?</th>
          <th></th>
        </tr>
        <?php 
          foreach ($medis as $medi) {
            echo "<tr>";
            echo "<td>";
            echo $medi['medikament'];
            echo "</td>";
            echo "<td>";
            echo $medi['zeitraum'];
            echo "</td>";
            echo "<td>";
            echo $medi['kommentar'];
            echo "</td>";
            echo "<td>";
            if ($medi['status'] === 'active') {
              echo "<label class='label label-success'><span class='glyphicon glyphicon-ok'></span></label>";
            }
            if ($medi['status'] === 'inactive') {
              echo "<label class='label label-danger'><span class='glyphicon glyphicon-remove'></span></label>";
            }
            echo "</td>";
            echo "<td><a href='mitarbeiter_medi_edit.php?id=" . $ma['id'] . "&medi_id=" . $medi['id'] . "' class='button button-primary'><i class='glyphicon glyphicon-pencil'></i></a></td>";
            echo "</tr>";
          }
        ?>
      </table>
      <hr />
      <h4>Impfungen / Allergien</h4>
      <form action="./mitarbeiter_health.php?id=<?php echo $ma['id'] ?>" method="POST" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <textarea name="allergie" class="form-control" rows="6"><?php echo $ma['allergie'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="submit" value="Speichern" class="btn btn-success pull-right"></input>
          </div>
        </div>
      </form>
      <hr />
      
      <h4>Patientenverfügung / Dokumente</h4>
      <table class="table table-bordered table-condensed">
        <tr>
          <th>
            Files:
            <a href="./mitarbeiter_doc_new.php?id=<?php echo $ma['id'] ?>" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Neues Dokument</a>
          </th>
        </tr>
        <?php 
          foreach ($files as $file) {
            echo "<tr>";
            echo "<td>";
            echo $file;
            echo "<a href='" . $uploaddir . $file . "' class='btn btn-default btn-sm pull-right' target='_blank'><span class='glyphicon glyphicon-eye-open'></span></a>";
            echo "</td>";
            echo "</tr>";
          }
        ?>
      </table>
      <p class="text-muted">(Die Files liegen hier: <?php echo realpath($uploaddir) ?> - da kann gelöscht werden. <br>Files müssen nicht hochgeladen werden, sondern können auch direkt in den Ordner kopiert werden.)</p>
      <hr />
      <hr />
      <h4>Diagnose</h4>
      <form action="./mitarbeiter_health.php?id=<?php echo $ma['id'] ?>" method="POST" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <textarea name="diagnose" class="form-control" rows="6"><?php echo $ma['diagnose'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="submit" value="Speichern" class="btn btn-success pull-right"></input>
          </div>
        </div>
      </form>
    </div>
    <br>
    <br>
  </body>
</html>
