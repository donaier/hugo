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
      <a href=<?php echo "./mitarbeiter_ibb.php?id=" . $_GET['id'] ?> class='btn btn-info pull-right'><span class='glyphicon glyphicon-plus'></span>  Neue IBB Erfassung</a>
      <hr />

      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // mitarbeiter finden und anzeigen
        $query = "SELECT vorname, nachname FROM mitarbeiter WHERE id=" . $_GET['id'];
        $ma = mysqli_fetch_array(mysqli_query($dbhandle, $query));

        echo "<h3 class='text-center'>" . $ma[0] . " " . $ma[1] . "</h3>";

        if (isset($_GET['date'])) {
          echo "<h4 class='text-center'>Rapport vom " . date('d.m.Y', strtotime($_GET['date'])) . "</h4>";
        }

        // speichern ibb wenn post
        if( isset($_POST['creator']) && isset($_POST['ma_id']) ) {
          $fields = 'mitarbeiter_id, v1, v2, v3, v4, v5_1, v5_2, v5_3, v6_1, v6_2, v7_1, v7_2, created_at, creator';
          $values = [
                      "'" . $_POST['ma_id'] . "'",
                      "'" . $_POST['v1'] . "'",
                      "'" . $_POST['v2'] . "'",
                      "'" . $_POST['v3'] . "'",
                      "'" . $_POST['v4'] . "'",
                      "'" . $_POST['v5_1'] . "'",
                      "'" . $_POST['v5_2'] . "'",
                      "'" . $_POST['v5_3'] . "'",
                      "'" . $_POST['v6_1'] . "'",
                      "'" . $_POST['v6_2'] . "'",
                      "'" . $_POST['v7_1'] . "'",
                      "'" . $_POST['v7_2'] . "'",
                      "'" . $_POST['created_at'] . "'",
                      "'" . $_POST['creator'] . "'"
                    ];
          $post_query = "INSERT INTO ibb_values (" . $fields . ") VALUES (" . join(', ', $values) . ")";

          if ($dbhandle->query($post_query) === TRUE) {
            // worked
          } else {
            echo "Error: " . $post_query . "<br>" . $dbhandle->error;
          }
        }

        // ibb werte für mitarbeiter laden und anzeigen
        if (isset($_GET['date'])) {
          $ibb_query = "SELECT * FROM ibb_values WHERE mitarbeiter_id=" . $_GET['id'] . " AND created_at='" . $_GET['date'] . "'";
          $log_query = "SELECT * FROM ma_logs WHERE mitarbeiter_id=" . $_GET['id'] . " AND date='" . $_GET['date'] . "'";
        } else {
          $ibb_query = "SELECT * FROM ibb_values WHERE mitarbeiter_id=" . $_GET['id'] . " ORDER BY created_at ASC";
        }

        $ibb_data = mysqli_query($dbhandle, $ibb_query);
        $ibb_data_count = 0;

        $v1 = 0;
        $v2 = 0;
        $v3 = 0;
        $v4 = 0;
        $v5_1 = 0;
        $v5_2 = 0;
        $v5_3 = 0;
        $v6_1 = 0;
        $v6_2 = 0;
        $v7_1 = 0;
        $v7_2 = 0;

        while ($row = mysqli_fetch_array($ibb_data)) {
          $v1 = $v1 + $row[2];
          $v2 = $v2 + $row[3];
          $v3 = $v3 + $row[4];
          $v4 = $v4 + $row[5];
          $v5_1 = $v5_1 + $row[6];
          $v5_2 = $v5_2 + $row[7];
          $v5_3 = $v5_3 + $row[8];
          $v6_1 = $v6_1 + $row[9];
          $v6_2 = $v6_2 + $row[10];
          $v7_1 = $v7_1 + $row[11];
          $v7_2 = $v7_2 + $row[12];

          $ibb_data_count++;
        }

        if ($ibb_data_count > 0) {
          $v1 = $v1 / $ibb_data_count;
          $v2 = $v2 / $ibb_data_count;
          $v3 = $v3 / $ibb_data_count;
          $v4 = $v4 / $ibb_data_count;
          $v5_1 = $v5_1 / $ibb_data_count;
          $v5_2 = $v5_2 / $ibb_data_count;
          $v5_3 = $v5_3 / $ibb_data_count;
          $v6_1 = $v6_1 / $ibb_data_count;
          $v6_1 = $v6_2 / $ibb_data_count;
          $v7_1 = $v7_1 / $ibb_data_count;
          $v7_2 = $v7_2 / $ibb_data_count;
        }
      ?>
      <hr />
      <table class="table table-bordered">
        <tr>
          <td>1</td>
          <td colspan="2" class="warning"><strong>Anleitung</strong></td>
          <td>Aufwand für Anleitung (u.a. vorbereitendes Erklären und Vorzeigen der Arbeits- und Beschäftigungsabläufe, Unterstützung bei der Übernahme von Verantwortung und Selbstorganisation im Arbeitsprozess)</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v1,1); ?>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td colspan="2" class="warning"><strong>Einrichtung des Arbeits- und Beschäftigungsplatzes</strong></td>
          <td>Aufwand für das Einrichten des Arbeits- und Beschäftigungsplatzes mit entsprechenden Hilfsmitteln (u.a. Arbeitsvorbereitung und Platzgestaltung)</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v2,1); ?>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td colspan="2" class="warning"><strong>Unterstützung / Begleitung</strong></td>
          <td>Unterstützung, Befähigung und Begleitung bei der Ausführung von Tätigkeiten (u.a. Hilfe beim Prioritätensetzen, Arbeitsabläufe gestalten, Flexibilität und Selbständigkeit ermöglichen)</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v3,1); ?>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td colspan="2" class="warning"><strong>Feedback / Qualität</strong></td>
          <td>Aufwand für die Kontrolle und das Feedback zum Arbeits- und Beschäftigungsresultat</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v4,1); ?>
          </td>
        </tr>
        <tr>
          <td>5.1</td>
          <td rowspan="3" class="warning" style='text-align:center;vertical-align:middle'><strong>Stabilität / Sicherheit / Krisenmanagement</strong></td>
          <td class="warning">Sucht</td>
          <td>Unterstützung, Prävention oder Begleitung im Umgang mit Sucht (u.a. substanzgebunden sowie Konsum, Ernährung)</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v5_1,1); ?>
          </td>
        </tr>
        <tr>
          <td>5.2</td>
          <td class="warning">Nähe/Distanz</td>
          <td>Betreuungsaufwand im Umgang mit Nähe und Distanz (u.a. anstössiges Verhalten, verbale und nonverbale Übergriffe)</td>
          <td class="info"  style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v5_2,1); ?>
          </td>
        </tr>
        <tr>
          <td>5.3</td>
          <td class="warning">Krankheits-symptome</td>
          <td>Betreuungsaufwand im Umgang mit Krankheitssymptomen und deren Auswirkungen auf Arbeit und Beschäftigung</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v5_3,1); ?>
          </td>
        </tr>
        <tr>
          <td>6.1</td>
          <td rowspan="2" class="warning" style='text-align:center;vertical-align:middle'><strong>Pflege / Hygiene / Verpflegung</strong></td>
          <td class="warning">Körperpflege / Med. Pflege</td>
          <td>Betreuungsaufwand für die Körperpflege und adäquates Auftreten am Arbeitsplatz (u.a. Sauberkeit und angemessene Kleidung) sowie Betreuungsbedarf für medizinische Massnahmen im Bereich der Behandlungspflege während der Arbeit/Beschäftigung</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v6_1,1); ?>
          </td>
        </tr>
        <tr>
          <td>6.2</td>
          <td class="warning">Zwischen-mahlzeiten</td>
          <td>Teilhabe an Zwischenmahlzeiten (u.a. ernährungspädagogische Massnahmen, Verhalten beim Essen)</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v6_2,1); ?>
          </td>
        </tr>
        <tr>
          <td>7.1</td>
          <td rowspan="2" class="warning" style='text-align:center;vertical-align:middle'><strong>Arbeitsfähigkeit / Lebensbewältigung</strong></td>
          <td class="warning">Motivierung</td>
          <td>Betreuungsaufwand, um situativ Arbeits- und Handlungsfähigkeit wieder herzustellen (u.a. Gespräche, Strukturierungs- und Motivierungshilfen bei Leistungseinbrüchen)</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v7_1,1); ?>
          </td>
        </tr>
        <tr>
          <td>7.2</td>
          <td class="warning">externer Aus-tausch / Adm.</td>
          <td>Hilfestellungen zur Lebensbewältigung (u.a. Absprachen mit dem Wohnbereich, den Angehörigen, bzw. der gesetzlichen Vertretung, Beratung und Hilfe organisieren, Helfernetzwerk aktivieren, administrative Unterstützung)</td>
          <td class="info" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v7_2,1); ?>
          </td>
        </tr>
        <tr class="success">
          <td colspan="4">
            <?php if (!isset($_GET['date'])): ?>
              <span class="label label-default"><?php echo "Die Werte zeigen den Mittelwert aus $ibb_data_count Erfassungen." ?></span>
            <?php endif ?>
            <strong class="pull-right">Total:</strong>
            <br />
            <em class="pull-right">(max. 60)</em>
          </td>
          <td class="success" style='text-align:center;vertical-align:middle;width:5%;font-weight:bold;'>
            <?php echo round($v1+$v2+$v3+$v4+$v5_1+$v5_2+$v5_3+$v6_1+$v6_2+$v7_1+$v7_2,1); ?>
          </td>
        </tr>
      </table>
      <hr />
      <h4>IBB-Erfassungen:</h4>
      <?php
        $ibb_dates = "SELECT created_at, creator FROM ibb_values WHERE mitarbeiter_id=" . $_GET['id'] . " ORDER BY created_at ASC";
        $date_results = mysqli_query($dbhandle, $ibb_dates);

        echo "<a class='btn btn-default' href='./mitarbeiter_ibb_rapport.php?id=" . $_GET['id'] . "'><span class='glyphicon glyphicon-eye-open'></span></a>";
        echo "  Alle $ibb_data_count Erfassungen (Mittelwert)";
        echo "<br />";
        echo "<br />";
        while ($row = mysqli_fetch_array($date_results)) {
          echo "<a class='btn btn-default' href='./mitarbeiter_ibb_rapport.php?id=" . $_GET['id'] . "&date=" . $row[0] . "'><span class='glyphicon glyphicon-eye-open'></span></a>";
          echo "  IBB vom " . date('d.m.Y', strtotime($row[0])) . " erfasst von " . $row[1];
          echo "<br />";
        }

        // db verbindung schliessen
        $dbhandle->close();
      ?>
      <br />
      <br />
    </div>
  </body>
</html>