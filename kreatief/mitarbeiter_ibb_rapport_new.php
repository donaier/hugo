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

        echo "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h3>";
      ?>
      <hr />

      <form action="./mitarbeiter_ibb.php?id=<?php echo $ma['id'] ?>" method="POST" class="form-horizontal">
        <input type="hidden" name="mitarbeiter_id" value=<?php echo $ma['id'] ?>></input>
        <input type="hidden" name="created_at" class="form-control" value="<?php echo date('Y.m.d') ?>"></input>
        <br />
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Titel / Bezeichnung:</label>
          <div class="col-sm-10">
            <input class="form-control" name="title"></input>
          </div>
        </div>
        <br />
        <div class='form-group'>
          <label class='col-sm-2 control-label'>Medikamente:</label>
          <div class='col-sm-10'>
            <table class='table table-condensed table-striped table-bordered text-center'>
              <tr>
                <td class='col-sm-3'></td>
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
                <td><input type='checkbox' name='mo_mo'></input></td>
                <td><input type='checkbox' name='di_mo'></input></td>
                <td><input type='checkbox' name='mi_mo'></input></td>
                <td><input type='checkbox' name='do_mo'></input></td>
                <td><input type='checkbox' name='fr_mo'></input></td>
                <td><input type='checkbox' name='sa_mo'></input></td>
                <td><input type='checkbox' name='so_mo'></input></td>
              </tr>
              <tr>
                <th>Mittag</th>
                <td><input type='checkbox' name='mo_mi'></input></td>
                <td><input type='checkbox' name='di_mi'></input></td>
                <td><input type='checkbox' name='mi_mi'></input></td>
                <td><input type='checkbox' name='do_mi'></input></td>
                <td><input type='checkbox' name='fr_mi'></input></td>
                <td><input type='checkbox' name='sa_mi'></input></td>
                <td><input type='checkbox' name='so_mi'></input></td>
              </tr>
              <tr>
                <th>Abend</th>
                <td><input type='checkbox' name='mo_ab'></input></td>
                <td><input type='checkbox' name='di_ab'></input></td>
                <td><input type='checkbox' name='mi_ab'></input></td>
                <td><input type='checkbox' name='do_ab'></input></td>
                <td><input type='checkbox' name='fr_ab'></input></td>
                <td><input type='checkbox' name='sa_ab'></input></td>
                <td><input type='checkbox' name='so_ab'></input></td>
              </tr>
              <tr>
                <th>Nacht</th>
                <td><input type='checkbox' name='mo_na'></input></td>
                <td><input type='checkbox' name='di_na'></input></td>
                <td><input type='checkbox' name='mi_na'></input></td>
                <td><input type='checkbox' name='do_na'></input></td>
                <td><input type='checkbox' name='fr_na'></input></td>
                <td><input type='checkbox' name='sa_na'></input></td>
                <td><input type='checkbox' name='so_na'></input></td>
              </tr>
              <tr>
                <th>Reserve</th>
                <td><input type='checkbox' name='mo_re'></input></td>
                <td><input type='checkbox' name='di_re'></input></td>
                <td><input type='checkbox' name='mi_re'></input></td>
                <td><input type='checkbox' name='do_re'></input></td>
                <td><input type='checkbox' name='fr_re'></input></td>
                <td><input type='checkbox' name='sa_re'></input></td>
                <td><input type='checkbox' name='so_re'></input></td>
              </tr>
              <tr>
                <th>Richten</th>
                <td><input type='checkbox' name='mo_ri'></input></td>
                <td><input type='checkbox' name='di_ri'></input></td>
                <td><input type='checkbox' name='mi_ri'></input></td>
                <td><input type='checkbox' name='do_ri'></input></td>
                <td><input type='checkbox' name='fr_ri'></input></td>
                <td><input type='checkbox' name='sa_ri'></input></td>
                <td><input type='checkbox' name='so_ri'></input></td>
              </tr>
              <tr>
                <th>Bestellen</th>
                <td><input type='checkbox' name='mo_be'></input></td>
                <td><input type='checkbox' name='di_be'></input></td>
                <td><input type='checkbox' name='mi_be'></input></td>
                <td><input type='checkbox' name='do_be'></input></td>
                <td><input type='checkbox' name='fr_be'></input></td>
                <td><input type='checkbox' name='sa_be'></input></td>
                <td><input type='checkbox' name='so_be'></input></td>
              </tr>
              <tr>
                <th>Kontrolle</th>
                <td><input type='checkbox' name='mo_ko'></input></td>
                <td><input type='checkbox' name='di_ko'></input></td>
                <td><input type='checkbox' name='mi_ko'></input></td>
                <td><input type='checkbox' name='do_ko'></input></td>
                <td><input type='checkbox' name='fr_ko'></input></td>
                <td><input type='checkbox' name='sa_ko'></input></td>
                <td><input type='checkbox' name='so_ko'></input></td>
              </tr>
            </table>
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-2 control-label'>Gespräche:</label>
          <div class='col-sm-10'>
            <table class='table table-condensed table-striped table-bordered text-center'>
              <tr>
                <td class='col-sm-3'></td>
                <th>Mo</th>
                <th>Di</th>
                <th>Mi</th>
                <th>Do</th>
                <th>Fr</th>
                <th>Sa</th>
                <th>So</th>
              </tr>
              <tr>
                <th>BP-Gespräch</th>
                <td><input type='checkbox' name='mo_bp'></input></td>
                <td><input type='checkbox' name='di_bp'></input></td>
                <td><input type='checkbox' name='mi_bp'></input></td>
                <td><input type='checkbox' name='do_bp'></input></td>
                <td><input type='checkbox' name='fr_bp'></input></td>
                <td><input type='checkbox' name='sa_bp'></input></td>
                <td><input type='checkbox' name='so_bp'></input></td>
              </tr>
              <tr>
                <th>Stao-Gespräch Intern</th>
                <td><input type='checkbox' name='mo_stao'></input></td>
                <td><input type='checkbox' name='di_stao'></input></td>
                <td><input type='checkbox' name='mi_stao'></input></td>
                <td><input type='checkbox' name='do_stao'></input></td>
                <td><input type='checkbox' name='fr_stao'></input></td>
                <td><input type='checkbox' name='sa_stao'></input></td>
                <td><input type='checkbox' name='so_stao'></input></td>
              </tr>
              <tr>
                <th>Vernetzungs-Gespräch</th>
                <td><input type='checkbox' name='mo_netz'></input></td>
                <td><input type='checkbox' name='di_netz'></input></td>
                <td><input type='checkbox' name='mi_netz'></input></td>
                <td><input type='checkbox' name='do_netz'></input></td>
                <td><input type='checkbox' name='fr_netz'></input></td>
                <td><input type='checkbox' name='sa_netz'></input></td>
                <td><input type='checkbox' name='so_netz'></input></td>
              </tr>
              <tr>
                <th>Vernetzungsarbeit - Telefon</th>
                <td><input type='checkbox' name='mo_vtel'></input></td>
                <td><input type='checkbox' name='di_vtel'></input></td>
                <td><input type='checkbox' name='mi_vtel'></input></td>
                <td><input type='checkbox' name='do_vtel'></input></td>
                <td><input type='checkbox' name='fr_vtel'></input></td>
                <td><input type='checkbox' name='sa_vtel'></input></td>
                <td><input type='checkbox' name='so_vtel'></input></td>
              </tr>
              <tr>
                <th>Vernetzungsarbeit - Mail</th>
                <td><input type='checkbox' name='mo_vmail'></input></td>
                <td><input type='checkbox' name='di_vmail'></input></td>
                <td><input type='checkbox' name='mi_vmail'></input></td>
                <td><input type='checkbox' name='do_vmail'></input></td>
                <td><input type='checkbox' name='fr_vmail'></input></td>
                <td><input type='checkbox' name='sa_vmail'></input></td>
                <td><input type='checkbox' name='so_vmail'></input></td>
              </tr>
              <tr>
                <th>Vernetzungsarbeit - Sonstig</th>
                <td><input type='checkbox' name='mo_vsonst'></input></td>
                <td><input type='checkbox' name='di_vsonst'></input></td>
                <td><input type='checkbox' name='mi_vsonst'></input></td>
                <td><input type='checkbox' name='do_vsonst'></input></td>
                <td><input type='checkbox' name='fr_vsonst'></input></td>
                <td><input type='checkbox' name='sa_vsonst'></input></td>
                <td><input type='checkbox' name='so_vsonst'></input></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="form-group">
          <label for="comment" class="col-sm-2 control-label">Kommentar:</label>
          <div class="col-sm-10">
            <textarea name="comment" class="form-control" rows="10"></textarea>
          </div>
        </div>
        
        <table class="table table-bordered">
          <tr>
            <td rowspan="3">1</td>
            <td rowspan="3" class="warning" style='text-align:center;vertical-align:middle;'><strong>Grundbetreuung, Grundpflege medizinische Behandlungspflege und Ernährung</strong></td>
            <td>1. Auseinandersetzung mit der Krankheit, Krankheitseinsicht und Kontrolle der Medikamenteneinnahme</td>
            <td class="info">
              <select name="v1_1">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>2. Austausch, Reflektion, Koordination/Vernetzung und Begleitung miz Arzt, Therapeut, Psychiater, Arbeitgeber</td>
            <td class="info">
              <select name="v1_2">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>3. Unterstützung, Förderung oder Begleitung Körperpflege</td>
            <td class="info">
              <select name="v1_3">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td class='warning' style='text-align:center;vertical-align:middle;'><strong>Bekleidung und Mobilität</strong></td>
            <td>1. Unterstützung, Förderung oder Begleitung bei Arbeitsweg, Behördengängen</td>
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
            <td rowspan='6'>3</td>
            <td rowspan='6' class='warning' style='text-align:center;vertical-align:middle;'><strong>Lebenstechniken</strong></td>
            <td>1. Unterstützung: Einkaufen, Kochen, Wäschebesorgung, "Ämtli-Erledigung" sowie für Weiterbildung/Training</td>
            <td class="info">
              <select name="v3_1">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>2. Unterstützung, Förderung oder Begleitung in Anforderungen des zusammenlebens in der Gruppe, Partnerschaft, mit Nachbarn, der Familie, bei der Arbeitsstelle und betrwffwnd die Integration im sozialen Umfeld</td>
            <td class="info">
              <select name="v3_2">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>3. Individuelle Förderplanung und Begleitung in der Umsetzung</td>
            <td class="info">
              <select name="v3_3">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>4. Aktivierung oder Begleitung in der Freizeitgestaltung</td>
            <td class="info">
              <select name="v3_4">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>5. Unterstützung, Förderung oder Begleitung bei administrativen und finanziellen Aufgaben: Rente, EL, Kontoführungen, Rechnungen bezahlen, Budgetberatung, Schuldensanierung, Steuern</td>
            <td class="info">
              <select name="v3_5">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>6. Unterstützung, Förderung, Begleitung und Auseinandersetzung im Umgang mit Rahmeneinhaltung und Struktur (Hausordnung, Regeln des Zusammenlebens)</td>
            <td class="info">
              <select name="v3_6">
                <option value=0>selten</option>
                <option value=1>gelegentlich</option>
                <option value=2>regelmässig</option>
                <option value=3>oft</option>
                <option value=4>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td class='warning' style='text-align:center;vertical-align:middle;'><strong>Sicherheit und Stabilität</strong></td>
            <td>1. Betreuungsaufwand in der Nacht: (Nachtwache: 4 Punkte, Nachtpikett: 2 Punkte, Bereitschaft: 1 Punkt)</td>
            <td class="info">
              <select name="v4">
                <option value=0>selten</option>
                <option value=2>gelegentlich</option>
                <option value=4>regelmässig</option>
                <option value=6>oft</option>
                <option value=8>sehr oft</option>
              </select>
            </td>
          </tr>
          <tr>
            <td rowspan='4'>5</td>
            <td rowspan='4' class='warning' style='text-align:center;vertical-align:middle;'><strong>Psychische Beeinträchtigungen, deviantes und Suchtverhalten</strong></td>
            <td>1. Unterstützung, Förderung oder Begleitung im Umgang / Prävention mit Sucht (substanzgebunden sowie Konsum, Ernährung, Medien</td>
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
            <td>2. Betreuungsaufwand im Umgang mit Nähe und Distanz (anstössiges Verhalten, verbale und nonverbale Übergriffe</td>
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
            <td>3. Betreuungsaufwand im Zusammenhang mit den Krankheitssymptomen oder deren Auswirkungen (Ängste, Zwänge, Selbst- und Fremdaggressionen, psychotisches oder schizophrenes Erleben</td>
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
            <td>4. Betreuungsaufwand im Umgang mit deviantem Sexualverhalten (Pädosexualität, Exhibitionismus, gewalttätige Sexualität)</td>
            <td class="info">
              <select name="v5_4">
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
        <hr />
        
        <div class="form-group">
          <label for="creator" class="col-sm-8 control-label">Ausgefüllt von:</label>
          <div class="col-sm-4">
            <input class="form-control" name="creator"></input>
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
