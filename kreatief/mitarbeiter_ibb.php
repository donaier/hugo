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
      <a href="./mitarbeiter_ibb_rapport_new.php?id=<?php echo $_GET['id'] ?>" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Neuer Rapport</a>
      <hr />

      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // mitarbeiter finden und anzeigen
        $ma = get_mitarbeiter($_GET['id']);

        echo "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h3>";
        
        // ibb rapport speichern wenn POST - neu

        if (isset($_POST['mitarbeiter_id']) && isset($_POST['title'])) {

          $title = mysql_real_escape_string($_POST['title']);
          $medis = crunch_medi_data();
          $comment = mysql_real_escape_string($_POST['comment']);
          $creator = mysql_real_escape_string($_POST['creator']);
          $status = "active";

          $fields = 'mitarbeiter_id, created_at, title, medis, comment, v1_1, v1_2, v1_3, v2, v3_1, v3_2, v3_3, v3_4, v3_5, v3_6, v4, v5_1, v5_2, v5_3, v5_4, creator, status';
          $values = [
                      "'" . $_POST['mitarbeiter_id'] . "'",
                      "'" . $_POST['created_at'] . "'",
                      "'" . $title . "'",
                      "'" . $medis . "'",
                      "'" . $comment . "'",
                      "'" . $_POST['v1_1'] . "'",
                      "'" . $_POST['v1_2'] . "'",
                      "'" . $_POST['v1_3'] . "'",
                      "'" . $_POST['v2'] . "'",
                      "'" . $_POST['v3_1'] . "'",
                      "'" . $_POST['v3_2'] . "'",
                      "'" . $_POST['v3_3'] . "'",
                      "'" . $_POST['v3_4'] . "'",
                      "'" . $_POST['v3_5'] . "'",
                      "'" . $_POST['v3_6'] . "'",
                      "'" . $_POST['v4'] . "'",
                      "'" . $_POST['v5_1'] . "'",
                      "'" . $_POST['v5_2'] . "'",
                      "'" . $_POST['v5_3'] . "'",
                      "'" . $_POST['v5_4'] . "'",
                      "'" . $creator . "'",
                      "'" . $status . "'"
                    ];

          if (isset($_POST['id'])) {
            $post_query = "UPDATE ma_ibb SET " .
                           "mitarbeiter_id = '" . $_POST['mitarbeiter_id'] . 
                           "', created_at = '" . $_POST['created_at'] . 
                           "', title = '" . $title . 
                           "', medis = '" . $medis . 
                           "', comment = '" . $comment . 
                           "', v1_1 = '" . $_POST['v1_1'] . 
                           "', v1_2 = '" . $_POST['v1_2'] . 
                           "', v1_3 = '" . $_POST['v1_3'] . 
                           "', v2 = '" . $_POST['v2'] . 
                           "', v3_1 = '" . $_POST['v3_1'] . 
                           "', v3_2 = '" . $_POST['v3_2'] . 
                           "', v3_3 = '" . $_POST['v3_3'] . 
                           "', v3_4 = '" . $_POST['v3_4'] . 
                           "', v3_5 = '" . $_POST['v3_5'] . 
                           "', v3_6 = '" . $_POST['v3_6'] . 
                           "', v4 = '" . $_POST['v4'] . 
                           "', v5_1 = '" . $_POST['v5_1'] . 
                           "', v5_2 = '" . $_POST['v5_2'] . 
                           "', v5_3 = '" . $_POST['v5_3'] . 
                           "', v5_4 = '" . $_POST['v5_4'] . 
                           "', creator = '" . $creator . 
                           "', status = '" . $status . 
                           "' WHERE `ma_ibb`.`id` = " . $_POST['id'] . "";
          } else {
            $post_query = "INSERT INTO ma_ibb (" . $fields . ") VALUES (" . join(', ', $values) . ")";
          }

          if ($dbhandle->query($post_query) === TRUE) {
            // worked
          } else {
            echo "Error: " . $post_query . "<br>" . $dbhandle->error;
          }
        }

        // aktive rapporte hohlen
        $active_ibb_array = get_ibb($ma['id']);

        // ältere rapporte hohlen
        $older_ibb_array = get_ibb($ma['id'], 'closed');

        $dbhandle->close();
      ?>

      <hr />
      <br />
      <h2 class='small'>Aktiver IBB Rapport</h2>
      <table class='table'>
        <?php 
          while ($ibb = mysqli_fetch_array($active_ibb_array)) {
            echo "<tr class='active'>";
            echo "<td><h5><strong>" . $ibb['title'] . "</strong></h5></td>";
            echo "<td><div class='btn-group pull-right'>";
            echo "<a href='./mitarbeiter_ibb_rapport_detail.php?id=" . $ma['id'] . "&ibb_id=" . $ibb['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a>";
            echo "<a href='./mitarbeiter_ibb_rapport.php?id=" . $ma['id'] . "&ibb_id=" . $ibb['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></a>";
            echo "</td></div>";
          }
        ?>
      </table>

      <br />
      <h2 class='small'>Geschlossene IBB Rapporte</h2>
      <table class='table table-hover'>
        <?php 
          while ($ibb = mysqli_fetch_array($older_ibb_array)) {
            echo "<tr class='active'>";
            echo "<td><h5><strong>" . $ibb['title'] . "</strong></h5></td>";
            echo "<td><div class='btn-group pull-right'>";
            echo "<a href='./mitarbeiter_ibb_rapport_detail.php?id=" . $ma['id'] . "&ibb_id=" . $ibb['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a>";
            echo "<a href='./mitarbeiter_ibb_rapport.php?id=" . $ma['id'] . "&ibb_id=" . $ibb['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></a>";
            echo "</td></div>";
          }
        ?>
      </table>

    </div>
  </body>
</html>
