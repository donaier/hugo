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
      <a href="./mitarbeiter_ibb.php?id=<?php echo $_GET['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
      <hr />

      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // mitarbeiter finden und anzeigen
        $ma = get_mitarbeiter($_GET['id']);

        // ibb rapport finden
        $ibb = get_one_ibb($_GET['ibb_id']);

        $medihash = unserialize($ibb['medis']);

        echo "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h3>";
      ?>
      <hr />

      <form action="./mitarbeiter_ibb.php?id=<?php echo $ma['id'] ?>" method="POST" class="form-horizontal">
        <input type="hidden" name="id" value=<?php echo $ibb['id'] ?>></input>
        <input type="hidden" name="mitarbeiter_id" value=<?php echo $ma['id'] ?>></input>
        <input type="hidden" name="created_at" class="form-control" value="<?php echo $ibb['created_at'] ?>"></input>
        <br />
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Titel / Bezeichnung:</label>
          <div class="col-sm-10">
            <input class="form-control" name="title" value='<?php echo $ibb['title'] ?>'></input>
          </div>
        </div>
        <br />
        <div class='form-group'>
          <label class='col-sm-2 control-label'>Medikamente:</label>
          <div class='col-sm-10'>
            <table class='table table-condensed table-striped table-bordered text-center'>
              <tr>
                <td></td>
                <th>Mo</th>
                <th>Di</th>
                <th>Mi</th>
                <th>Do</th>
                <th>Fr</th>
                <th>Sa</th>
                <th>So</th>
              </tr>
              <tr>
                <th>Morgen</th>
                <td><input type='checkbox' name='mo_mo' <?php if ($medihash['mo_mo']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='di_mo' <?php if ($medihash['di_mo']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='mi_mo' <?php if ($medihash['mi_mo']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='do_mo' <?php if ($medihash['do_mo']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='fr_mo' <?php if ($medihash['fr_mo']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='sa_mo' <?php if ($medihash['sa_mo']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='so_mo' <?php if ($medihash['so_mo']) { echo 'checked'; } ?>></input></td>
              </tr>
              <tr>
                <th>Mittag</th>
                <td><input type='checkbox' name='mo_mi' <?php if ($medihash['mo_mi']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='di_mi' <?php if ($medihash['di_mi']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='mi_mi' <?php if ($medihash['mi_mi']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='do_mi' <?php if ($medihash['do_mi']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='fr_mi' <?php if ($medihash['fr_mi']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='sa_mi' <?php if ($medihash['sa_mi']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='so_mi' <?php if ($medihash['so_mi']) { echo 'checked'; } ?>></input></td>
              </tr>
              <tr>
                <th>Abend</th>
                <td><input type='checkbox' name='mo_ab' <?php if ($medihash['mo_ab']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='di_ab' <?php if ($medihash['di_ab']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='mi_ab' <?php if ($medihash['mi_ab']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='do_ab' <?php if ($medihash['do_ab']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='fr_ab' <?php if ($medihash['fr_ab']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='sa_ab' <?php if ($medihash['sa_ab']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='so_ab' <?php if ($medihash['so_ab']) { echo 'checked'; } ?>></input></td>
              </tr>
              <tr>
                <th>Nacht</th>
                <td><input type='checkbox' name='mo_na' <?php if ($medihash['mo_na']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='di_na' <?php if ($medihash['di_na']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='mi_na' <?php if ($medihash['mi_na']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='do_na' <?php if ($medihash['do_na']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='fr_na' <?php if ($medihash['fr_na']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='sa_na' <?php if ($medihash['sa_na']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='so_na' <?php if ($medihash['so_na']) { echo 'checked'; } ?>></input></td>
              </tr>
              <tr>
                <th>Reserve</th>
                <td><input type='checkbox' name='mo_re' <?php if ($medihash['mo_re']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='di_re' <?php if ($medihash['di_re']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='mi_re' <?php if ($medihash['mi_re']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='do_re' <?php if ($medihash['do_re']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='fr_re' <?php if ($medihash['fr_re']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='sa_re' <?php if ($medihash['sa_re']) { echo 'checked'; } ?>></input></td>
                <td><input type='checkbox' name='so_re' <?php if ($medihash['so_re']) { echo 'checked'; } ?>></input></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="form-group">
          <label for="comment" class="col-sm-2 control-label">Kommentar:</label>
          <div class="col-sm-10">
            <textarea name="comment" class="form-control" rows="10"><?php echo $ibb['comment'] ?></textarea>
          </div>
        </div>
        
        <table class="table table-bordered">
          <tr>
            <td rowspan="3">1</td>
            <td rowspan="3" class="warning" style='text-align:center;vertical-align:middle;'><strong>Grundbetreuung, Grundpflege medizinische Behandlungspflege und Ernährung</strong></td>
            <td>1. Auseinandersetzung mit der Krankheit, Krankheitseinsicht und Kontrolle der Medikamenteneinnahme</td>
            <td class="info">
              <select name="v1_1">
                <option value=0 <?php if ($ibb['v1_1'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v1_1'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v1_1'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v1_1'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v1_1'] == 8) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>2. Austausch, Reflektion, Koordination/Vernetzung und Begleitung miz Arzt, Therapeut, Psychiater, Arbeitgeber</td>
            <td class="info">
              <select name="v1_2">
                <option value=0 <?php if ($ibb['v1_2'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=1 <?php if ($ibb['v1_2'] == 1) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=2 <?php if ($ibb['v1_2'] == 2) { echo 'selected'; } ?>>regelmässig</option>
                <option value=3 <?php if ($ibb['v1_2'] == 3) { echo 'selected'; } ?>>oft</option>
                <option value=4 <?php if ($ibb['v1_2'] == 4) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>3. Unterstützung, Förderung oder Begleitung Körperpflege</td>
            <td class="info">
              <select name="v1_3">
                <option value=0 <?php if ($ibb['v1_3'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v1_3'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v1_3'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v1_3'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v1_3'] == 8) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td class='warning' style='text-align:center;vertical-align:middle;'><strong>Bekleidung und Mobilität</strong></td>
            <td>1. Unterstützung, Förderung oder Begleitung bei Arbeitsweg, Behördengängen</td>
            <td class="info">
              <select name="v2">
                <option value=0 <?php if ($ibb['v2'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=1 <?php if ($ibb['v2'] == 1) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=2 <?php if ($ibb['v2'] == 2) { echo 'selected'; } ?>>regelmässig</option>
                <option value=3 <?php if ($ibb['v2'] == 3) { echo 'selected'; } ?>>oft</option>
                <option value=4 <?php if ($ibb['v2'] == 4) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td rowspan='6'>3</td>
            <td rowspan='6' class='warning' style='text-align:center;vertical-align:middle;'><strong>Lebenstechniken</strong></td>
            <td>1. Unterstützung: Einkaufen, Kochen, Wäschebesorgung, "Ämtli-Erledigung" sowie für Weiterbildung/Training</td>
            <td class="info">
              <select name="v3_1">
                <option value=0 <?php if ($ibb['v3_1'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=1 <?php if ($ibb['v3_1'] == 1) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=2 <?php if ($ibb['v3_1'] == 2) { echo 'selected'; } ?>>regelmässig</option>
                <option value=3 <?php if ($ibb['v3_1'] == 3) { echo 'selected'; } ?>>oft</option>
                <option value=4 <?php if ($ibb['v3_1'] == 4) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>2. Unterstützung, Förderung oder Begleitung in Anforderungen des zusammenlebens in der Gruppe, Partnerschaft, mit Nachbarn, der Familie, bei der Arbeitsstelle und betrwffwnd die Integration im sozialen Umfeld</td>
            <td class="info">
              <select name="v3_2">
                <option value=0 <?php if ($ibb['v3_2'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v3_2'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v3_2'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v3_2'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v3_2'] == 8) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>3. Individuelle Förderplanung und Begleitung in der Umsetzung</td>
            <td class="info">
              <select name="v3_3">
                <option value=0 <?php if ($ibb['v3_3'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v3_3'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v3_3'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v3_3'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v3_3'] == 8) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>4. Aktivierung oder Begleitung in der Freizeitgestaltung</td>
            <td class="info">
              <select name="v3_4">
                <option value=0 <?php if ($ibb['v3_4'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v3_4'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v3_4'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v3_4'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v3_4'] == 8) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>5. Unterstützung, Förderung oder Begleitung bei administrativen und finanziellen Aufgaben: Rente, EL, Kontoführungen, Rechnungen bezahlen, Budgetberatung, Schuldensanierung, Steuern</td>
            <td class="info">
              <select name="v3_5">
                <option value=0 <?php if ($ibb['v3_5'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v3_5'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v3_5'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v3_5'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v3_5'] == 8) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>6. Unterstützung, Förderung, Begleitung und Auseinandersetzung im Umgang mit Rahmeneinhaltung und Struktur (Hausordnung, Regeln des Zusammenlebens)</td>
            <td class="info">
              <select name="v3_6">
                <option value=0 <?php if ($ibb['v3_6'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=1 <?php if ($ibb['v3_6'] == 1) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=2 <?php if ($ibb['v3_6'] == 2) { echo 'selected'; } ?>>regelmässig</option>
                <option value=3 <?php if ($ibb['v3_6'] == 3) { echo 'selected'; } ?>>oft</option>
                <option value=4 <?php if ($ibb['v3_6'] == 4) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td class='warning' style='text-align:center;vertical-align:middle;'><strong>Sicherheit und Stabilität</strong></td>
            <td>1. Betreuungsaufwand in der Nacht: (Nachtwache: 4 Punkte, Nachtpikett: 2 Punkte, Bereitschaft: 1 Punkt)</td>
            <td class="info">
              <select name="v4">
                <option value=0 <?php if ($ibb['v4'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v4'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v4'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v4'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v4'] == 8) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td rowspan='4'>5</td>
            <td rowspan='4' class='warning' style='text-align:center;vertical-align:middle;'><strong>Psychische Beeinträchtigungen, deviantes und Suchtverhalten</strong></td>
            <td>1. Unterstützung, Förderung oder Begleitung im Umgang / Prävention mit Sucht (substanzgebunden sowie Konsum, Ernährung, Medien</td>
            <td class="info">
              <select name="v5_1">
                <option value=0 <?php if ($ibb['v5_1'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=1 <?php if ($ibb['v5_1'] == 1) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=2 <?php if ($ibb['v5_1'] == 2) { echo 'selected'; } ?>>regelmässig</option>
                <option value=3 <?php if ($ibb['v5_1'] == 3) { echo 'selected'; } ?>>oft</option>
                <option value=4 <?php if ($ibb['v5_1'] == 4) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>2. Betreuungsaufwand im Umgang mit Nähe und Distanz (anstössiges Verhalten, verbale und nonverbale Übergriffe</td>
            <td class="info">
              <select name="v5_2">
                <option value=0 <?php if ($ibb['v5_2'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v5_2'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v5_2'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v5_2'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v5_2'] == 8) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>3. Betreuungsaufwand im Zusammenhang mit den Krankheitssymptomen oder deren Auswirkungen (Ängste, Zwänge, Selbst- und Fremdaggressionen, psychotisches oder schizophrenes Erleben</td>
            <td class="info">
              <select name="v5_3">
                <option value=0 <?php if ($ibb['v5_3'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v5_3'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v5_3'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v5_3'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v5_3'] == 8) { echo 'selected'; } ?>>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>4. Betreuungsaufwand im Umgang mit deviantem Sexualverhalten (Pädosexualität, Exhibitionismus, gewalttätige Sexualität)</td>
            <td class="info">
              <select name="v5_4">
                <option value=0 <?php if ($ibb['v5_4'] == 0) { echo 'selected'; } ?>>selten</option>
                <option value=2 <?php if ($ibb['v5_4'] == 2) { echo 'selected'; } ?>>gelegentlich</option>
                <option value=4 <?php if ($ibb['v5_4'] == 4) { echo 'selected'; } ?>>regelmässig</option>
                <option value=6 <?php if ($ibb['v5_4'] == 6) { echo 'selected'; } ?>>oft</option>
                <option value=8 <?php if ($ibb['v5_4'] == 8) { echo 'selected'; } ?>>sehr oft</option>
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
        <hr />
        
        <div class="form-group">
          <label for="creator" class="col-sm-8 control-label">Ausgefüllt von:</label>
          <div class="col-sm-4">
            <input class="form-control" name="creator" value='<?php echo $ibb['creator'] ?>'></input>
          </div>
        </div>
        <div class="form-group">
          <label for="status" class="col-sm-8 control-label">Status:</label>
          <div class="col-sm-4">
            <select class="form-control" name="status">
              <option value='active' <?php if ($ibb['status'] == 'active') { echo "selected"; } ?>>Aktiv</option>
              <option value='closed' <?php if ($ibb['status'] == 'closed') { echo "selected"; } ?>>Geschlossen</option>
            </select>
          </div>
        </div>
        <hr />
        <input type="submit" value="Speichern" class="btn btn-success pull-right" />
        <br />
        <br />
        <br />
      </form>

    </div>
  </body>
</html>
