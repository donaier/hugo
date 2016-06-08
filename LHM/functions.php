<?php 
  // sonderzeichen eliminieren
  function sonderzeichen($string) {

   $string = str_replace("ä", "ae", $string);
   $string = str_replace("ü", "ue", $string);
   $string = str_replace("ö", "oe", $string);
   $string = str_replace("Ä", "Ae", $string);
   $string = str_replace("Ü", "Ue", $string);
   $string = str_replace("Ö", "Oe", $string);
   return $string;
  }

  // db connect und lhm auswàhlen
  function database_connect() {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lhm";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }

  function get_mitarbeiter($id = null) {
    $dbhandle = database_connect();

    if ($id == null) {
      $ma = mysqli_query($dbhandle, "SELECT * FROM mitarbeiter ORDER BY nachname ASC");
    } else {
      $ma = mysqli_query($dbhandle, "SELECT * FROM mitarbeiter WHERE id=" . $id);
      $ma = mysqli_fetch_array($ma);
    }
    
    $dbhandle->close();

    return $ma;
  }

 function get_active_mitarbeiter() {
    $dbhandle = database_connect();
    $ma = mysqli_query($dbhandle, "SELECT id, vorname, nachname FROM mitarbeiter WHERE status='active'");
    $dbhandle->close();

    return $ma;
  }

  function get_inactive_mitarbeiter() {
    $dbhandle = database_connect();
    $ma = mysqli_query($dbhandle, "SELECT id, vorname, nachname FROM mitarbeiter WHERE status='inactive'");
    $dbhandle->close();

    return $ma;
  }

  function get_mitarbeiter_goals($ma_id, $status = null) {
    $dbhandle = database_connect();
    if ($status == null) {
      $goals = mysqli_query($dbhandle, "SELECT * FROM ma_goals WHERE mitarbeiter_id=" . $ma_id . " ORDER BY start_date DESC");
    } else {
      $goals = mysqli_query($dbhandle, "SELECT * FROM ma_goals WHERE mitarbeiter_id=" . $ma_id . " AND status='" . $status . "' ORDER BY start_date DESC");
    }
    $dbhandle->close();

    return $goals;
  }

  function get_medis($ma_id) {
    $dbhandle = database_connect();

    $medis = mysqli_query($dbhandle, "SELECT * FROM ma_medis WHERE ma_id=" . $ma_id . " ORDER BY status");
    
    $dbhandle->close();

    return $medis;
  }

  function get_latest_ibb_date($ma_id) {
    $dbhandle = database_connect();
    $latest_ibb = mysqli_query($dbhandle, "SELECT created_at FROM ibb_values WHERE mitarbeiter_id=" . $ma_id . " ORDER BY created_at DESC");
    $latest_ibb = mysqli_fetch_array($latest_ibb);
    $dbhandle->close();

    return strtotime($latest_ibb[0]);
  }

  function get_latest_log_date($ma_id) {
    $dbhandle = database_connect();
    $latest_log = mysqli_query($dbhandle, "SELECT date FROM ma_logs WHERE mitarbeiter_id=" . $ma_id . " ORDER BY date DESC");
    $latest_log = mysqli_fetch_array($latest_log);
    $dbhandle->close();

    return strtotime($latest_log[0]);
  }

  function wochentag($datestring) {
    switch (date('N', strtotime($datestring))) {
      case 1:
        return 'Montag';
        break;
      case 2:
        return 'Dienstag';
        break;
      case 3:
        return 'Mittwoch';
        break;
      case 4:
        return 'Donnerstag';
        break;
      case 5:
        return 'Freitag';
        break;
      case 6:
        return 'Samstag';
        break;
      case 7:
        return 'Sonntag';
        break;
      
      default:
        return 'Tag';
        break;
    }
  }
?>
