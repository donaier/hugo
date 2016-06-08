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
          <a href="./mitarbeiter_goals.php?id=<?php echo $ma['id'] ?>" class="btn btn-default pull-right"><span class="glyphicon glyphicon-flag"></span> Ziele</a>
        </div>
        <hr />
      </div>

      <?php echo "<h3 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h3>"; ?>
      <h5 class='text-center'>Ziele / Förderplanung</h5>
      <hr />

      <form action="./mitarbeiter_goals.php?id=<?php echo $_GET['id'] ?>" method="POST" class="form-horizontal">
        <input name="ma_id" value="<?php echo $ma['id'] ?>" class="hidden"></input>
        
        <div class="form-group">
          <label for="title" class="col-sm-3 control-label">Titel:</label>
          <div class="col-sm-9">
            <input class="form-control" name="title"></input>
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Startdatum:</label>
          <div class="col-sm-9">

            <select name="sday">
              <?php 
                for ($d=1; $d <= 31; $d++) {
                  if ($d == date('j')) {
                    echo "<option selected value='$d'>$d.</option>";
                  } else {
                    echo "<option value='$d'>$d.</option>";
                  }
                }
              ?>
            </select>
            <select name="smonth">
              <?php
                for ($m=1; $m <= 12 ; $m++) { 
                  if ($m == date('n')) {
                    echo "<option selected value='$m'>$m.</option>";
                  } else {
                    echo "<option value='$m'>$m.</option>";
                  }
                }
              ?>
            </select>
            <select name="syear">
              <?php
                for ($y=2016; $y < 2099; $y++) { 
                  if ($y == date('o')) {
                    echo "<option selected value='$y'>$y</option>";
                  } else {
                    echo "<option value='$y'>$y</option>";
                  }
                }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">
            Welches Ziel will ich erreichen?
            <p class="text-muted">Formulieren sie Ihr Ziel nach der SMART-Formel. Bei der Formulierung sollte Freude in Ihnen aufkommen.</p>
          </label>
          <div class="col-sm-9">
            <textarea name="1" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Woran merke ich, dass ich mein Ziel erreicht habe?</label>
          <div class="col-sm-9">
            <textarea name="2" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Woran merken die anderen, dass ich mein Ziel erreicht habe?</label>
          <div class="col-sm-9">
            <textarea name="3" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">
            Zielrahmen:
            <p class="text-muted">Bis wann werde ich mein Ziel erreichen?</p>
            <p class="text-muted">Wo werde ich das Ziel erreichen?</p>
            <p class="text-muted">Mit wem werde ich das Ziel erreichen?</p>
          </label>
          <div class="col-sm-9">
            <textarea name="4" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Was brauche ich, um mein Ziel zu erreichen?</label>
          <div class="col-sm-9">
            <textarea name="5" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Welche Erfahrungen, Fähigkeiten, Stärken stehen mir zur Verfügung, damit ich mein Ziel erreiche?</label>
          <div class="col-sm-9">
            <textarea name="6" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Was könnte mich hindern, mein Ziel zu erreichen?</label>
          <div class="col-sm-9">
            <textarea name="7" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Welche Einwände, Befürchtungen kommen in mir auf, wenn ich an die Umsetzung und das Erreichen meines Zieles denke?</label>
          <div class="col-sm-9">
            <textarea name="8" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Welche unangenehmen, negativen Folgen sind mit den Erreichen meines Zieles verbunden?</label>
          <div class="col-sm-9">
            <textarea name="9" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Was sind die ersten Schritte, um mein Ziel zu erreichen?</label>
          <div class="col-sm-9">
            <textarea name="10" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Woran merke ich, dass ich auf dem Weg bin, mein Ziel zu erreichen?</label>
          <div class="col-sm-9">
            <textarea name="11" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Persönliche Bemerkungen:</label>
          <div class="col-sm-9">
            <textarea name="12" class="form-control" rows="6"></textarea>
          </div>
        </div>

        <hr>
        <div class="form-group">
          <label for="comments" class="col-sm-3 control-label">Kommentare / Verlauf:</label>
          <div class="col-sm-9">
            <textarea name="comments" class="form-control" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Auswertung:</label>
          <div class="col-sm-9">
            <textarea name="description" class="form-control" rows="6"></textarea>
          </div>
        </div>
        
        <input type="submit" value="Speichern" class="btn btn-success pull-right" />
        <br />
        <br />
        <br />
      </form>
      </hr>
    </div>
  </body>
</html>
