<!DOCTYPE html>
<html>
  <head>
    <title>LHM Mitarbeiter</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Mitarbeiter Linthofmarkt</h1>
      <h2 class="small text-center">Betreute Mitarbeiter der Tagesstruktur des Linthofmarkts</h2>
      <br />
      <br />

      <?php
        include "functions.php";
        $mitarbeiter_array = get_active_mitarbeiter();
  
        echo "<table class='table'>";
	echo "<h5>Aktive Mitarbeiter</h5>";

        while ($row = mysqli_fetch_array($mitarbeiter_array)) {
          $latest_ibb_date = get_latest_ibb_date($row['id']);
          $latest_log_date = get_latest_log_date($row['id']);
          echo "<tr>";

          echo "<td><h4><strong>" . $row['vorname'] . "</strong></h4></td>";
          echo "<td><h4>" . $row['nachname'] . "</h4></td>";
          echo "<td class='text-right'>letzte IBB-Erfassung: ";
          echo "<br />";
          echo "letzter Eintrag im Logbuch:";
          echo "</td>";

          echo "<td>";
          if (time() - $latest_ibb_date > 60*60*24*15) {
            echo "<span class='label label-danger'>" . date('d.m.Y', $latest_ibb_date) . "</span>";
          } elseif (time() - $latest_ibb_date > 60*60*24*5) {
            echo "<span class='label label-warning'>" . date('d.m.Y', $latest_ibb_date) . "</span>";
          } else {
            echo "<span class='label label-success'>" . date('d.m.Y', $latest_ibb_date) . "</span>";
          }
          echo "<br />";
          if (time() - $latest_log_date > 60*60*24*6) {
            echo "<span class='label label-danger'>" . date('d.m.Y', $latest_log_date) . "</span>";
          } elseif (time() - $latest_log_date > 60*60*24*2.5) {
            echo "<span class='label label-warning'>" . date('d.m.Y', $latest_log_date) . "</span>";
          } else {
            echo "<span class='label label-success'>" . date('d.m.Y', $latest_log_date) . "</span>";
          }
          echo "</td>";

          echo "<td>";
          echo "<div class='btn-toolbar pull-right'>";
          echo "<a href='./mitarbeiter_detail.php?id=" . $row['id'] . "' class='btn btn-primary'>Logbuch</a>";
          echo "<a href='./mitarbeiter_goals.php?id=" . $row['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-flag'></span> Ziele</a>";
          echo "<a href='./mitarbeiter_health.php?id=" . $row['id'] . "' class='btn btn-default'><span class='glyphicon glyphicon-heart-empty'></span> Health</a>";
          echo "<div class='btn-group'>";
          echo "<a href='./mitarbeiter_ibb_rapport.php?id=" . $row['id'] . "' class='btn btn-primary'>IBB</a>";
          echo "<a href='./mitarbeiter_ibb.php?id=" . $row['id'] . "' class='btn btn-info'><span class='glyphicon glyphicon-plus'></span></a>";
          echo "</div>";
	  echo "<a href='./mitarbeiter_switch_status.php?id=" . $row{'id'} . "&action=deactivate' class='btn btn-default' title='Deaktivieren''><span class='glyphicon glyphicon-paste'></span></a>";
          echo "</div>";

          echo "</td>";
          echo "</tr>";
        }
	echo "<tr><td colspan=5><a href='./mitarbeiter_new.php' class='btn btn-success pull-right'><span class='glyphicon glyphicon-plus'></span>  neuer Mitarbeiter</a></td></tr>";
        echo "</table>";

	// inaktive mitarbeiter
        $mitarbeiter_array = get_inactive_mitarbeiter();
  
        echo "<table class='table'>";
        echo "<h5>Inaktive Mitarbeiter</h5>";

        while ($row = mysqli_fetch_array($mitarbeiter_array)) {

          echo "<tr>";
          echo "<td><h4><strong>" . $row{'vorname'} . "</strong></h4></td>";
          echo "<td><h4>" . $row{'nachname'} . "</h4></td>";

          echo "<td>";
          echo "<div class='btn-group pull-right'>";
          echo "<a href='./mitarbeiter_switch_status.php?id=" . $row{'id'} . "&action=activate'class='btn btn-default'><span class='glyphicon glyphicon-copy'></span> Aktivieren</a>";
          echo "<a href='./mitarbeiter_detail.php?id=" . $row{'id'} . "' class='btn btn-default'>Logbuch</a>";
          echo "<a href='./mitarbeiter_ibb_rapport.php?id=" . $row{'id'} . "' class='btn btn-default'>IBB Rapport</a>";
          echo "</div>";

          echo "</td>";
          echo "</tr>";
        }
        echo "</table>";

      ?>

      <a href="./mitarbeiter_new.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span>  neuer Mitarbeiter</a>
    </div>
  </body>
</html>
