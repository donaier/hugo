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
        $key_value_pairs = [
                    "updated_at='" . date('Y-m-d') . "', ",
                    "name='" . $_POST['name'] . "', ",
                    "vorname='" . $_POST['vorname'] . "', ",
                    "date_of_birth='" . $_POST['birth_year'] . "-" . $_POST['birth_month'] . "-" . $_POST['birth_day'] . "', ",
                    "augenfarbe='" . $_POST['augenfarbe'] . "', ",
                    "haarfarbe='" . $_POST['haarfarbe'] . "', ",
                    "groesse='" . $_POST['groesse'] . "', ",
                    "gewicht='" . $_POST['gewicht'] . "', ",
                    "blutdruck='" . $_POST['blutdruck'] . "', ",
                    "puls='" . $_POST['puls'] . "', ",
                    "blutgruppe='" . $_POST['blutgruppe'] . "', ",
                    "tetanus='" . $_POST['tetanus'] . "', ",
                    "bes_merkmale='" . $_POST['bes_merkmale'] . "', ",
                    "wohngruppe='" . $_POST['wohngruppe'] . "', ",
                    "wohn_bezugsperson='" . $_POST['wohn_bezugsperson'] . "', ",
                    "wohn_tel='" . $_POST['wohn_tel'] . "', ",
                    "wohn_fax='" . $_POST['wohn_fax'] . "', ",
                    "wohn_mail='" . $_POST['wohn_mail'] . "', ",
                    "tagesstruktur='" . $_POST['tagesstruktur'] . "', ",
                    "ts_bezugsperson='" . $_POST['ts_bezugsperson'] . "', ",
                    "ts_tel='" . $_POST['ts_tel'] . "', ",
                    "ts_fax='" . $_POST['ts_fax'] . "', ",
                    "ts_mail='" . $_POST['ts_mail'] . "', ",
                    "mutter='" . $_POST['mutter'] . "', ",
                    "mutter_tel='" . $_POST['mutter_tel'] . "', ",
                    "mutter_natel='" . $_POST['mutter_natel'] . "', ",
                    "mutter_mail='" . $_POST['mutter_mail'] . "', ",
                    "vater='" . $_POST['vater'] . "', ",
                    "vater_tel='" . $_POST['vater_tel'] . "', ",
                    "vater_natel='" . $_POST['vater_natel'] . "', ",
                    "vater_mail='" . $_POST['vater_mail'] . "', ",
                    "geschwister='" . $_POST['geschwister'] . "', ",
                    "geschwister_tel='" . $_POST['geschwister_tel'] . "', ",
                    "geschwister_natel='" . $_POST['geschwister_natel'] . "', ",
                    "geschwister_mail='" . $_POST['geschwister_mail'] . "', ",
                    "grosseltern='" . $_POST['grosseltern'] . "', ",
                    "grosseltern_tel='" . $_POST['grosseltern_tel'] . "', ",
                    "grosseltern_natel='" . $_POST['grosseltern_natel'] . "', ",
                    "grosseltern_mail='" . $_POST['grosseltern_mail'] . "', ",
                    "spez_bp_name='" . $_POST['spez_bp_name'] . "', ",
                    "spez_bp_tel='" . $_POST['spez_bp_tel'] . "', ",
                    "spez_bp_natel='" . $_POST['spez_bp_natel'] . "', ",
                    "spez_bp_mail='" . $_POST['spez_bp_mail'] . "', ",
                    "arzt_name='" . $_POST['arzt_name'] . "', ",
                    "arzt_tel='" . $_POST['arzt_tel'] . "', ",
                    "arzt_natel='" . $_POST['arzt_natel'] . "', ",
                    "arzt_fax='" . $_POST['arzt_fax'] . "', ",
                    "arzt_mail='" . $_POST['arzt_mail'] . "', ",
                    "psych_name='" . $_POST['psych_name'] . "', ",
                    "psych_tel='" . $_POST['psych_tel'] . "', ",
                    "psych_natel='" . $_POST['psych_natel'] . "', ",
                    "psych_mail='" . $_POST['psych_mail'] . "', ",
                    "psych_fax='" . $_POST['psych_fax'] . "', ",
                    "mandat_name='" . $_POST['mandat_name'] . "', ",
                    "mandat_tel='" . $_POST['mandat_tel'] . "', ",
                    "mandat_natel='" . $_POST['mandat_natel'] . "', ",
                    "mandat_mail='" . $_POST['mandat_mail'] . "', ",
                    "mandat_fax='" . $_POST['mandat_fax'] . "', ",
                    "mandat_art='" . $_POST['mandat_art'] . "', ",
                    "mandat_adresse='" . $_POST['mandat_adresse'] . "', ",
                    "extra_name='" . $_POST['extra_name'] . "', ",
                    "extra_tel='" . $_POST['extra_tel'] . "', ",
                    "extra_natel='" . $_POST['extra_natel'] . "', ",
                    "extra_mail='" . $_POST['extra_mail'] . "', ",
                    "extra_fax='" . $_POST['extra_fax'] . "', ",
                    "extra_art='" . $_POST['extra_art'] . "', ",
                    "extra_adresse='" . $_POST['extra_adresse'] . "', ",
                    "warnzeichen='" . $_POST['warnzeichen'] . "', ",
                    "intervention='" . $_POST['intervention'] . "', ",
                    "tel='" . $_POST['tel'] . "', ",
                    "natel='" . $_POST['natel'] . "', ",
                    "email='" . $_POST['email'] . "', ",
                    "wohn_adresse='" . $_POST['wohn_adresse'] . "', ",
                    "ts_adresse='" . $_POST['ts_adresse'] . "', ",
                    "mutter_adresse='" . $_POST['mutter_adresse'] . "', ",
                    "vater_adresse='" . $_POST['vater_adresse'] . "', ",
                    "geschwister_adresse='" . $_POST['geschwister_adresse'] . "', ",
                    "grosseltern_adresse='" . $_POST['grosseltern_adresse'] . "', ",
                    "spez_bp_adresse='" . $_POST['spez_bp_adresse'] . "', ",
                    "arzt_adresse='" . $_POST['arzt_adresse'] . "', ",
                    "psych_adresse='" . $_POST['psych_adresse'] . "', ",
                    "dent_name='" . $_POST['dent_name'] . "', ",
                    "dent_tel='" . $_POST['dent_tel'] . "', ",
                    "dent_fax='" . $_POST['dent_fax'] . "', ",
                    "dent_email='" . $_POST['dent_email'] . "', ",
                    "dent_adresse='" . $_POST['dent_adresse'] . "', ",
                    "dent_kommentar='" . $_POST['dent_kommentar'] . "'"
                  ];

        $query = "UPDATE `clients` SET " . join($key_value_pairs) . " WHERE `clients`.`id` = " . $_POST['id'];

        if ($dbhandle->query($query) === TRUE) {
          echo "<h3 class='text-center'>" . $_POST['vorname'] . " " . $_POST['name'] . " wurde aktualisiert.</h3>";
        } else {
          echo "Error: " . $query . "<br>" . $dbhandle->error;
        }

        $dbhandle->close();
      ?>

      <hr />
    </div>
  </body>
</html>
