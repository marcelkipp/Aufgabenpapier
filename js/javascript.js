	
  jQuery(document).ready(function(){
	$(".date").pickadate();  
	$('input:text, input:password, textarea').wChar({
		message: 'noch &uuml;brig',
		messageMin: '' 
	});
	$('input.typeahead').typeahead({
      name: 'Namen',
      local: ["Batman", "Spiderman", "Green Lentern", "Joker", "Darth Vader", "Hancock", "Captain America", "Iron Man", "Hulk", "Thor", "Aquaman", "Marcel Kipp", "Matze", "Mattias", "Marco",  ]
	});
});

