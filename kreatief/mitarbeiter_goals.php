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
    <?php
      include "functions.php";
      $dbhandle = database_connect();
      $ma = get_mitarbeiter($_GET['id']);
    ?>

    <div class="container">
      <div class="hidden-print">
        <br />
        <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
        <div class="btn-toolbar pull-right">
          <a href="./mitarbeiter_goals_new.php?id=<?php echo $ma['id'] ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> neuer Eintrag</a>
        </div>
        <hr />
      </div>

      <?php echo "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h3>"; ?>
      <h5 class='text-center'>Ziele / Förderplanung</h5>
      <hr />

      <?php 
        // neues Ziel speichern (wenn post)

        if (isset($_POST['ma_id']) && isset($_POST['title'])) {
          $title = $_POST['title'];
          $start_date = $_POST['syear'] . '-' . $_POST['smonth'] . '-' . $_POST['sday'];
          $description = mysql_real_escape_string($_POST['description']);
          $comments = $_POST['comments'];

          $fields = 'mitarbeiter_id, title, description, comments, start_date, status, v1, v2, v3, v4, v5, v6, v7, v8, v9, v10, v11, v12';
          $values = [
                      "'" . $_GET['id'] . "'",
                      "'" . $title . "'",
                      "'" . $description . "'",
                      "'" . $comments . "'",
                      "'" . $start_date . "'",
                      "'open'",
                      "'" . mysql_real_escape_string($_POST['1']) . "'",
                      "'" . mysql_real_escape_string($_POST['2']) . "'",
                      "'" . mysql_real_escape_string($_POST['3']) . "'",
                      "'" . mysql_real_escape_string($_POST['4']) . "'",
                      "'" . mysql_real_escape_string($_POST['5']) . "'",
                      "'" . mysql_real_escape_string($_POST['6']) . "'",
                      "'" . mysql_real_escape_string($_POST['7']) . "'",
                      "'" . mysql_real_escape_string($_POST['8']) . "'",
                      "'" . mysql_real_escape_string($_POST['9']) . "'",
                      "'" . mysql_real_escape_string($_POST['10']) . "'",
                      "'" . mysql_real_escape_string($_POST['11']) . "'",
                      "'" . mysql_real_escape_string($_POST['12']) . "'"
                    ];

          $post_query = "INSERT INTO ma_goals (" . $fields . ") VALUES (" . join(', ', $values) . ")";

          if ($dbhandle->query($post_query) === TRUE) {
            // worked
          } else {
            echo "Error: " . $post_query . "<br>" . $dbhandle->error;
          }
        }
      ?>

      </br>
      <h2 class='small'>Aktive Zielsetzungen</h2>
      <table class='table table-hover'>
        <?php
          // ziele anzeigen
          $goals = get_mitarbeiter_goals($ma['id'], 'open');

          while ($goal = mysqli_fetch_array($goals)) {
            echo "<tr>";
            echo "<td><h5><strong>" . $goal['title'] . "</strong></h5>Gestartet: " . date('d.m.Y', strtotime($goal['start_date'])) . "</td>";
            echo "<td><div class='btn-group pull-right'>";
            echo "<a title='Details' href='./mitarbeiter_goals_detail.php?id=" . $ma{'id'} . "&goal_id=" . $goal['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a>";
            echo "<a title='Bearbeiten' href='./mitarbeiter_goals_edit.php?id=" . $ma{'id'} . "&goal_id=" . $goal['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></a>";
            echo "</td></div>";
            echo "</tr>";
          }
        ?>
      </table>

      </br>
      </br>
      <h2 class='small'>Archivierte Zielsetzungen</h2>
      <table class='table table-hover'>
        <?php
          // ziele anzeigen
          $goals = get_mitarbeiter_goals($ma['id'], 'closed');

          while ($goal = mysqli_fetch_array($goals)) {
            echo "<tr>";
            echo "<td><h5><strong>" . $goal['title'] . "</strong></h5></td>";
            echo "<td><div class='btn-group pull-right'>";
            echo "<a title='Details' href='./mitarbeiter_goals_detail.php?id=" . $ma{'id'} . "&goal_id=" . $goal['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a>";
            echo "<a title='Bearbeiten' href='./mitarbeiter_goals_edit.php?id=" . $ma{'id'} . "&goal_id=" . $goal['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></a>";
            echo "</td></div>";
            echo "</tr>";
          }
        ?>
      </table>
      
    </div>
  </body>
</html>
