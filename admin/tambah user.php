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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO `user` (UserId, UserName, Password, NamaLengkap) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['UserId'], "int"),
                       GetSQLValueString($_POST['UserName'], "text"),
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_POST['NamaLengkap'], "text"));

  mysql_select_db($database_webku, $webku);
  $Result1 = mysql_query($insertSQL, $webku) or die(mysql_error());

  $insertGoTo = "sukses simpan.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../Cssku.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

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
    <td height="132" colspan="5" align="left" valign="top" bgcolor="#FFFFFF" class="judul"><h2>USER
    </h2>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">UserName:</td>
          <td><input name="UserName" type="text" id="UserName" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Password:</td>
          <td><input name="Password" type="text" id="Password" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">NamaLengkap:</td>
          <td><input name="NamaLengkap" type="text" id="NamaLengkap" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" onclick="MM_validateForm('UserName','','R','Password','','R','NamaLengkap','','R');return document.MM_returnValue" value="Simpan" /></td>
        </tr>
      </table>
      <input type="hidden" name="UserId" value="" />
      <input type="hidden" name="MM_insert" value="form1" />
  </form>
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