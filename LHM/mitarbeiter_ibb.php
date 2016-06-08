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
        $query = "SELECT vorname, nachname FROM mitarbeiter WHERE id=" . $_GET['id'];
        $ma = mysqli_fetch_array(mysqli_query($dbhandle, $query));

        echo "<h3 class='text-center'>" . $ma[0] . " " . $ma[1] . "</h3>";
      ?>
      <hr />

      <form action="./mitarbeiter_ibb_rapport.php?id=<?php echo $_GET['id'] ?>" method="POST" class="form-horizontal">
        <input type="hidden" name="ma_id" value=<?php echo $_GET['id'] ?>></input>
        <input type="hidden" name="created_at" class="form-control" value="<?php echo date('Y.m.d') ?>"></input>
        <br />
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-8 control-label">Ausgefüllt von:</label>
          <div class="col-sm-4">
            <input class="form-control" name="creator"></input>
          </div>
        </div>
        <table class="table table-bordered">
          <tr>
            <td>1</td>
            <td colspan="2" class="warning"><strong>Anleitung</strong></td>
            <td>Aufwand für Anleitung (u.a. vorbereitendes Erklären und Vorzeigen der Arbeits- und Beschäftigungsabläufe, Unterstützung bei der Übernahme von Verantwortung und Selbstorganisation im Arbeitsprozess)</td>
            <td class="info">
              <select name="v1">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td colspan="2" class="warning"><strong>Einrichtung des Arbeits- und Beschäftigungsplatzes</strong></td>
            <td>Aufwand für das Einrichten des Arbeits- und Beschäftigungsplatzes mit entsprechenden Hilfsmitteln (u.a. Arbeitsvorbereitung und Platzgestaltung)</td>
            <td class="info">
              <select name="v2">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td colspan="2" class="warning"><strong>Unterstützung / Begleitung</strong></td>
            <td>Unterstützung, Befähigung und Begleitung bei der Ausführung von Tätigkeiten (u.a. Hilfe beim Prioritätensetzen, Arbeitsabläufe gestalten, Flexibilität und Selbständigkeit ermöglichen)</td>
            <td class="info">
              <select name="v3">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td colspan="2" class="warning"><strong>Feedback / Qualität</strong></td>
            <td>Aufwand für die Kontrolle und das Feedback zum Arbeits- und Beschäftigungsresultat</td>
            <td class="info">
              <select name="v4">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>5.1</td>
            <td rowspan="3" class="warning" style='text-align:center;vertical-align:middle'><strong>Stabilität / Sicherheit / Krisenmanagement</strong></td>
            <td class="warning">Sucht</td>
            <td>Unterstützung, Prävention oder Begleitung im Umgang mit Sucht (u.a. substanzgebunden sowie Konsum, Ernährung)</td>
            <td class="info">
              <select name="v5_1">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>5.2</td>
            <td class="warning">Nähe/Distanz</td>
            <td>Betreuungsaufwand im Umgang mit Nähe und Distanz (u.a. anstössiges Verhalten, verbale und nonverbale Übergriffe)</td>
            <td class="info">
              <select name="v5_2">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>5.3</td>
            <td class="warning">Krankheits-symptome</td>
            <td>Betreuungsaufwand im Umgang mit Krankheitssymptomen und deren Auswirkungen auf Arbeit und Beschäftigung</td>
            <td class="info">
              <select name="v5_3">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>6.1</td>
            <td rowspan="2" class="warning" style='text-align:center;vertical-align:middle'><strong>Pflege / Hygiene / Verpflegung</strong></td>
            <td class="warning">Körperpflege / Med. Pflege</td>
            <td>Betreuungsaufwand für die Körperpflege und adäquates Auftreten am Arbeitsplatz (u.a. Sauberkeit und angemessene Kleidung) sowie Betreuungsbedarf für medizinische Massnahmen im Bereich der Behandlungspflege während der Arbeit/Beschäftigung</td>
            <td class="info">
              <select name="v6_1">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>6.2</td>
            <td class="warning">Zwischen-mahlzeiten</td>
            <td>Teilhabe an Zwischenmahlzeiten (u.a. ernährungspädagogische Massnahmen, Verhalten beim Essen)</td>
            <td class="info">
              <select name="v6_2">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>7.1</td>
            <td rowspan="2" class="warning" style='text-align:center;vertical-align:middle'><strong>Arbeitsfähigkeit / Lebensbewältigung</strong></td>
            <td class="warning">Motivierung</td>
            <td>Betreuungsaufwand, um situativ Arbeits- und Handlungsfähigkeit wieder herzustellen (u.a. Gespräche, Strukturierungs- und Motivierungshilfen bei Leistungseinbrüchen)</td>
            <td class="info">
              <select name="v7_1">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>7.2</td>
            <td class="warning">externer Aus-tausch / Adm.</td>
            <td>Hilfestellungen zur Lebensbewältigung (u.a. Absprachen mit dem Wohnbereich, den Angehörigen, bzw. der gesetzlichen Vertretung, Beratung und Hilfe organisieren, Helfernetzwerk aktivieren, administrative Unterstützung)</td>
            <td class="info">
              <select name="v7_2">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
        </table>
        <table class="table table-bordered table-striped text-center">
          <tr>
            <th style="width:20%;" class="text-center">selten</th>
            <th style="width:20%;" class="text-center">gelegentlich</th>
            <th style="width:20%;" class="text-center">regelmässig</th>
            <th style="width:20%;" class="text-center">oft</th>
            <th style="width:20%;" class="text-center">sehr oft</th>
          </tr>
          <tr>
            <td>ein- bis zweimal pro Monat</td>
            <td>einmal pro Woche</td>
            <td>2 - 3 mal pro Woche</td>
            <td>einmal täglich</td>
            <td>mehrmals täglich</td>
          </tr>
        </table>
        <br />
        <input type="submit" value="Speichern" class="btn btn-success pull-right" />
        <br />
        <br />
        <br />
      </form>

    </div>
  </body>
</html>