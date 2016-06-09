<!DOCTYPE html>
<html>
  <head>
    <title>LHM Mitarbeiter</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
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

      $oldest_log = get_oldest_log_date($ma['id']);
    ?>

    <div class="container">
      <div class='hidden-print'>
        <br />
        <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Zurück</a>
        <div class='btn-toolbar pull-right'>
          <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#filterarea" aria-expanded="false" aria-controls="collapseExample">
            <span class="glyphicon glyphicon-filter"></span>
            Filter
          </button>
          <a href="javascript:window.print()" class='btn btn-default'><span class='glyphicon glyphicon-print'></span> Drucken</a>
          <a href="./mitarbeiter_log_new.php?id=<?php echo $ma['id'] ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> neuer Eintrag</a>
        </div>
        <hr />
        <div class="collapse" id="filterarea">
          <h4>Filter:</h4>
          <form class="form" method="POST" action="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>">
            Hier ist noch nicht fertig!! -- Von:
            <select name="von_day">
              <?php 
                for ($d=1; $d <= 31; $d++) {
                  if ($d == date('j', $oldest_log)) {
                    echo "<option value='$d' selected>$d.</option>";
                  } else {
                    echo "<option value='$d'>$d.</option>";
                  }
                }
              ?>
            </select>
            <select name="von_month">
              <?php
                for ($m=1; $m <= 12 ; $m++) { 
                  if ($m == date('n', $oldest_log)) {
                    echo "<option value='$m' selected>$m.</option>";
                  } else {
                    echo "<option value='$m'>$m.</option>";
                  }
                }
              ?>
            </select>
            <select name="von_year">
              <?php
                for ($y=2016; $y < 2099; $y++) { 
                  if ($y == date('Y', $oldest_log)) {
                    echo "<option value='$y' selected>$y.</option>";
                  } else {
                    echo "<option value='$y'>$y.</option>";
                  }
                }
              ?>
            </select>
            <br>
            Hier ist noch nicht fertig!! -- Bis:
            <select name="bis_day">
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
            <select name="bis_month">
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
            <select name="bis_year">
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
            <br>
            <br>
            <div class="radio">
              <label>
                <input type="radio" name="sort_order" id="sort_default" value="DESC" checked>
                <span class="glyphicon glyphicon-sort-by-attributes"></span> Neueste zuerst
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="sort_order" id="sort_reverse" value="ASC">
                <span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Älteste zuerst
              </label>
            </div>
            <br>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="allgemein"><label class='label label-default'><span class='glyphicon glyphicon-user'></span></label> Allgemein
              </label>
            </div>
            <div class="checkbox">
              <label>              
                <input type="checkbox" name="gesundheit"><label class='label label-danger'><span class='glyphicon glyphicon-heart'></span></label> Gesundheit
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="arbeit"><label class='label label-primary'><span class='glyphicon glyphicon-briefcase'></span></label> Arbeit/IB
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="foerderplanung"><label class='label label-success'><span class='glyphicon glyphicon-flag'></span></label> Förderplanung
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="psychisch"><label class='label label-info'><span class='glyphicon glyphicon-adjust'></span></label> psychische Befindlichkeit
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="vernetzung"><label class='label label-warning'><span class='glyphicon glyphicon-transfer'></span></label> Vernetzungsarbeit
              </label>
            </div>
            <br>
            <input type="submit" value="Filter anwenden" class="btn btn-success"></input>

          </form>
          <hr />
        </div>
      </div>

      <h3 class='text-center'><?php echo $ma['vorname'] . " " . $ma['name']; ?></h3>
      <h5 class='text-center'>Logbuch</h5>
      
      <?php if (!isset($_POST['sort_order'])) { ?>
        <hr>
        <div class="text-center log-category-buttons">
          <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>" class="btn btn-default <?php echo log_category_class('all') ?>"><span class='glyphicon glyphicon-th-large'></span> Alle Einträge</a>
          <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>&log_category=allgemein" class="btn btn-default <?php echo log_category_class('allgemein') ?>"><label class='label label-default'><span class='glyphicon glyphicon-user'></span></label> Allgemein</a>
          <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>&log_category=gesundheit" class="btn btn-default <?php echo log_category_class('gesundheit') ?>"><label class='label label-danger'><span class='glyphicon glyphicon-heart'></span></label> Gesundheit</a>
          <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>&log_category=arbeit" class="btn btn-default <?php echo log_category_class('arbeit') ?>"><label class='label label-primary'><span class='glyphicon glyphicon-briefcase'></span></label> Arbeit/IB</a>
          <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>&log_category=foerderplanung" class="btn btn-default <?php echo log_category_class('foerderplanung') ?>"><label class='label label-success'><span class='glyphicon glyphicon-flag'></span></label> Förderplanung</a>
          <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>&log_category=psychisch" class="btn btn-default <?php echo log_category_class('psychisch') ?>"><label class='label label-info'><span class='glyphicon glyphicon-adjust'></span></label> psychische Befindlichkeit</a>
          <a href="./mitarbeiter_log.php?id=<?php echo $ma['id'] ?>&log_category=vernetzung" class="btn btn-default <?php echo log_category_class('vernetzung') ?>"><label class='label label-warning'><span class='glyphicon glyphicon-transfer'></span></label> Vernetzungsarbeit</a>
          <br>
          <br>
        </div>
      <?php }  ?>

      <?php 
        // neuer log speichern (wenn post)

        if (isset($_POST['log'])) {
          $date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
          $log = mysql_real_escape_string($_POST['log']);
          $creator = $_POST['betreuer'];
          $category = join(' ', $_POST['kategorie']);

          $fields = 'mitarbeiter_id, date, category, log, creator';
          $values = [
                      "'" . $_GET['id'] . "'",
                      "'" . $date . "'",
                      "'" . $category . "'",
                      "'" . $log . "'",
                      "'" . $creator . "'"
                    ];

          $post_query = "INSERT INTO ma_logs (" . $fields . ") VALUES (" . join(', ', $values) . ")";

          if ($dbhandle->query($post_query) === TRUE) {
            // worked
          } else {
            echo "Error: " . $post_query . "<br>" . $dbhandle->error;
          }
        }
      ?>

      <?php
        // logs des mitarbeiters anzeigen
        if (isset($_GET['log_category'])) {
          // filterung mit buttons
          $log_query = "SELECT * FROM ma_logs WHERE mitarbeiter_id=" . $_GET['id'] . " AND category LIKE '%" . $_GET['log_category'] . "%' ORDER BY date DESC";
        } else if (isset($_POST['sort_order'])) {
          // filterung mit filteroptionen
          $log_query = build_query_from_filter($_POST, $ma['id']);
        } else {
          // keine filterung
          $log_query = "SELECT * FROM ma_logs WHERE mitarbeiter_id=" . $_GET['id'] . " ORDER BY date DESC";
        }
        $log_data = mysqli_query($dbhandle, $log_query);

        echo "<table class='table'>";
          while ($log = mysqli_fetch_array($log_data)) {
            echo "<tr>";
            echo "<td>";
            if (strpos($log['category'], 'allgemein') !== false) {
              echo "<label class='label label-default'><span class='glyphicon glyphicon-user'></span></label>";
              echo "<br />";
            }
            if (strpos($log['category'], 'gesundheit') !== false) {
              echo "<label class='label label-danger'><span class='glyphicon glyphicon-heart'></span></label>";
              echo "<br />";
            }
            if (strpos($log['category'], 'arbeit') !== false) {
              echo "<label class='label label-primary'><span class='glyphicon glyphicon-briefcase'></span></label>";
              echo "<br />";
            }
            if (strpos($log['category'], 'foerderplanung') !== false) {
              echo "<label class='label label-success'><span class='glyphicon glyphicon-flag'></span></label>";
              echo "<br />";
            }
            if (strpos($log['category'], 'psychisch') !== false) {
              echo "<label class='label label-info'><span class='glyphicon glyphicon-adjust'></span></label>";
              echo "<br />";
            }
            if (strpos($log['category'], 'vernetzung') !== false) {
              echo "<label class='label label-warning'><span class='glyphicon glyphicon-transfer'></span></label>";
            }
            echo "</td>";
            echo "<td><strong>" . date('d.m.Y', strtotime($log['date'])) . "</strong><br />" . wochentag($log['date']) . "</td>";
            echo "<td>" . $log['log'] . "</td>";
            echo "<td>" . $log['creator'] . "</td>";
            echo "<td><a href='mitarbeiter_log_edit.php?id=" . $_GET['id'] . "&log_id=" . $log[0] . "' class='button button-primary'><i class='glyphicon glyphicon-pencil'></i></a></td>";
            echo "</tr>";
          }
        echo "</table>";
      ?>
    </div>
  </body>
</html>
