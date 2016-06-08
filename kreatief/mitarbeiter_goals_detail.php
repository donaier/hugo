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
      $dbhandle = database_connect();
      $ma = get_mitarbeiter($_GET['id']);
      $goal = mysqli_query($dbhandle, "SELECT * FROM ma_goals WHERE mitarbeiter_id=" . $ma['id'] . " AND id=" . $_GET['goal_id'] . " ORDER BY start_date DESC");
      $goal = mysqli_fetch_array($goal);

    ?>

    <div class="container">
      <div class="hidden-print">
        <br />
        <a href="./mitarbeiter_goals.php?id=<?php echo $ma['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
        <div class="btn-toolbar pull-right">
          <a href="javascript:window.print()" class='btn btn-default'><span class='glyphicon glyphicon-print'></span> Drucken</a>
          <a href="./mitarbeiter_goals_edit.php?id=<?php echo $ma['id'] ?>&goal_id=<?php echo $goal['id'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</a>
        </div>
        <hr />
      </div>

      <?php echo "<h4 class='text-center'>" . $ma['vorname'] . " " . $ma['name'] . "</h4>"; ?>
      <h5 class='text-center'>Ziele / Förderplanung</h5>
      <hr />
      <br />
      <h4 class='text-center'><?php echo $goal['title'] ?></h4>
      <h5 class='text-center'><?php echo date('d.m.Y', strtotime($goal['start_date'])) ?></h5>

      <div class="row">
        <div class='col-sm-12'>
          <h5>Welches Ziel will ich erreichen?</h5>
          <p class="text-muted">Formulieren sie Ihr Ziel nach der SMART-Formel. Bei der Formulierung sollte Freude in Ihnen aufkommen.</p>
          <div class='well'>
            <?php echo $goal['v1'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Woran merke ich, dass ich mein Ziel erreicht habe?</h5>
          <div class='well'>
            <?php echo $goal['v2'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Woran merken die anderen, dass ich mein Ziel erreicht habe?</h5>
          <div class='well'>
            <?php echo $goal['v3'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Zielrahmen:</h5>
          <p class="text-muted">Bis wann werde ich mein Ziel erreichen?</p>
          <p class="text-muted">Wo werde ich mein Ziel erreichen?</p>
          <p class="text-muted">Mit wem werde ich mein Ziel erreichen?</p>
          <div class='well'>
            <?php echo $goal['v4'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Was brauche ich, um mein Ziel zu erreichen?</h5>
          <div class='well'>
            <?php echo $goal['v5'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Welche Erfahrungen, Fähigkeiten, Stärken stehen mir zur Verfügung, damit ich mein Ziel erreiche?</h5>
          <div class='well'>
            <?php echo $goal['v6'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Was könnte mich hindern, mein Ziel zu erreichen?</h5>
          <div class='well'>
            <?php echo $goal['v7'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Welche Einwände, Befürchtungen kommen in mir auf, wenn ich an die Umsetzung und das Erreichen meines Zieles denke?</h5>
          <div class='well'>
            <?php echo $goal['v8'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Welche unangenehmen, negativen Folgen sind mit dem Erreichen meines Zieles verbunden?</h5>
          <div class='well'>
            <?php echo $goal['v9'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Was sind die ersten Schritte, um mein Ziel zu erreichen?</h5>
          <div class='well'>
            <?php echo $goal['v10'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Woan merke ich, dass ich auf dem Weg bin, mein Ziel zu erreichen?</h5>
          <div class='well'>
            <?php echo $goal['v11'] ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-12'>
          <h5>Persönliche Bemerkungen:</h5>
          <div class='well'>
            <?php echo $goal['v12'] ?>
          </div>
        </div>
      </div>

      <div class='row'>
        <div class='col-sm-12'>
          <h5>Kommentare / Verlauf:</h5>
          <div class='well'>
            <?php echo $goal['comments'] ?>
          </div>
        </div>
        <div class='col-sm-12'>
          <h5>Auswertung:</h5>
          <div class='well'>
            <?php echo $goal['description'] ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
