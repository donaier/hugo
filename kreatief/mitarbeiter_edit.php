<!DOCTYPE html>
<html>
  <head>
    <title>Neuer Mitarbeiter erfassen</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <?php
      include "functions.php";
      $ma = get_mitarbeiter($_GET['id']);
    ?>

    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
      <?php if ($ma['status'] == 'active'): ?>
        <a href="./mitarbeiter_switch_status.php?id=<?php echo $ma['id'] ?>" class='btn btn-default pull-right'><span class='glyphicon glyphicon-paste'></span> Deaktivieren</a>
      <?php else: ?>
        <a href="./mitarbeiter_switch_status.php?id=<?php echo $ma['id'] ?>" class='btn btn-default pull-right'><span class='glyphicon glyphicon-copy'></span> Aktivieren</a>
      <?php endif ?>
      <hr />

      <h3 class="text-center"><?php echo $ma['vorname'] . ' ' . $ma['name']; ?> bearbeiten:</h3>
      <br />

      <form action="mitarbeiter_update.php" method="POST" class="form-horizontal">
        <input name="id" value="<?php echo $ma['id'] ?>" class="hidden"></input>
        <div class="panel panel-info">
          <div class="panel-heading">
            Allgemeine Merkmale:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="voname" class="control-label col-sm-3">Vorname:</label>
              <div class="col-sm-4">
                <input name="vorname" value="<?php echo $ma['vorname'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="control-label col-sm-3">Nachname:</label>
              <div class="col-sm-4">
                <input name="name" value="<?php echo $ma['name'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="date_of_birth" class="control-label col-sm-3">Geburtsdatum:</label>
              <div class="col-sm-4">
                <select name="birth_day" class="col-sm-4">
                  <?php 
                    for ($d=1; $d <= 31; $d++) {
                      if ($d == date('j', strtotime($ma['date_of_birth']))) {
                        echo "<option value='$d' selected>$d.</option>";
                      } else {
                        echo "<option value='$d'>$d.</option>";
                      }
                    }
                  ?>
                </select>
                <select name="birth_month" class="col-sm-4">
                  <?php
                    for ($m=1; $m <= 12 ; $m++) {
                      if ($m == date('n', strtotime($ma['date_of_birth']))) {
                        echo "<option value='$m' selected>$m.</option>";
                      } else {
                        echo "<option value='$m'>$m.</option>";
                      }
                    }
                  ?>
                </select>
                <select name="birth_year" class="col-sm-4">
                  <?php
                    for ($y=1920; $y < 2020; $y++) {
                      if ($y == date('Y', strtotime($ma['date_of_birth']))) {
                        echo "<option value='$y' selected>$y</option>";
                      } else {
                        echo "<option value='$y'>$y</option>";
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="tel" class="control-label col-sm-3">Tel:</label>
              <div class="col-sm-4">
                <input name="tel" value="<?php echo $ma['tel'] ?>" class="form-control"></input>
              </div>
            </div><div class="form-group">
              <label for="natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="natel" value="<?php echo $ma['natel'] ?>" class="form-control"></input>
              </div>
            </div><div class="form-group">
              <label for="email" class="control-label col-sm-3">Email:</label>
              <div class="col-sm-4">
                <input name="email" value="<?php echo $ma['email'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="augenfarbe" class="control-label col-sm-3">Augenfarbe:</label>
              <div class="col-sm-4">
                <input name="augenfarbe" value="<?php echo $ma['augenfarbe'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="haarfarbe" class="control-label col-sm-3">Haarfarbe:</label>
              <div class="col-sm-4">
                <input name="haarfarbe" value="<?php echo $ma['haarfarbe'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="groesse" class="control-label col-sm-3">Grösse:</label>
              <div class="col-sm-4">
                <input name="groesse" value="<?php echo $ma['groesse'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="gewicht" class="control-label col-sm-3">Gewicht:</label>
              <div class="col-sm-4">
                <input name="gewicht" value="<?php echo $ma['gewicht'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="blutdruck" class="control-label col-sm-3">Blutdruck:</label>
              <div class="col-sm-4">
                <input name="blutdruck" value="<?php echo $ma['blutdruck'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="puls" class="control-label col-sm-3">Puls:</label>
              <div class="col-sm-4">
                <input name="puls" value="<?php echo $ma['puls'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="blutgruppe" class="control-label col-sm-3">Blutgruppe:</label>
              <div class="col-sm-4">
                <input name="blutgruppe" value="<?php echo $ma['blutgruppe'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="tetanus" class="control-label col-sm-3">Dat. Tetanusimpfung:</label>
              <div class="col-sm-4">
                <input name="tetanus" value="<?php echo $ma['tetanus'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="bes_merkmale" class="control-label col-sm-3">Besondere Merkmale:</label>
              <div class="col-sm-9">
                <textarea name="bes_merkmale" class="form-control" rows="10"><?php echo $ma['bes_merkmale'] ?></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading">
            Wohnsituation:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="wohngruppe" class="control-label col-sm-3">Wohngruppe:</label>
              <div class="col-sm-4">
                <input name="wohngruppe" value="<?php echo $ma['wohngruppe'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_bezugsperson" class="control-label col-sm-3">Bezugsperson:</label>
              <div class="col-sm-4">
                <input name="wohn_bezugsperson" value="<?php echo $ma['wohn_bezugsperson'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="wohn_tel" value="<?php echo $ma['wohn_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="wohn_fax" value="<?php echo $ma['wohn_fax'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="wohn_mail" value="<?php echo $ma['wohn_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="wohn_adresse" class="form-control" rows="10"><?php echo $ma['wohn_adresse'] ?></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading">
            Arbeitssituation:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="tagesstruktur" class="control-label col-sm-3">Tagesstruktur:</label>
              <div class="col-sm-4">
                <input name="tagesstruktur" value="<?php echo $ma['tagesstruktur'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_bezugsperson" class="control-label col-sm-3">Bezugsperson:</label>
              <div class="col-sm-4">
                <input name="ts_bezugsperson" value="<?php echo $ma['ts_bezugsperson'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="ts_tel" value="<?php echo $ma['ts_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="ts_fax" value="<?php echo $ma['ts_fax'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="ts_mail" value="<?php echo $ma['ts_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="ts_adresse" class="form-control" rows="10"><?php echo $ma['ts_adresse'] ?></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading">
            Angehörige:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="mutter" class="control-label col-sm-3">Mutter:</label>
              <div class="col-sm-4">
                <input name="mutter" value="<?php echo $ma['mutter'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mutter_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="mutter_tel" value="<?php echo $ma['mutter_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mutter_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="mutter_natel" value="<?php echo $ma['mutter_natel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mutter_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="mutter_mail" value="<?php echo $ma['mutter_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mutter_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="mutter_adresse" class="form-control" rows="10"><?php echo $ma['mutter_adresse'] ?></textarea>
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label for="vater" class="control-label col-sm-3">Vater:</label>
              <div class="col-sm-4">
                <input name="vater" value="<?php echo $ma['vater'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="vater_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="vater_tel" value="<?php echo $ma['vater_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="vater_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="vater_natel" value="<?php echo $ma['vater_natel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="vater_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="vater_mail" value="<?php echo $ma['vater_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="vater_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="vater_adresse" class="form-control" rows="10"><?php echo $ma['vater_adresse'] ?></textarea>
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label for="geschwister" class="control-label col-sm-3">Geschwister:</label>
              <div class="col-sm-4">
                <input name="geschwister" value="<?php echo $ma['geschwister'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="geschwister_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="geschwister_tel" value="<?php echo $ma['geschwister_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="geschwister_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="geschwister_natel" value="<?php echo $ma['geschwister_natel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="geschwister_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="geschwister_mail" value="<?php echo $ma['geschwister_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="geschwister_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="geschwister_adresse" class="form-control" rows="10"><?php echo $ma['geschwister_adresse'] ?></textarea>
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label for="grosseltern" class="control-label col-sm-3">Grosseltern:</label>
              <div class="col-sm-4">
                <input name="grosseltern" value="<?php echo $ma['grosseltern'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="grosseltern_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="grosseltern_tel" value="<?php echo $ma['grosseltern_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="grosseltern_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="grosseltern_natel" value="<?php echo $ma['grosseltern_natel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="grosseltern_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="grosseltern_mail" value="<?php echo $ma['grosseltern_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="grosseltern_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="grosseltern_adresse" class="form-control" rows="10"><?php echo $ma['grosseltern_adresse'] ?></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading">
            Spezielle Bezugsperson:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="spez_bp_name" class="control-label col-sm-3">Name:</label>
              <div class="col-sm-4">
                <input name="spez_bp_name" value="<?php echo $ma['spez_bp_name'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="spez_bp_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="spez_bp_tel" value="<?php echo $ma['spez_bp_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="spez_bp_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="spez_bp_natel" value="<?php echo $ma['spez_bp_natel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="spez_bp_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="spez_bp_mail" value="<?php echo $ma['spez_bp_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="spez_bp_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="spez_bp_adresse" class="form-control" rows="10"><?php echo $ma['spez_bp_adresse'] ?></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading">
            Zahnarzt:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="dent_name" class="control-label col-sm-3">Name:</label>
              <div class="col-sm-4">
                <input name="dent_name"  value="<?php echo $ma['dent_name'] ?>"class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="dent_tel"  value="<?php echo $ma['dent_tel'] ?>"class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="dent_fax"  value="<?php echo $ma['dent_fax'] ?>"class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_email" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="dent_email"  value="<?php echo $ma['dent_email'] ?>"class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="dent_adresse" class="form-control" rows="6"><?php echo $ma['dent_adresse'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_kommentar" class="control-label col-sm-3">Kommentar/Termine:</label>
              <div class="col-sm-4">
                <textarea name="dent_kommentar" class="form-control" rows="6"><?php echo $ma['dent_kommentar'] ?></textarea>
              </div>
            </div>
          </div>
        </div>


        <div class="panel panel-info">
          <div class="panel-heading">
            Arzt:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="arzt_name" class="control-label col-sm-3">Name:</label>
              <div class="col-sm-4">
                <input name="arzt_name" value="<?php echo $ma['arzt_name'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="arzt_tel" value="<?php echo $ma['arzt_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="arzt_natel" value="<?php echo $ma['arzt_natel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="arzt_fax" value="<?php echo $ma['arzt_fax'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="arzt_mail" value="<?php echo $ma['arzt_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="arzt_adresse" class="form-control" rows="10"><?php echo $ma['arzt_adresse'] ?></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading">
            Psychiater / Therapeut:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="psych_name" class="control-label col-sm-3">Name:</label>
              <div class="col-sm-4">
                <input name="psych_name" value="<?php echo $ma['psych_name'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="psych_tel" value="<?php echo $ma['psych_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="psych_natel" value="<?php echo $ma['psych_natel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="psych_fax" value="<?php echo $ma['psych_fax'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="psych_mail" value="<?php echo $ma['psych_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="psych_adresse" class="form-control" rows="10"><?php echo $ma['psych_adresse'] ?></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading">
            MandatsträgerIn:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="mandat_name" class="control-label col-sm-3">Name:</label>
              <div class="col-sm-4">
                <input name="mandat_name" value="<?php echo $ma['mandat_name'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="mandat_tel" value="<?php echo $ma['mandat_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="mandat_natel" value="<?php echo $ma['mandat_natel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="mandat_mail" value="<?php echo $ma['mandat_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="mandat_fax" value="<?php echo $ma['mandat_fax'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_art" class="control-label col-sm-3">Art:</label>
              <div class="col-sm-4">
                <input name="mandat_art" value="<?php echo $ma['mandat_art'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="mandat_adresse" class="form-control" rows="6"><?php echo $ma['mandat_adresse'] ?></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading">
            Zusätzlicher Kontakt:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="extra_name" class="control-label col-sm-3">Name:</label>
              <div class="col-sm-4">
                <input name="extra_name" value="<?php echo $ma['extra_name'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="extra_tel" value="<?php echo $ma['extra_tel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="extra_natel" value="<?php echo $ma['extra_natel'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="extra_mail" value="<?php echo $ma['extra_mail'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="extra_fax" value="<?php echo $ma['extra_fax'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_art" class="control-label col-sm-3">Art:</label>
              <div class="col-sm-4">
                <input name="extra_art" value="<?php echo $ma['extra_art'] ?>" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="extra_adresse" class="form-control" rows="6"><?php echo $ma['extra_adresse'] ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            Frühwarnzeichen:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="warnzeichen" class="control-label col-sm-3">Frühwarnzeichen:</label>
              <div class="col-sm-9">
                <textarea name="warnzeichen" class="form-control" rows="10"><?php echo $ma['warnzeichen'] ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            Procedere Krisenintervention:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="intervention" class="control-label col-sm-3">Krisenintervention:</label>
              <div class="col-sm-9">
                <textarea name="intervention" class="form-control" rows="10"><?php echo $ma['intervention'] ?></textarea>
              </div>
            </div>
          </div>
        </div>
        
        <input type="submit" value="Speichern" class="btn btn-success pull-right"></input>
      </form>
      <br>
      <br>
      <br>
      <br>
    </div>
  </body>
</html>
