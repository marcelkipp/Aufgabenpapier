<?php include 'header.php'; ?>
<?php
	$database = "orga";
	$mysql_server="localhost";
	$mysql_user="orga";
	$mysql_password="virtuos";
	$action ="";
	$searchterm="";
	mysql_connect($mysql_server,$mysql_user,$mysql_password);
	@mysql_select_db($database) or die( "Unable to select database");
	if((array_keys($_GET)!=NULL) && ($_GET["view"]=="archiv")){
		$suche="select * FROM jobs WHERE archiv =1;";
		$archiv_action="unarchiv";
		$archiv_text="Wieder aktivieren";
		$view = "archiv";
		$ueberschrift="Archiv";
	}
	else {
		$suche="select * FROM jobs WHERE archiv =0;";
		$archiv_action="archiv";
		$archiv_text="Ins Archiv";
		$view="normal";
		$ueberschrift="&Uuml;bersicht";
	}
	
	
	
	if (array_keys($_POST)!=NULL){

		$action =$_POST["action"];
		
		if ($action == "insert") {
			$person = $_POST["person"];
			$titel = $_POST["titel"];
			$beschreibung = $_POST["beschreibung"];
			$datum = $_POST["datum_submit"];
			$query="INSERT INTO  `orga`.`jobs` (`person` , `titel` , `beschreibung` , `datum`) VALUES ('$person',  '$titel',  '$beschreibung',  '$datum');";
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
		if ($action == "search") {
			$keyword = $_POST["keyword"];
			$searchterm = "value='$keyword'";
			$suche = "SELECT *  FROM `jobs` WHERE `titel` LIKE '%$keyword%' OR `beschreibung` LIKE '%$keyword%' OR `person` LIKE '%$keyword%'";
		} else {
			$result=mysql_query($query);
			if(!$result){
			die("Ungültige Anfrage:".mysql_error());
		}
		}
		
		
	}
	$jobs=mysql_query($suche);
	mysql_close();
?>
<!--MENU START-->
<div class="tooltip_neueaufgabe_off" id="tooltip_neueaufgabe"> Neue Aufgabe erstellen </div><div class="tooltip_neueaufgabe_dreieck_off" id="tooltip_neueaufgabe_dreieck"></div>
<div class="tooltip_uebersicht_off" id="tooltip_uebersicht"> &Uuml;bersicht </div><div class="tooltip_uebersicht_dreieck_off" id="tooltip_uebersicht_dreieck"></div>
<div class="tooltip_archive_off" id="tooltip_archive"> Archiv </div><div class="tooltip_archive_dreieck_off" id="tooltip_archive_dreieck"></div>
<div class="tooltip_fragen_off" id="tooltip_fragen"> Fragen </div><div class="tooltip_fragen_dreieck_off" id="tooltip_fragen_dreieck"></div>

<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left slidemenu" id="cbp-spmenu-s1">	
	<h3 class=""> &nbsp; &nbsp; Home</h3>
	<a href="formular.php" id="text">Neue Aufgabe</a>
	<a href="uebersicht.php" id="text2">&Uuml;bersicht</a>
	<a href="uebersicht.php?view=archiv" id="text3">Archiv</a>
	<a href="mailto:mkipp@uos.de" id="text4">Fragen</a>
	<div class="menu-button">
		<a href="#" id="showLeft"><span id="button" class="entypo-right-open-mini navigation_button"></span></a>
	</div>
</nav>

<div class="tiny_menu">
	<div class="tiny_menu_inner">
		<span class="entypo-home"></span>
	</div>
	<!--Formmular-->
	<a href="formular.php">
		<div id="icon_neue_aufgabe" class="tiny_menu_inner_2">
			<span class="entypo-paper-plane">
		</div>
	</a>
	<!--//Formular//-->

	<!--Übersicht-->	
	<a href="uebersicht.php">
		<div id="icon_uebersicht" class="tiny_menu_inner_3">
			<span class="entypo-layout"></span>
		</div>
	</a>
	<!---//Übersicht//-->

	<!--Archive-->
	<a href="uebersicht.php?view=archiv">
		<div id="icon_archive" class="tiny_menu_inner_4">
			<span class="entypo-archive"></span>
		</div>
	</a>
	<!--//Archive//-->

	<!--Fragen-->	
	<a href="mailto:mkipp@uos.de">
		<div id="icon_fragen" class="tiny_menu_inner_5">
			<span class="fontawesome-question-sign"></span>
		</div>
	</a>
	<!--//Fragen//-->

</div>
<!--//MENU ENDE//-->


<div class="wrapper-uebersicht gridly" id="wrapper-push">
	<div class="heading-uebersicht">
		<?=$ueberschrift?>
	</div>
	<div id="suche">
		<div id="suchleiste">
			<form action="uebersicht.php" method="POST">
				<input type="hidden" name="action" value="search"/>
				<input id="keyword" class="input_suche" type="text" name="keyword" placeholder="Suche" <?=$searchterm ?>/>
				<button class="button-suche"><span class="fontawesome-search"></span> Suchen</button>
				<div style="clear:both;"></div>
			</form>
		</div>
	</div>
	<div class="sortierung">
		<div class="sortierung-auswahl">
			<a href="#">Name</a> <a href="#">Aufgabe</a> <a href="#">Datum</a> <a href="#"><span class="fontawesome-random"></span></a>
		</div>
	</div>
	
	<script>
	var druckjobs = new Array();
	function hasClass(element, cls) {
		return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
	}
	function selectjob(element, number){
		if (! hasClass(document.getElementById(element), "drucken")) {
			document.getElementById(element).className = document.getElementById(element).className.replace( /(?:^|\s)nichtdrucken(?!\S)/g , '' );
			document.getElementById(element).className += ' drucken';
			druckjobs.push(number);
		} else {
			document.getElementById(element).className = document.getElementById(element).className.replace( /(?:^|\s)drucken(?!\S)/g , '' );
			document.getElementById(element).className += ' nichtdrucken';
			var index = druckjobs.indexOf(number);
			druckjobs.splice(index,1);			
		}
	}
	
	function getDruckjobs() {
		var text = "";
		for(index = 0; index < druckjobs.length; ++index) {
			text += druckjobs[index]
			if (index != druckjobs.length-1) 
				text += ",";
		}
		return text;
	}
	
	</script>	
	
	<div class="drucken_uebersicht" onclick="window.open('print.php?jobs='+getDruckjobs())">Drucken</div>
	
	<?php
		if ($action=="insert"){?>
	<div class="gespeichert">
		Job "<?= $titel?>" wurde gespeichert !
	</div>
	<?php }?>
	<div id="container" class="container-einstellungen">	
	

	
<!--ITEM START-->
	<?php
		while($job=mysql_fetch_assoc($jobs)) {
			$datum = $job['datum'];
			$datumarray = explode('-', $datum);
			$datumtext = $datumarray[2].'.'.$datumarray[1].'.'.$datumarray[0];
	?>
		<div class="item brick small nichtdrucken" id="itemblock-<?=$job["job_id"]?>" onclick="selectjob('itemblock-<?=$job["job_id"]?>', <?=$job["job_id"]?>)" onmouseover="showcorner('itemblock_ecke<?=$job["job_id"]?>')" onmouseout="hidecorner('itemblock_ecke<?=$job["job_id"]?>')">
			<a href="#openModal<?=$job["job_id"]?>">
				<div class="triangle-topright" id="itemblock_ecke<?=$job["job_id"]?>"><span class="entypo-popup icon_popup"></span></div>
			</a>
			<div class="kopfbereich" id="kopfbereich">
				<span class="output-name"><span class="entypo-user"></span> &nbsp; <?=$job['person']?></span> <br/>
				<div class="output-kurzbeschreibung"><?=$job['titel']?></div>
			</div>
			<div class="kategorie-banner" style="background-color:<?php echo $farbe ?>;"></div>
			<!--<div class="kategorie-banner-pseudo"></div>-->
			<div class="bereich-beschreibung" id="bereichbeschreibung">						
				<span class="output-beschreibung"><?=$job['beschreibung']?></span>
			</div>
			<div class="fussbereich" id="fussbereich">
				<span class="entypo-calendar"></span>  &nbsp; <?=$datumtext?>
			</div>
		<!--POPUP-->

			<div id="openModal<?=$job["job_id"]?>" class="modalDialog">
				<div>
					<a href="#close" title="Close" class="close">X</a>
					<!-- DER INHALT-->
						<div class="kopfbereich-popup">
							<div class="output-kurzbeschreibung-popup"><?=$job['titel']?></div>
						</div>
						
						<div class="bereich-beschreibung-popup">
							<div class="output-beschreibung"><?=$job['beschreibung']?></div></br>
							<span class="output-name-popup"><span class="entypo-user"></span> &nbsp; <?=$job['person']?></span> <br/>
							<span class="output-datum-popup"><span class="entypo-calendar"></span> Fertigstellung am <?=$job['datum']?></span>
						</div>
					<!-- //ENDE INHALT//-->
						<div class="button-bereich-popup">
							<div onclick="window.open('print.php?jobs='+<?=$job['job_id']?>)" class="button-drucken-popup">
								<span class="fontawesome-print"></span> Drucken
							</div>
							<form method="POST" action="uebersicht.php?view=<?=$view?>">
								<button type="submit" class="button-archive-popup"><span class="entypo-archive"></span> <?=$archiv_text?></button>
								<input type="hidden" name="job_id" value="<?=$job['job_id']?>">
								<input type="hidden" name="action" value="<?=$archiv_action?>">
							</form>
							<div style="clear:both;"></div>
						</div>
				</div>
			</div>
		<!--//Popup Ende//-->
<!--//ITME ENDE//-->
	</div>

<?php }
	mysql_free_result($jobs); ?>

<?php include 'footer.php';?>
</body>