<!DOCTYPE html>
<html>
  <head>
    <title>Log gespeichert</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <br />
      <a href="./mitarbeiter.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>Home</a>

      <?php
        include "functions.php";
        $dbhandle = database_connect();

        // mitarbeiter finden und anzeigen
        $ma = get_mitarbeiter($_POST['ma_id']);

        // log speichern
        $start_date = $_POST['syear'] . '-' . $_POST['smonth'] . '-' . $_POST['sday'];
        $title = $_POST['title'];
        $description = mysql_real_escape_string($_POST['description']);
        $comments = mysql_real_escape_string($_POST['comments']);

        $key_value_pairs = [
                            "start_date='" . $start_date . "', ",
                            "title='" . $title . "', ",
                            "description='" . $description . "', ",
                            "comments='" . $comments . "', ",
                            "status='" . $_POST['status'] . "', ",
                            "v1='" . mysql_real_escape_string($_POST['1']) . "', ",
                            "v2='" . mysql_real_escape_string($_POST['2']) . "', ",
                            "v3='" . mysql_real_escape_string($_POST['3']) . "', ",
                            "v4='" . mysql_real_escape_string($_POST['4']) . "', ",
                            "v5='" . mysql_real_escape_string($_POST['5']) . "', ",
                            "v6='" . mysql_real_escape_string($_POST['6']) . "', ",
                            "v7='" . mysql_real_escape_string($_POST['7']) . "', ",
                            "v8='" . mysql_real_escape_string($_POST['8']) . "', ",
                            "v9='" . mysql_real_escape_string($_POST['9']) . "', ",
                            "v10='" . mysql_real_escape_string($_POST['10']) . "', ",
                            "v11='" . mysql_real_escape_string($_POST['11']) . "', ",
                            "v12='" . mysql_real_escape_string($_POST['12']) . "'"
                            ];

        $post_query = "UPDATE ma_goals SET " . join($key_value_pairs) . " WHERE `ma_goals`.`id` = " . $_GET['id'] . "";

        if ($dbhandle->query($post_query) === TRUE) {
          echo "<h3 class='text-center'>Ziel wurde gespeichert.</h3>";
          echo "<a href='./mitarbeiter_goals.php?id=" . $ma['id'] . "' class='btn btn-primary'><span class='glyphicon glyphicon-chevron-left'></span>Ziele von " . $ma['vorname'] . " " . $ma['nachname'] . "</a>";
        } else {
          echo "Error: " . $post_query . "<br>" . $dbhandle->error;
        }

        $dbhandle->close();
      ?>

      <hr />
    </div>
  </body>
</html>
