</div>
<script src="js/masonry.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/javascript.js"></script>
<script>
$(function() {
	var tags = [
		"ActionScript",
		"AppleScript",
		"Asp",
		"BASIC",
		"C",
		"C++",
		"Clojure",
		"COBOL",
		"ColdFusion",
		"Erlang",
		"Fortran",
		"Groovy",
		"Haskell",
		"Java",
		"JavaScript",
		"Lisp",
		"Perl",
		"PHP",
		"Python",
		"Ruby",
		"Scala",
		"Scheme"
		];
		$("#auto").autocomplete({
			source:tags
		});
});
</script>
<!--Menu Übersicht-->
	<script>
		var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
			showLeft = document.getElementById( 'showLeft' ),
			wrapperpush = document.getElementById('wrapper-push'),
			button = document.getElementById('button'),
			body = document.body;

		showLeft.onclick = function() {
			classie.toggle( this, 'active' );
			classie.toggle( menuLeft, 'cbp-spmenu-open' );
			disableOther( 'showLeft' );
			wrapperpush.className = 'wrapper-push';
			button.className = 'entypo-right-open-mini navigation_button';
			button.id = 'buttoneingeklappt';
			};
			

		function disableOther( button ) {
			if( button !== 'showLeft' ) {
				classie.toggle( showLeft, 'disabled' );
			}
		}
		
			document.getElementById('buttoneingeklappt').onclick = function() {
			document.getElementById('buttoneingeklappt').className = 'entypo-left-open-mini';
			};
	</script>
<!--//Menü-Übersicht//-->
		
		
<!--Menu Formular-->	
	<script>
		var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
			showLeft = document.getElementById( 'showLeftformular' ),
			formularpush = document.getElementById('formularpush'),
			button = document.getElementById('button'),
			body = document.body;

		showLeft.onclick = function() {
			classie.toggle( this, 'active' );
			classie.toggle( menuLeft, 'cbp-spmenu-open' );
			disableOther( 'showLeft' );
			formularpush.className = 'formularpusher';
			button.className = 'entypo-menu navigation_button';
			};
			

		function disableOther( button ) {
			if( button !== 'showLeft' ) {
				classie.toggle( showLeft, 'disabled' );
			}
		}
	</script>
	
<!--//Menu Formular//-->	
	<script>
		var container = document.querySelector('#container');
			var msnry = new Masonry( container, {
			// options
			columnWidth: 260,
			itemSelector: '.item'
			});
	</script>
		
<!--//Hover Icon auf Text//-->
	<script>
		document.getElementById('icon_neue_aufgabe').onmouseover = function() {
		document.getElementById('text').className = 'javascript_hover_text';
		document.getElementById('tooltip_neueaufgabe').className = 'tooltip_neueaufgabe_on';
		document.getElementById('tooltip_neueaufgabe_dreieck').className = 'tooltip_neueaufgabe_dreieck_on';
		};
		document.getElementById('icon_neue_aufgabe').onmouseout = function () {
		document.getElementById('text').className = 'cbp-spmenu-vertical-java';
		document.getElementById('tooltip_neueaufgabe').className = 'tooltip_neueaufgabe_off';
		document.getElementById('tooltip_neueaufgabe_dreieck').className = 'tooltip_neueaufgabe_dreieck_off';
		};
	</script>
	
	<script>
		document.getElementById('icon_uebersicht').onmouseover = function() {
		document.getElementById('text2').className = 'javascript_hover_text';
		document.getElementById('tooltip_uebersicht').className = 'tooltip_uebersicht_on';
		document.getElementById('tooltip_uebersicht_dreieck').className = 'tooltip_uebersicht_dreieck_on';
		};
		document.getElementById('icon_uebersicht').onmouseout = function() {
		document.getElementById('text2').className = 'cbp-spmenu-vertical-java';
		document.getElementById('tooltip_uebersicht').className = 'tooltip_uebersicht_off';
		document.getElementById('tooltip_uebersicht_dreieck').className = 'tooltip_uebersicht_dreieck_off';
		};
	</script>
	
	<script>
		document.getElementById('icon_archive').onmouseover = function() {
		document.getElementById('text3').className = 'javascript_hover_text';
		document.getElementById('tooltip_archive').className = 'tooltip_archive_on';
		document.getElementById('tooltip_archive_dreieck').className = 'tooltip_archive_dreieck_on';
		};
		document.getElementById('icon_archive').onmouseout = function() {
		document.getElementById('text3').className = 'cbp-spmenu-vertical-java';
		document.getElementById('tooltip_archive').className = 'tooltip_archive_off';
		document.getElementById('tooltip_archive_dreieck').className = 'tooltip_archive_dreieck_off';
		};
	</script>
	
	<script>
		document.getElementById('icon_fragen').onmouseover = function() {
		document.getElementById('text4').className = 'javascript_hover_text';
		document.getElementById('tooltip_fragen').className = 'tooltip_fragen_on';
		document.getElementById('tooltip_fragen_dreieck').className = 'tooltip_fragen_dreieck_on';
		};
		document.getElementById('icon_fragen').onmouseout = function() {
		document.getElementById('text4').className = 'cbp-spmenu-vertical-java';
		document.getElementById('tooltip_fragen').className = 'tooltip_fragen_off';
		document.getElementById('tooltip_fragen_dreieck').className = 'tooltip_fragen_dreieck_off';
		};
	</script>
<!--//Hover Icon auf Text//-->

<!--//Hover Ecke Popup//-->
	<script>
		function showcorner( id ) {
		document.getElementById(id).className = 'triangle-topright-hover';
		};
		function hidecorner( id ) {
		document.getElementById(id).className = 'triangle-topright';
		};


		//	document.getElementById('itemblock').onmouseout = function() {
		//	document.getElementById('itemblock_ecke').className = 'triangle-topright';
		//	};
	</script>
<!--//Hover Ecke Popup//-->

</body>
</html>