<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//DE" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-
transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de">
<?php
$farben = array("#f1c40f", "#e67e22", "#e74c3c", "#3498db", "#2ecc71", "#9b59b6",);
$farbe = $farben[rand(1,(count($farben)-1))];
?>
<head>
	<title>Orga</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/typeahead.js-bootstrap.css" type="text/css">
	<script src="js/modernizr.custom.js"></script>
	<!--jQuery-->
		<script src="js/jquery203.js"></script>
	<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="js/jquery.ui.autocomplete.js" type="text/javascript"></script>
	<!--pickadate.js-->
	<link rel="stylesheet" href="css/themes/default.css" id="theme_base">
	<link rel="stylesheet" href="css/themes/default.date.css" id="theme_date">
	<link rel="stylesheet" href="css/themes/default.time.css" id="theme_time">
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script src="js/picker.time.js"></script>
	<script src="js/legacy.js"></script>
	<script src="translations/de_DE.js"></script><!--Translation.js-->
	<!--//-->	
	<!--wchar-->
	<script type="text/javascript" src="js/wChar.js"></script>
	<link rel="Stylesheet" type="text/css" href="css/wChar.css" />
	<!--//-->
	<!--Twitter typeahead.js-->
	<script src="js/typeahead.js" type="text/javascript"></script>
	<!--//-->
	<!--//-->
	
<!--Stopt absenden des Formulars mit Enter-->
	<script>
		function stopRKey(evt) {
			  var evt = (evt) ? evt : ((event) ? event : null);
			  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
			  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
			}

			document.onkeypress = stopRKey;
	</script>
</head>
 <body>
 
	