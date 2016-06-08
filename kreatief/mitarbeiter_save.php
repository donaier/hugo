<!DOCTYPE html>
<html>
  <head>
    <title>Mitarbeiter gespeichert</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>

      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // Mitarbeiter speichern
        $fields = "updated_at, name, vorname, date_of_birth, augenfarbe, haarfarbe, groesse, gewicht, blutdruck, puls, blutgruppe, tetanus, bes_merkmale, wohngruppe, wohn_bezugsperson, wohn_tel, wohn_fax, wohn_mail, tagesstruktur, ts_bezugsperson, ts_tel, ts_fax, ts_mail, mutter, mutter_tel, mutter_natel, mutter_mail, vater, vater_tel, vater_natel, vater_mail, geschwister, geschwister_tel, geschwister_natel, geschwister_mail, grosseltern, grosseltern_tel, grosseltern_natel, grosseltern_mail, spez_bp_name, spez_bp_tel, spez_bp_natel, spez_bp_mail, arzt_name, arzt_tel, arzt_natel, arzt_fax, arzt_mail, psych_name, psych_tel, psych_natel, psych_mail, psych_fax, mandat_name, mandat_tel, mandat_natel, mandat_mail, mandat_fax, mandat_art, mandat_adresse, extra_name, extra_tel, extra_natel, extra_mail, extra_fax, extra_art, extra_adresse, warnzeichen, intervention, tel, natel, email, wohn_adresse, ts_adresse, mutter_adresse, vater_adresse, geschwister_adresse, grosseltern_adresse, spez_bp_adresse, arzt_adresse, psych_adresse, dent_name, dent_tel, dent_fax, dent_email, dent_adresse, dent_kommentar";
        $values = [
                    "'" . date('Y-m-d') . "'",
                    "'" . $_POST['name'] . "'",
                    "'" . $_POST['vorname'] . "'",
                    "'" . $_POST['birth_year'] . "-" . $_POST['birth_month'] . "-" . $_POST['birth_day'] . "'",
                    "'" . $_POST['augenfarbe'] . "'",
                    "'" . $_POST['haarfarbe'] . "'",
                    "'" . $_POST['groesse'] . "'",
                    "'" . $_POST['gewicht'] . "'",
                    "'" . $_POST['blutdruck'] . "'",
                    "'" . $_POST['puls'] . "'",
                    "'" . $_POST['blutgruppe'] . "'",
                    "'" . $_POST['tetanus'] . "'",
                    "'" . $_POST['bes_merkmale'] . "'",
                    "'" . $_POST['wohngruppe'] . "'",
                    "'" . $_POST['wohn_bezugsperson'] . "'",
                    "'" . $_POST['wohn_tel'] . "'",
                    "'" . $_POST['wohn_fax'] . "'",
                    "'" . $_POST['wohn_mail'] . "'",
                    "'" . $_POST['tagesstruktur'] . "'",
                    "'" . $_POST['ts_bezugsperson'] . "'",
                    "'" . $_POST['ts_tel'] . "'",
                    "'" . $_POST['ts_fax'] . "'",
                    "'" . $_POST['ts_mail'] . "'",
                    "'" . $_POST['mutter'] . "'",
                    "'" . $_POST['mutter_tel'] . "'",
                    "'" . $_POST['mutter_natel'] . "'",
                    "'" . $_POST['mutter_mail'] . "'",
                    "'" . $_POST['vater'] . "'",
                    "'" . $_POST['vater_tel'] . "'",
                    "'" . $_POST['vater_natel'] . "'",
                    "'" . $_POST['vater_mail'] . "'",
                    "'" . $_POST['geschwister'] . "'",
                    "'" . $_POST['geschwister_tel'] . "'",
                    "'" . $_POST['geschwister_natel'] . "'",
                    "'" . $_POST['geschwister_mail'] . "'",
                    "'" . $_POST['grosseltern'] . "'",
                    "'" . $_POST['grosseltern_tel'] . "'",
                    "'" . $_POST['grosseltern_natel'] . "'",
                    "'" . $_POST['grosseltern_mail'] . "'",
                    "'" . $_POST['spez_bp_name'] . "'",
                    "'" . $_POST['spez_bp_tel'] . "'",
                    "'" . $_POST['spez_bp_natel'] . "'",
                    "'" . $_POST['spez_bp_mail'] . "'",
                    "'" . $_POST['arzt_name'] . "'",
                    "'" . $_POST['arzt_tel'] . "'",
                    "'" . $_POST['arzt_natel'] . "'",
                    "'" . $_POST['arzt_fax'] . "'",
                    "'" . $_POST['arzt_mail'] . "'",
                    "'" . $_POST['psych_name'] . "'",
                    "'" . $_POST['psych_tel'] . "'",
                    "'" . $_POST['psych_natel'] . "'",
                    "'" . $_POST['psych_mail'] . "'",
                    "'" . $_POST['psych_fax'] . "'",
                    "'" . $_POST['mandat_name'] . "'",
                    "'" . $_POST['mandat_tel'] . "'",
                    "'" . $_POST['mandat_natel'] . "'",
                    "'" . $_POST['mandat_mail'] . "'",
                    "'" . $_POST['mandat_fax'] . "'",
                    "'" . $_POST['mandat_art'] . "'",
                    "'" . $_POST['mandat_adresse'] . "'",
                    "'" . $_POST['extra_name'] . "'",
                    "'" . $_POST['extra_tel'] . "'",
                    "'" . $_POST['extra_natel'] . "'",
                    "'" . $_POST['extra_mail'] . "'",
                    "'" . $_POST['extra_fax'] . "'",
                    "'" . $_POST['extra_art'] . "'",
                    "'" . $_POST['extra_adresse'] . "'",
                    "'" . $_POST['warnzeichen'] . "'",
                    "'" . $_POST['intervention'] . "'",
                    "'" . $_POST['tel'] . "'",
                    "'" . $_POST['natel'] . "'",
                    "'" . $_POST['email'] . "'",
                    "'" . $_POST['wohn_adresse'] . "'",
                    "'" . $_POST['ts_adresse'] . "'",
                    "'" . $_POST['mutter_adresse'] . "'",
                    "'" . $_POST['vater_adresse'] . "'",
                    "'" . $_POST['geschwister_adresse'] . "'",
                    "'" . $_POST['grosseltern_adresse'] . "'",
                    "'" . $_POST['spez_bp_adresse'] . "'",
                    "'" . $_POST['arzt_adresse'] . "'",
                    "'" . $_POST['psych_adresse'] . "'",
                    "'" . $_POST['dent_name'] . "'",
                    "'" . $_POST['dent_tel'] . "'",
                    "'" . $_POST['dent_fax'] . "'",
                    "'" . $_POST['dent_email'] . "'",
                    "'" . $_POST['dent_adresse'] . "'",
                    "'" . $_POST['dent_kommentar'] . "'"
                  ];

        $query = "INSERT INTO clients (" . $fields . ") VALUES (" . join(', ', $values) . ")";

        if ($dbhandle->query($query) === TRUE) {
          echo "<h3 class='text-center'>" . $_POST['vorname'] . " " . $_POST['name'] . " wurde gespeichert.</h3>";
        } else {
          echo "Error: " . $query . "<br>" . $dbhandle->error;
        }

        $dbhandle->close();
      ?>

      <hr />
    </div>
  </body>
</html>
