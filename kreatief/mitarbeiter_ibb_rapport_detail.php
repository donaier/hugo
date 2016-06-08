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
      <div class='hidden-print'>
        <br />
        <a href="./mitarbeiter_ibb.php?id=<?php echo $_GET['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
        <a href="javascript:window.print()" class='btn btn-default pull-right'><span class='glyphicon glyphicon-print'></span> Drucken</a>
        <hr />
      </div>

      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // mitarbeiter finden und anzeigen
        $ma = get_mitarbeiter($_GET['id']);

        // ibb rapport finden
        $ibb = get_one_ibb($_GET['ibb_id']);

        $medihash = unserialize($ibb['medis']);
        $ibb_total = $ibb['v1_1'] + $ibb['v1_2'] + $ibb['v1_3'] + $ibb['v2'] + $ibb['v3_1'] + $ibb['v3_2'] + $ibb['v3_3'] + $ibb['v3_4'] + $ibb['v3_5'] + $ibb['v3_6'] + $ibb['v4'] + $ibb['v5_1'] + $ibb['v5_2'] + $ibb['v5_3'] + $ibb['v5_3'];

        echo "<h3 class='text-center'>" . $ibb['title'] . "</h3>";
        echo "<h5 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h5>";
      ?>
      <hr />
      
      <table class="table table-bordered ibb-table">
        <tr>
          <td rowspan="3">1</td>
          <td rowspan="3" class="warning" style='text-align:center;vertical-align:middle;'><strong>Grundbetreuung, Grundpflege medizinische Behandlungspflege und Ernährung</strong></td>
          <td>1. Auseinandersetzung mit der Krankheit, Krankheitseinsicht und Kontrolle der Medikamenteneinnahme</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v1_1'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>2. Austausch, Reflektion, Koordination/Vernetzung und Begleitung miz Arzt, Therapeut, Psychiater, Arbeitgeber</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v1_2'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>3. Unterstützung, Förderung oder Begleitung Körperpflege</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v1_3'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td class='warning' style='text-align:center;vertical-align:middle;'><strong>Bekleidung und Mobilität</strong></td>
          <td>1. Unterstützung, Förderung oder Begleitung bei Arbeitsweg, Behördengängen</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v2'] ?></strong>
          </td>
        </tr>
        <tr>
          <td rowspan='6'>3</td>
          <td rowspan='6' class='warning' style='text-align:center;vertical-align:middle;'><strong>Lebenstechniken</strong></td>
          <td>1. Unterstützung: Einkaufen, Kochen, Wäschebesorgung, "Ämtli-Erledigung" sowie für Weiterbildung/Training</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v3_1'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>2. Unterstützung, Förderung oder Begleitung in Anforderungen des zusammenlebens in der Gruppe, Partnerschaft, mit Nachbarn, der Familie, bei der Arbeitsstelle und betrwffwnd die Integration im sozialen Umfeld</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v3_2'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>3. Individuelle Förderplanung und Begleitung in der Umsetzung</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v3_3'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>4. Aktivierung oder Begleitung in der Freizeitgestaltung</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v3_4'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>5. Unterstützung, Förderung oder Begleitung bei administrativen und finanziellen Aufgaben: Rente, EL, Kontoführungen, Rechnungen bezahlen, Budgetberatung, Schuldensanierung, Steuern</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v3_5'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>6. Unterstützung, Förderung, Begleitung und Auseinandersetzung im Umgang mit Rahmeneinhaltung und Struktur (Hausordnung, Regeln des Zusammenlebens)</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v3_6'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td class='warning' style='text-align:center;vertical-align:middle;'><strong>Sicherheit und Stabilität</strong></td>
          <td>1. Betreuungsaufwand in der Nacht: (Nachtwache: 4 Punkte, Nachtpikett: 2 Punkte, Bereitschaft: 1 Punkt)</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v4'] ?></strong>
          </td>
        </tr>
        <tr>
          <td rowspan='4'>5</td>
          <td rowspan='4' class='warning' style='text-align:center;vertical-align:middle;'><strong>Psychische Beeinträchtigungen, deviantes und Suchtverhalten</strong></td>
          <td>1. Unterstützung, Förderung oder Begleitung im Umgang / Prävention mit Sucht (substanzgebunden sowie Konsum, Ernährung, Medien</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v5_1'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>2. Betreuungsaufwand im Umgang mit Nähe und Distanz (anstössiges Verhalten, verbale und nonverbale Übergriffe</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v5_2'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>3. Betreuungsaufwand im Zusammenhang mit den Krankheitssymptomen oder deren Auswirkungen (Ängste, Zwänge, Selbst- und Fremdaggressionen, psychotisches oder schizophrenes Erleben</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v5_3'] ?></strong>
          </td>
        </tr>
        <tr>
          <td>4. Betreuungsaufwand im Umgang mit deviantem Sexualverhalten (Pädosexualität, Exhibitionismus, gewalttätige Sexualität)</td>
          <td class="info text-center">
            <strong><?php echo $ibb['v5_4'] ?></strong>
          </td>
        </tr>
        <tr>
          <td colspan='3' class='text-right'><strong>Total:</strong></td>
          <td class='success'><strong><?php echo $ibb_total ?></strong></td>
        </tr>
      </table>
        
      <div class="row">
        <div class='col-sm-12'>
          <h6>Kommentar:</h6>
          <?php echo $ibb['comment'] ?>
        </div>
      </div>
      <br />
      <br />
      <br />
    </div>
  </body>
</html>
