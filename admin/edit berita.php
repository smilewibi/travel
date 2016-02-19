<?php require_once('../Connections/webku.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE berita SET tanggal=%s, sinopsis=%s, judul=%s, isi=%s WHERE ID_berita=%s",
                       GetSQLValueString($_POST['tanggal'], "date"),
                       GetSQLValueString($_POST['sinopsis'], "text"),
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['isi'], "text"),
                       GetSQLValueString($_POST['ID_berita'], "text"));

  mysql_select_db($database_webku, $webku);
  $Result1 = mysql_query($updateSQL, $webku) or die(mysql_error());

  $updateGoTo = "sukses simpan.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE berita SET tanggal=%s, sinopsis=%s, judul=%s, isi=%s WHERE ID_berita=%s",
                       GetSQLValueString($_POST['tanggal'], "date"),
                       GetSQLValueString($_POST['sinopsis'], "text"),
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['isi'], "text"),
                       GetSQLValueString($_POST['ID_berita'], "text"));

  mysql_select_db($database_webku, $webku);
  $Result1 = mysql_query($updateSQL, $webku) or die(mysql_error());

  $updateGoTo = "sukses simpan.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['ID_berita'])) {
  $colname_Recordset1 = $_GET['ID_berita'];
}
mysql_select_db($database_webku, $webku);
$query_Recordset1 = sprintf("SELECT * FROM berita WHERE ID_berita = %s ORDER BY ID_berita ASC", GetSQLValueString($colname_Recordset1, "text"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $webku) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../Cssku.css" rel="stylesheet" type="text/css" /></head>

<body>
<table width="754" height="705" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="268" colspan="6" bgcolor="#2387B9" class="header">&nbsp;</td>
  </tr>
  <tr>
    <td width="115" height="33" align="center" valign="middle" class="menu"><a href="../profil.php">PROFIL</a></td>
    <td width="116" align="center" valign="middle" class="menu"><a href="../index.php">PAKET TOUR</a></td>
    <td width="116" align="center" valign="middle" class="menu"><a href="../kontak.php">KONTAK</a></td>
    <td width="116" align="center" valign="middle" class="menu"><a href="../booking.php">PESAN TIKET</a></td>
    <td width="116" align="center" valign="middle" class="menu"><a href="../berita.php">BERITA</a></td>
    <td width="175" bgcolor="#2387B9">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="6" class="bawah_menu"><span class="bawah_menu"></span></td>
  </tr>
  <tr>
    <td height="15" colspan="6" align="left" valign="top" bgcolor="#FFFFFF" class="judul">&nbsp;</td>
  </tr>
  <tr>
    <td height="132" colspan="5" align="left" valign="top" bgcolor="#FFFFFF" class="judul"><h2>UPDATE BERITA</h2>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Tanggal:</td>
          <td><input type="text" name="tanggal" value="<?php echo htmlentities($row_Recordset1['tanggal'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right" valign="top">Sinopsis:</td>
          <td><textarea name="sinopsis" cols="50" rows="5"><?php echo htmlentities($row_Recordset1['sinopsis'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Judul:</td>
          <td><input type="text" name="judul" value="<?php echo htmlentities($row_Recordset1['judul'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right" valign="top">Isi:</td>
          <td><textarea name="isi" cols="50" rows="5"><?php echo htmlentities($row_Recordset1['isi'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Simpan" /></td>
        </tr>
      </table>
      <p>
        <input type="hidden" name="ID_berita" value="<?php echo $row_Recordset1['ID_berita']; ?>" />
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="ID_berita" value="<?php echo $row_Recordset1['ID_berita']; ?>" />
        &nbsp;</p>
    </form>
    </p>
<p>&nbsp;</p></td>
    <td align="center" valign="top" bgcolor="#FFFFFF"><table width="165" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="165" height="32" align="left" valign="middle" class="samping">ADMIN</td>
      </tr>
      <tr>
        <td bgcolor="#8decf7"><strong style="font-size: 14px; color: #000;">Berita</strong></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><ul>
          <li><a href="lihat berita.php">Lihat Berita</a></li>
        </ul></td>
      </tr>
      <tr>
        <td bgcolor="#8DECF7" style="font-size: 14px"><strong><b>Pesan Tiket</b></strong></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><ul>
          <li><a href="lihat booking.php">Lihat Pesan Tiket</a></li>
        </ul></td>
      </tr>
      <tr>
        <td bgcolor="#8DECF7" style="font-size: 14px; font-weight: bold;">Kontak</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><ul>
          <li><a href="lihat kontak.php">Lihat Kontak</a></li>
        </ul></td>
      </tr>
      <tr>
        <td bgcolor="#8DECF7" style="font-size: 14px"><strong><b>Paket Tour</b></strong></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><ul>
          <li><a href="lihat tur.php">Lihat Paket Tour</a></li>
        </ul></td>
      </tr>
      <tr>
        <td bgcolor="#8DECF7" style="font-size: 14px"><strong><b>User</b></strong></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><ul>
          <li><a href="lihat user.php">Lihat User</a></li>
        </ul></td>
      </tr>
      <tr>
        <td bgcolor="#8DECF7" style="font-size: 14px; font-weight: bold;">Log Out</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><ul>
          <li><a href="<?php echo $logoutAction ?>">Log Out</a></li>
        </ul></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="6" align="center" valign="middle" class="footer">Copyright © 2012. Design by Ismail Wibi </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
