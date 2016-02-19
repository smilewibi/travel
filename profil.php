<?php require_once('Connections/webku.php'); ?>
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

mysql_select_db($database_webku, $webku);
$query_Recordset1 = "SELECT Kode_paket, Nama, Deskripsi, Harga FROM paket_tur ORDER BY Kode_paket ASC";
$Recordset1 = mysql_query($query_Recordset1, $webku) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin/lihat berita.php";
  $MM_redirectLoginFailed = "gagal login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_webku, $webku);
  
  $LoginRS__query=sprintf("SELECT UserName, Password FROM `user` WHERE UserName=%s AND Password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $webku) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="Cssku.css" rel="stylesheet" type="text/css" />
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body>
<table width="754" height="705" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="268" colspan="6" bgcolor="#2387B9" class="header">&nbsp;</td>
  </tr>
  <tr>
    <td width="115" height="36" align="center" valign="middle" class="menu"><a href="profil.php">PROFIL</a></td>
    <td width="116" align="center" valign="middle" class="menu"><a href="index.php">PAKET TOUR</a></td>
    <td width="116" align="center" valign="middle" class="menu"><a href="kontak.php">KONTAK</a></td>
    <td width="116" align="center" valign="middle" class="menu"><a href="booking.php">PESAN TIKET</a></td>
    <td width="116" align="center" valign="middle" class="menu"><a href="berita.php">BERITA</a></td>
    <td width="175" bgcolor="#2387B9">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="6" class="bawah_menu"><span class="bawah_menu"></span></td>
  </tr>
  <tr>
    <td height="15" colspan="6" align="left" valign="top" bgcolor="#FFFFFF" class="judul">&nbsp;</td>
  </tr>
  <tr>
    <td height="132" colspan="5" align="left" valign="top" bgcolor="#FFFFFF" class="judul"><h2>
      <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="581" height="474">
        <param name="movie" value="movie.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="9.0.45.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="movie.swf" width="581" height="474">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="9.0.45.0" />
          <param name="expressinstall" value="Scripts/expressInstall.swf" />
          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
          <div>
            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
      </object>
    </h2></td>
    <td align="center" valign="top" bgcolor="#FFFFFF"><table width="165" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="165" height="32" align="left" valign="middle" class="samping">LOGIN</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
          <p>User
            <input type="text" name="textfield" id="textfield" />
          </p>
          <p>Password 
            <input type="password" name="textfield2" id="textfield2" />
            <input type="submit" name="button" id="button" value="Masuk" />
          </p>
        </form></td>
      </tr>
      <tr>
        <td height="35" class="samping">BERITA TERBARU</td>
      </tr>
      <tr>
        <td height="152" align="left" valign="top" bgcolor="#FFFFFF"><ul>
          <li> Bali is My Life </li>
          <li> Peningkatan Kunjungan Wisatawan ke Bali</li>
          <li> Travel Warning pemerintah Asutralia </li>
        </ul>
          <p><a href="berita.php">Baca berita</a></p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="6" align="center" valign="middle" class="footer">Copyright © 2012. Design by Ismail Wibi </td>
  </tr>
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
