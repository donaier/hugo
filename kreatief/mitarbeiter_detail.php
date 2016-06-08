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
    <?php
      include "functions.php";
      $ma = get_mitarbeiter($_GET['id']);
    ?>

    <div class="container">
      <div class="hidden-print">
        <br />
        <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
        <div class="btn-toolbar pull-right">
          <a href="javascript:window.print()" class='btn btn-default'><span class='glyphicon glyphicon-print'></span> Drucken</a>
          <div class='btn-group'>
            <?php if ($ma['status'] == 'active'): ?>
              <a href="./mitarbeiter_switch_status.php?id=<?php echo $ma['id'] ?>" class='btn btn-default'><span class='glyphicon glyphicon-paste'></span> Deaktivieren</a>
            <?php else: ?>
              <a href="./mitarbeiter_switch_status.php?id=<?php echo $ma['id'] ?>" class='btn btn-default'><span class='glyphicon glyphicon-copy'></span> Aktivieren</a>
            <?php endif ?>
            <a href="./mitarbeiter_edit.php?id=<?php echo $ma['id'] ?>" class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span> Bearbeiten</a>
          </div>
        </div>
        <hr />

        <?php echo "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h3>"; ?>

        <p class='text-center'>
          Aktualisiert am: 
          <?php echo date('d.m.Y', strtotime($ma['updated_at'])) ?>
        </p>
        <hr />
      </div>
      <div class="visible-print-block">
        <?php echo "<h4>" . $ma['vorname'] . " " . $ma['name'] . "</h4>"; ?>
        <p>
          Aktualisiert am: 
          <?php echo date('d.m.Y', strtotime($ma['updated_at'])) ?>
        </p>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-info">
            <div class="panel-heading">Merkmale:</div>
            <div class="panel-body">
              <div class="row">
                <p class="col-sm-2">Tel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['tel'] ?>
                </p>
                <p class="col-sm-2">Augenfarbe:</p>
                <p class="col-sm-4">
                  <?php echo $ma['augenfarbe'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Natel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['natel'] ?>
                </p>
                <p class="col-sm-2">Haarfarbe:</p>
                <p class="col-sm-4">
                  <?php echo $ma['haarfarbe'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Email:</p>
                <p class="col-sm-4">
                  <?php echo $ma['email'] ?>
                </p>
                <p class="col-sm-2">Blutdruck:</p>
                <p class="col-sm-4">
                  <?php echo $ma['blutdruck'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Geburtsdatum:</p>
                <p class="col-sm-4">
                  <?php echo date('d.m.Y', strtotime($ma['date_of_birth'])) ?>
                </p>
                <p class="col-sm-2">Puls:</p>
                <p class="col-sm-4">
                  <?php echo $ma['puls'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Grösse:</p>
                <p class="col-sm-4">
                  <?php echo $ma['groesse'] ?>
                </p>
                <p class="col-sm-2">Blutgruppe:</p>
                <p class="col-sm-4">
                  <?php echo $ma['blutgruppe'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Gewicht:</p>
                <p class="col-sm-4">
                  <?php echo $ma['gewicht'] ?>
                </p>
                <p class="col-sm-2">Dat. Tetanusimpfung:</p>
                <p class="col-sm-4">
                  <?php echo $ma['tetanus'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Bes. Merkmale:</p>
                <p class="col-sm-10">
                  <?php echo nl2br($ma['bes_merkmale']) ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">Wohnsituation:</div>
            <div class="panel-body">
              <div class="row">
                <p class="col-sm-4">Wohngruppe:</p>
                <p class="col-sm-8">
                  <?php echo $ma['wohngruppe'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Bezugspers:</p>
                <p class="col-sm-8">
                  <?php echo $ma['wohn_bezugsperson'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Tel:</p>
                <p class="col-sm-8">
                  <?php echo $ma['wohn_tel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Fax:</p>
                <p class="col-sm-8">
                  <?php echo $ma['wohn_fax'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Mail:</p>
                <p class="col-sm-8">
                  <?php echo $ma['wohn_mail'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Adresse:</p>
                <p class="col-sm-8">
                  <?php echo nl2br($ma['wohn_adresse']) ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">Arbeitssituation:</div>
            <div class="panel-body">
              <div class="row">
                <p class="col-sm-4">Tagesstruktur:</p>
                <p class="col-sm-8">
                  <?php echo $ma['tagesstruktur'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Bezugspers:</p>
                <p class="col-sm-8">
                  <?php echo $ma['ts_bezugsperson'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Tel:</p>
                <p class="col-sm-8">
                  <?php echo $ma['ts_tel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Fax:</p>
                <p class="col-sm-8">
                  <?php echo $ma['ts_fax'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Mail:</p>
                <p class="col-sm-8">
                  <?php echo $ma['ts_mail'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Adresse:</p>
                <p class="col-sm-8">
                  <?php echo nl2br($ma['ts_adresse']) ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-info">
            <div class="panel-heading">Angehörige:</div>
            <div class="panel-body">
              <div class="row">
                <p class="col-sm-2"><strong>Mutter:</strong></p>
                <p class="col-sm-4">
                  <?php echo $ma['mutter'] ?>
                </p>
                <p class="col-sm-2"><strong>Vater:</strong></p>
                <p class="col-sm-4">
                  <?php echo $ma['vater'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Tel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['mutter_tel'] ?>
                </p>
                <p class="col-sm-2">Tel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['vater_tel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Natel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['mutter_natel'] ?>
                </p>
                <p class="col-sm-2">Natel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['vater_natel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Mail:</p>
                <p class="col-sm-4">
                  <?php echo $ma['mutter_mail'] ?>
                </p>
                <p class="col-sm-2">Mail:</p>
                <p class="col-sm-4">
                  <?php echo $ma['vater_mail'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Adresse:</p>
                <p class="col-sm-4">
                  <?php echo nl2br($ma['mutter_adresse']) ?>
                </p>
                <p class="col-sm-2">Adresse:</p>
                <p class="col-sm-4">
                  <?php echo nl2br($ma['vater_adresse']) ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-12"></p>
              </div>
              <div class="row">
                <p class="col-sm-2"><strong>Geschwister:</strong></p>
                <p class="col-sm-4">
                  <?php echo $ma['geschwister'] ?>
                </p>
                <p class="col-sm-2"><strong>Grosseltern:</strong></p>
                <p class="col-sm-4">
                  <?php echo $ma['grosseltern'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Tel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['geschwister_tel'] ?>
                </p>
                <p class="col-sm-2">Tel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['grosseltern_tel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Natel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['geschwister_natel'] ?>
                </p>
                <p class="col-sm-2">Natel:</p>
                <p class="col-sm-4">
                  <?php echo $ma['grosseltern_natel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Mail:</p>
                <p class="col-sm-4">
                  <?php echo $ma['geschwister_mail'] ?>
                </p>
                <p class="col-sm-2">Mail:</p>
                <p class="col-sm-4">
                  <?php echo $ma['grosseltern_mail'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-2">Adresse:</p>
                <p class="col-sm-4">
                  <?php echo nl2br($ma['geschwister_adresse']) ?>
                </p>
                <p class="col-sm-2">Adresse:</p>
                <p class="col-sm-4">
                  <?php echo nl2br($ma['grosseltern_adresse']) ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">Spez. Bezugspersonen:</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <p class="col-sm-4">Name:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['spez_bp_name'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Tel:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['spez_bp_tel'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Natel:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['spez_bp_natel'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Mail:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['spez_bp_mail'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Adresse:</p>
                    <p class="col-sm-8">
                      <?php echo nl2br($ma['spez_bp_adresse']) ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">Zahnarzt:</div>
            <div class="panel-body">
              <div class="row">
                <p class="col-sm-4">Name:</p>
                <p class="col-sm-8">
                  <?php echo $ma['dent_name'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Tel:</p>
                <p class="col-sm-8">
                  <?php echo $ma['dent_tel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Fax:</p>
                <p class="col-sm-8">
                  <?php echo $ma['dent_fax'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Mail:</p>
                <p class="col-sm-8">
                  <?php echo $ma['dent_email'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Adresse:</p>
                <p class="col-sm-8">
                  <?php echo nl2br($ma['dent_adresse']) ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Kommentar/Termine:</p>
                <p class="col-sm-8">
                  <?php echo nl2br($ma['dent_kommentar']) ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">Arzt:</div>
            <div class="panel-body">
              <div class="row">
                <p class="col-sm-4">Name:</p>
                <p class="col-sm-8">
                  <?php echo $ma['arzt_name'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Tel:</p>
                <p class="col-sm-8">
                  <?php echo $ma['arzt_tel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Natel:</p>
                <p class="col-sm-8">
                  <?php echo $ma['arzt_natel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Mail:</p>
                <p class="col-sm-8">
                  <?php echo $ma['arzt_mail'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Fax:</p>
                <p class="col-sm-8">
                  <?php echo $ma['arzt_fax'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Adresse:</p>
                <p class="col-sm-8">
                  <?php echo nl2br($ma['arzt_adresse']) ?>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">Psychiater / Therapeut:</div>
            <div class="panel-body">
              <div class="row">
                <p class="col-sm-4">Name:</p>
                <p class="col-sm-8">
                  <?php echo $ma['psych_name'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Tel:</p>
                <p class="col-sm-8">
                  <?php echo $ma['psych_tel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Natel:</p>
                <p class="col-sm-8">
                  <?php echo $ma['psych_natel'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Mail:</p>
                <p class="col-sm-8">
                  <?php echo $ma['psych_mail'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Fax:</p>
                <p class="col-sm-8">
                  <?php echo $ma['psych_fax'] ?>
                </p>
              </div>
              <div class="row">
                <p class="col-sm-4">Adresse:</p>
                <p class="col-sm-8">
                  <?php echo nl2br($ma['psych_adresse']) ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-info">
            <div class="panel-heading">MandatsträgerIn:</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <p class="col-sm-4">Name:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['mandat_name'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Tel:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['mandat_tel'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Natel:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['mandat_natel'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Mail:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['mandat_mail'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Fax:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['mandat_fax'] ?>
                    </p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="row">
                    <p class="col-sm-4">Art:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['mandat_art'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Adresse:</p>
                    <p class="col-sm-8">
                      <?php echo nl2br($ma['mandat_adresse']) ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-info">
            <div class="panel-heading">Zusätzlicher Kontakt:</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <p class="col-sm-4">Name:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['extra_name'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Tel:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['extra_tel'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Natel:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['extra_natel'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Mail:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['extra_mail'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Fax:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['extra_fax'] ?>
                    </p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="row">
                    <p class="col-sm-4">Art:</p>
                    <p class="col-sm-8">
                      <?php echo $ma['extra_art'] ?>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-4">Adresse:</p>
                    <p class="col-sm-8">
                      <?php echo nl2br($ma['extra_adresse']) ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">Frühwarnzeichen:</div>
            <div class="panel-body">
              <?php echo nl2br($ma['warnzeichen']) ?>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">Procedere Krisenintervention:</div>
            <div class="panel-body">
              <?php echo nl2br($ma['intervention']) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
