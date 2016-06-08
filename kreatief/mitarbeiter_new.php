<!DOCTYPE html>
<html>
  <head>
  	<title>Neuer Mitarbeiter erfassen</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
      <hr />

      <h3 class="text-center">Neuer Mitarbeiter</h3>
      <br />

      <form action="mitarbeiter_save.php" method="POST" class="form-horizontal">
        <div class="panel panel-info">
          <div class="panel-heading">
            Allgemeine Merkmale:
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="voname" class="control-label col-sm-3">Vorname:</label>
              <div class="col-sm-4">
                <input name="vorname" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="control-label col-sm-3">Nachname:</label>
              <div class="col-sm-4">
                <input name="name" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="date_of_birth" class="control-label col-sm-3">Geburtsdatum:</label>
              <div class="col-sm-4">
                <select name="birth_day" class="col-sm-4">
                  <?php 
                    for ($d=1; $d <= 31; $d++) {
                      echo "<option value='$d'>$d.</option>";
                    }
                  ?>
                </select>
                <select name="birth_month" class="col-sm-4">
                  <?php
                    for ($m=1; $m <= 12 ; $m++) { 
                      echo "<option value='$m'>$m.</option>";
                    }
                  ?>
                </select>
                <select name="birth_year" class="col-sm-4">
                  <?php
                    for ($y=1920; $y < 2020; $y++) { 
                      echo "<option value='$y'>$y</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="tel" class="form-control"></input>
              </div>
            </div><div class="form-group">
              <label for="natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="natel" class="form-control"></input>
              </div>
            </div><div class="form-group">
              <label for="email" class="control-label col-sm-3">Email:</label>
              <div class="col-sm-4">
                <input name="email" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="augenfarbe" class="control-label col-sm-3">Augenfarbe:</label>
              <div class="col-sm-4">
                <input name="augenfarbe" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="haarfarbe" class="control-label col-sm-3">Haarfarbe:</label>
              <div class="col-sm-4">
                <input name="haarfarbe" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="groesse" class="control-label col-sm-3">Grösse:</label>
              <div class="col-sm-4">
                <input name="groesse" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="gewicht" class="control-label col-sm-3">Gewicht:</label>
              <div class="col-sm-4">
                <input name="gewicht" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="blutdruck" class="control-label col-sm-3">Blutdruck:</label>
              <div class="col-sm-4">
                <input name="blutdruck" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="puls" class="control-label col-sm-3">Puls:</label>
              <div class="col-sm-4">
                <input name="puls" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="blutgruppe" class="control-label col-sm-3">Blutgruppe:</label>
              <div class="col-sm-4">
                <input name="blutgruppe" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="tetanus" class="control-label col-sm-3">Dat. Tetanusimpfung:</label>
              <div class="col-sm-4">
                <input name="tetanus" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="bes_merkmale" class="control-label col-sm-3">Besondere Merkmale:</label>
              <div class="col-sm-9">
                <textarea name="bes_merkmale" class="form-control" rows="10"></textarea>
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
                <input name="wohngruppe" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_bezugsperson" class="control-label col-sm-3">Bezugsperson:</label>
              <div class="col-sm-4">
                <input name="wohn_bezugsperson" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="wohn_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="wohn_fax" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="wohn_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="wohn_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="wohn_adresse" class="form-control" rows="6"></textarea>
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
                <input name="tagesstruktur" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_bezugsperson" class="control-label col-sm-3">Bezugsperson:</label>
              <div class="col-sm-4">
                <input name="ts_bezugsperson" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="ts_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="ts_fax" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="ts_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="ts_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="ts_adresse" class="form-control" rows="6"></textarea>
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
                <input name="mutter" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mutter_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="mutter_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mutter_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="mutter_natel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mutter_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="mutter_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mutter_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="mutter_adresse" class="form-control" rows="6"></textarea>
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label for="vater" class="control-label col-sm-3">Vater:</label>
              <div class="col-sm-4">
                <input name="vater" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="vater_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="vater_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="vater_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="vater_natel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="vater_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="vater_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="vater_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="vater_adresse" class="form-control" rows="6"></textarea>
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label for="geschwister" class="control-label col-sm-3">Geschwister:</label>
              <div class="col-sm-4">
                <input name="geschwister" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="geschwister_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="geschwister_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="geschwister_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="geschwister_natel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="geschwister_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="geschwister_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="geschwister_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="geschwister_adresse" class="form-control" rows="6"></textarea>
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label for="grosseltern" class="control-label col-sm-3">Grosseltern:</label>
              <div class="col-sm-4">
                <input name="grosseltern" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="grosseltern_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="grosseltern_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="grosseltern_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="grosseltern_natel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="grosseltern_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="grosseltern_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="grosseltern_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="grosseltern_adresse" class="form-control" rows="6"></textarea>
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
                <input name="spez_bp_name" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="spez_bp_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="spez_bp_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="spez_bp_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="spez_bp_natel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="spez_bp_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="spez_bp_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="spez_bp_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="spez_bp_adresse" class="form-control" rows="6"></textarea>
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
                <input name="dent_name" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="dent_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="dent_fax" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_email" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="dent_email" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="dent_adresse" class="form-control" rows="6"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="dent_kommentar" class="control-label col-sm-3">Kommentar/Termine:</label>
              <div class="col-sm-4">
                <textarea name="dent_kommentar" class="form-control" rows="6"></textarea>
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
                <input name="arzt_name" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="arzt_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="arzt_natel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="arzt_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="arzt_fax" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="arzt_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="arzt_adresse" class="form-control" rows="6"></textarea>
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
                <input name="psych_name" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="psych_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="psych_natel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="psych_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="psych_fax" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="psych_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="psych_adresse" class="form-control" rows="6"></textarea>
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
                <input name="mandat_name" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="mandat_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="mandat_natel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="mandat_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="mandat_fax" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_art" class="control-label col-sm-3">Art:</label>
              <div class="col-sm-4">
                <input name="mandat_art" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="mandat_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="mandat_adresse" class="form-control" rows="6"></textarea>
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
                <input name="extra_name" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_tel" class="control-label col-sm-3">Telefon:</label>
              <div class="col-sm-4">
                <input name="extra_tel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_natel" class="control-label col-sm-3">Natel:</label>
              <div class="col-sm-4">
                <input name="extra_natel" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_mail" class="control-label col-sm-3">Mail:</label>
              <div class="col-sm-4">
                <input name="extra_mail" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_fax" class="control-label col-sm-3">Fax:</label>
              <div class="col-sm-4">
                <input name="extra_fax" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_art" class="control-label col-sm-3">Art:</label>
              <div class="col-sm-4">
                <input name="extra_art" class="form-control"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="extra_adresse" class="control-label col-sm-3">Adresse:</label>
              <div class="col-sm-4">
                <textarea name="extra_adresse" class="form-control" rows="6"></textarea>
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
                <textarea name="warnzeichen" class="form-control" rows="10"></textarea>
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
                <textarea name="intervention" class="form-control" rows="10"></textarea>
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
