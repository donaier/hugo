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

  // db connect und kreatief auswählen
  function database_connect() {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kreatief";

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
      $ma = mysqli_query($dbhandle, "SELECT * FROM clients ORDER BY status, name ASC");
    } else {
      $ma = mysqli_query($dbhandle, "SELECT * FROM clients WHERE id=" . $id);
      $ma = mysqli_fetch_array($ma);
    }
    
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
    // todo rework mebe - not in use
    $dbhandle = database_connect();
    $latest_ibb = mysqli_query($dbhandle, "SELECT created_at FROM ibb_values WHERE mitarbeiter_id=" . $ma_id . " ORDER BY created_at DESC");
    $latest_ibb = mysqli_fetch_array($latest_ibb);
    $dbhandle->close();

    return strtotime($latest_ibb[0]);
  }

  function get_oldest_log_date($ma_id) {
    $dbhandle = database_connect();
    $oldest_log = mysqli_query($dbhandle, "SELECT date FROM ma_logs WHERE mitarbeiter_id=" . $ma_id . " ORDER BY date ASC");
    $oldest_log = mysqli_fetch_array($oldest_log);
    $dbhandle->close();
    return strtotime($oldest_log['date']);
  }

  function get_ibb($ma_id, $status = 'active') {
    $dbhandle = database_connect();
    $ibb = mysqli_query($dbhandle, "SELECT * FROM ma_ibb WHERE mitarbeiter_id=" . $ma_id . " AND status='" . $status . "' ORDER BY created_at DESC");
    $dbhandle->close();

    return $ibb;
  }

  function get_one_ibb($id) {
    $dbhandle = database_connect();
    $ibb = mysqli_query($dbhandle, "SELECT * FROM ma_ibb WHERE id=" . $id);
    $ibb = mysqli_fetch_array($ibb);
    $dbhandle->close();

    return $ibb;  
  }

  function build_query_from_filter($post_hash, $ma_id) {
    $start_date = $_POST['von_year'] . '-' . $_POST['von_month'] . '-' . $_POST['von_day'];
    $end_date = $_POST['bis_year'] . '-' . $_POST['bis_month'] . '-' . $_POST['bis_day'];
    $sort_order = $post_hash['sort_order'];
    $categories = "category LIKE '%no_selection%'";
    if (isset($post_hash['allgemein'])) {
      $categories .= " OR category LIKE '%allgemein%'";
    }
    if (isset($post_hash['gesundheit'])) {
      $categories .= " OR category LIKE '%gesundheit%'";
    }
    if (isset($post_hash['arbeit'])) {
      $categories .= " OR category LIKE '%arbeit%'";
    }
    if (isset($post_hash['foerderplanung'])) {
      $categories .= " OR category LIKE '%foerderplanung%'";
    }
    if (isset($post_hash['psychisch'])) {
      $categories .= " OR category LIKE '%psychisch%'";
    }
    if (isset($post_hash['vernetzung'])) {
      $categories .= " OR category LIKE '%vernetzung%'";
    }

    $log_query = "SELECT * FROM ma_logs WHERE mitarbeiter_id=" . $ma_id . " AND (" . $categories . ") AND (date BETWEEN '" . $start_date . "' AND '" . $end_date . "') ORDER BY date " . $sort_order;

    return $log_query;
  }

  function crunch_medi_data() {
    $medi_data = [
                   'mo_mo' => isset($_POST['mo_mo']), 'mo_mi' => isset($_POST['mo_mi']), 'mo_ab' => isset($_POST['mo_ab']), 'mo_na' => isset($_POST['mo_na']), 'mo_re' => isset($_POST['mo_re']), 'mo_ri' => isset($_POST['mo_ri']), 'mo_be' => isset($_POST['mo_be']), 'mo_ko' => isset($_POST['mo_ko']),
                   'di_mo' => isset($_POST['di_mo']), 'di_mi' => isset($_POST['di_mi']), 'di_ab' => isset($_POST['di_ab']), 'di_na' => isset($_POST['di_na']), 'di_re' => isset($_POST['di_re']), 'di_ri' => isset($_POST['di_ri']), 'di_be' => isset($_POST['di_be']), 'di_ko' => isset($_POST['di_ko']),
                   'mi_mo' => isset($_POST['mi_mo']), 'mi_mi' => isset($_POST['mi_mi']), 'mi_ab' => isset($_POST['mi_ab']), 'mi_na' => isset($_POST['mi_na']), 'mi_re' => isset($_POST['mi_re']), 'mi_ri' => isset($_POST['mi_ri']), 'mi_be' => isset($_POST['mi_be']), 'mi_ko' => isset($_POST['mi_ko']),
                   'do_mo' => isset($_POST['do_mo']), 'do_mi' => isset($_POST['do_mi']), 'do_ab' => isset($_POST['do_ab']), 'do_na' => isset($_POST['do_na']), 'do_re' => isset($_POST['do_re']), 'do_ri' => isset($_POST['do_ri']), 'do_be' => isset($_POST['do_be']), 'do_ko' => isset($_POST['do_ko']),
                   'fr_mo' => isset($_POST['fr_mo']), 'fr_mi' => isset($_POST['fr_mi']), 'fr_ab' => isset($_POST['fr_ab']), 'fr_na' => isset($_POST['fr_na']), 'fr_re' => isset($_POST['fr_re']), 'fr_ri' => isset($_POST['fr_ri']), 'fr_be' => isset($_POST['fr_be']), 'fr_ko' => isset($_POST['fr_ko']),
                   'sa_mo' => isset($_POST['sa_mo']), 'sa_mi' => isset($_POST['sa_mi']), 'sa_ab' => isset($_POST['sa_ab']), 'sa_na' => isset($_POST['sa_na']), 'sa_re' => isset($_POST['sa_re']), 'sa_ri' => isset($_POST['sa_ri']), 'sa_be' => isset($_POST['sa_be']), 'sa_ko' => isset($_POST['sa_ko']),
                   'so_mo' => isset($_POST['so_mo']), 'so_mi' => isset($_POST['so_mi']), 'so_ab' => isset($_POST['so_ab']), 'so_na' => isset($_POST['so_na']), 'so_re' => isset($_POST['so_re']), 'so_ri' => isset($_POST['so_ri']), 'so_be' => isset($_POST['so_be']), 'so_ko' => isset($_POST['so_ko'])
                 ];

    return serialize($medi_data);
  }

  function log_category_class($category) {
    if (isset($_GET['log_category']) && $_GET['log_category'] == $category) {
      return 'active';
    } elseif (!isset($_GET['log_category']) && $category == 'all') {
      return 'active';
    } else {
      return '';
    }
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
