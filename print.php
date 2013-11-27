<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//DE" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-
transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de">
	<head>
		<title>Orga</title>
		<link href="css/print.css" type="text/css" rel="stylesheet" media="print, screen">
		<style type="text/css">
			@page { size:landscape; }
		</style>
	</head>
	<body>
	<?php
	$database = "orga";
	$mysql_server="localhost";
	$mysql_user="orga";
	$mysql_password="virtuos";
	$action ="";
	mysql_connect($mysql_server,$mysql_user,$mysql_password);
	@mysql_select_db($database) or die( "Unable to select database");
	if((array_keys($_GET)!=NULL) && ($_GET["jobs"]!=NULL)){ 
		$suche="select * FROM jobs WHERE job_id in (".$_GET['jobs'].");";
	}
	else {
		$suche="select * FROM jobs WHERE archiv =0;";
	}
	
	
	
	if (array_keys($_POST)!=NULL){

		$action =$_POST["action"];
		
		if ($action == "insert") {
			$person = $_POST["person"];
			$titel = $_POST["titel"];
			$beschreibung = $_POST["beschreibung"];
			$datum = $_POST["datum_submit"];
			$query="INSERT INTO  `orga`.`jobs` (`person` , `titel` , `beschreibung` , `datum`) VALUES ('$person',  '$titel',  '$beschreibung',  '$datum'); LIMIT 0,2";
		}
		if ($action == "update") {
			$person = $_POST["person"];
			$titel = $_POST["titel"];
			$beschreibung = $_POST["beschreibung"];
			$datum = $_POST["datum"];
			$job_id = $_POST["job_id"];
			$query="UPDATE `jobs` SET  `person` =  '$person',`titel` =  '$titel',`beschreibung` =  '$beschreibung',`datum` =  '$datum', WHERE `job_id` =$job_id;";
		}
		if ($action == "archiv") {
			$job_id = $_POST["job_id"];
			$query = "UPDATE  `jobs` SET  `archiv` =  '1' WHERE `job_id` =$job_id;";
		}	
		if ($action == "unarchiv") {
			$job_id = $_POST["job_id"];
			$query = "UPDATE  `jobs` SET  `archiv` =  0 WHERE `job_id` =$job_id;";
		}		
		$result=mysql_query($query);
		if(!$result){
			die("Ungültige Anfrage:".mysql_error());
		}
		
		
	}
	$jobs=mysql_query($suche);
	mysql_close();
?>

<?php
		$element = 0;
		while($job=mysql_fetch_assoc($jobs)) {
			$datum = $job['datum'];
			$datumarray = explode('-', $datum);
			$datumtext = $datumarray[2].'.'.$datumarray[1].'.'.$datumarray[0];
	?>
	<div class="eintrag">
		<div class="kopf2">
			<div class="name"><?=$job['person']?></div>
			<div class="datum"><span class="entypo-calendar"></span>&nbsp; <?=$datumtext?></div>
			<div style="clear:both;"></div>
		</div>
		<div class="haupt">
			<div class="kurzbeschreibung"><?=$job['titel']?></div>
			<div class="beschreibung"><?=$job['beschreibung']?></div>
		</div>
	</div>
<?php 
		if($element>0){
			$element = 0;
			echo("<div class='seitenumbruch'>&nbsp;</div><div style='clear:both;'></div>");
		} else $element++;
		
	}
	mysql_free_result($jobs); ?>
	<?php include 'footer.php';?>
	</body>
</html>