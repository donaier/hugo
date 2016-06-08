<!DOCTYPE html>
<html>
  <head>
    <title>LHM Mitarbeiter</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <br />
      <a class="btn btn-default disabled"><span class="glyphicon glyphicon-home"></span></a>
      <div class="btn-group pull-right">
        <a href="./mitarbeiter_new.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  neuer Mitarbeiter</a>
      </div>
      <a href="./info.php" class="btn btn-default"><span class="glyphicon glyphicon-info-sign"></span></a>
      <hr />
      <img src="./images/logo.gif" class='img-responsive center-block'>
      <br />
      <br />

      <?php
        include "functions.php";

        echo "<h2 class='small'>Bewohner Kreatief</h2>";
  
        $mitarbeiter_array = get_mitarbeiter();
        echo "<table class='table table-hover'>";
        while ($ma = mysqli_fetch_array($mitarbeiter_array)) {
          if ($ma['status'] == 'active') {
            echo "<tr>";
            echo "<td><h4><strong>" . $ma{'vorname'} . "</strong></h4></td>";
            echo "<td><h4>" . $ma{'name'} . "</h4></td>";
            echo "<td>";
            echo "<div class='btn-toolbar pull-right'>";
            echo "<div class='btn-group'>";
            echo "<a title='Details' href='./mitarbeiter_detail.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a>";
            echo "<a title='Bearbeiten' href='./mitarbeiter_edit.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></a>";
            echo "</div><div class='btn-group'>";
            echo "<a title='Logbuch' href='./mitarbeiter_log.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-list'></span></a>";
            echo "<a title='neuer Logeintrag' href='./mitarbeiter_log_new.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-plus'></span></a>";
            echo "</div><div class='btn-group'>";
            echo "<a title='Ziele / Förderplanung' href='./mitarbeiter_goals.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-flag'></span></a>";
            echo "</div><div class='btn-group'>";
            echo "<a title='IBB Erfassung' href='./mitarbeiter_ibb.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-file'></span></a>";
            echo "</div><div class='btn-group'>";
            echo "<a title='Medizinisches' href='./mitarbeiter_health.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-heart-empty'></span></a>";
            echo "&nbsp;</div>";
            echo "</td>";
            echo "</tr>";
          }
        }
        echo "</table>";
        echo "<br />";
        echo "<br />";
        echo "<br />";

        echo "<h2 class='small'>Ehemalige/Inaktive Bewohner</h2>";

        $mitarbeiter_array = get_mitarbeiter();
        echo "<table class='table text-muted'>";
        while ($ma = mysqli_fetch_array($mitarbeiter_array)) {
          if ($ma['status'] == 'inactive') {
            echo "<tr>";
            echo "<td><h4><strong>" . $ma{'vorname'} . "</strong></h4></td>";
            echo "<td><h4>" . $ma{'name'} . "</h4></td>";
            echo "<td>";
            echo "<div class='btn-toolbar pull-right'>";
            echo "<div class='btn-group'>";
            echo "<a href='./mitarbeiter_switch_status.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-copy'></span> Aktivieren</a>";
            echo "</div><div class='btn-group'>";
            echo "<a href='./mitarbeiter_detail.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a>";
            echo "</div><div class='btn-group'>";
            echo "<a href='./mitarbeiter_log.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-list'></span></a>";
            echo "</div><div class='btn-group'>";
            echo "<a title='Ziele / Förderplanung' href='./mitarbeiter_goals.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-flag'></span></a>";
            echo "</div><div class='btn-group'>";
            echo "<a title='IBB Erfassung' href='./mitarbeiter_ibb.php?id=" . $ma{'id'} . "' class='btn btn-default'><span class='glyphicon glyphicon-file'></span></a>";
            echo "</div></div>";
            echo "</td>";
            echo "</tr>";
          }
        }
        echo "</table>";
      ?>

      <br />
      <br />
      <br />
    </div>
  </body>
</html>
