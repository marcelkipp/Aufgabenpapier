<?php include 'header.php'; ?>

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
		<a href="#" id="showLeft"><span id="button" class="entypo-left-open-mini navigation_button"></span></a>
	</div>
</nav>

<div class="tiny_menu">
<!--Home-->
	<div class="tiny_menu_inner">
		<span class="entypo-home"></span>
	</div>
<!--//-->

<!--Formular-->	
	<a href="formular.php">
		<div id="icon_neue_aufgabe" class="tiny_menu_inner_2">
			<span class="entypo-paper-plane">
		</div>
	</a>
<!--//-->

<!--Übersicht-->
	<a href="uebersicht.php">
		<div id="icon_uebersicht" class="tiny_menu_inner_3">
			<span class="entypo-layout"></span>
		</div>
	</a>
<!--//-->

<!--Archive-->
	<a href="uebersicht.php?view=archiv">
		<div id="icon_archive" class="tiny_menu_inner_4">
			<span class="entypo-archive"></span>
		</div>
	</a>
<!--//-->

<!--Fragen-->	
	<a href="mailto:mkipp@uos.de">
		<div id="icon_fragen" class="tiny_menu_inner_5">
			<span class="fontawesome-question-sign"></span>
		</div>
	</a>
<!--//-->
</div>
<!--MENU ENDE//-->
    
<div class="formular" id="formularpush">
	<div class="heading">
		Neue Aufgabe erstellen
	</div>
	<form action="uebersicht.php" method="POST">
		<input class="typeahead form-control" id="auto/" type="text" name="person" placeholder="Name" data-minlength="5" data-maxlength="50"><br>
		<input id="input_kurzbeschreibung" type="text" name="titel" placeholder="Kurzbeschreibung"data-minlength="5" data-maxlength="60"><br>
		<textarea id="input_beschreibung" type="text" name="beschreibung" placeholder="Beschreibung"data-minlength="20" data-maxlength="500"></textarea><br>
		<input class="date input_datum" type="text" name="datum" placeholder="Fertigstellung (Datum)">
		<input type="hidden" name="action" value="insert">
		<button class="button_erstellen" type="submit"><span class="fontawesome-ok"></span> Erstellen</button>
		<div style="clear:both;"></div>
	</form> 
	<span class="div_button_erstellen_drucken">	
	<div style="clear:both"></div>
</div>
</div>



<?php include 'footer.php';?>