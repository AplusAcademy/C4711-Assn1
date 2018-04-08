$().ready(function() {
	// populate categories dropdowns with the other non-selected categories
	// *default is selected, but others still missing
	$.ajax({
		url: "/category/FillCategories",
		dataType: 'json',
		error: function( data ) {
			console.log( 'ERROR: ', data );
		},
		success: function( data ) {
			console.log( 'SUCCESS INV: ' );
			var allDropDowns = document.getElementsByTagName('select');
			for (var i = allDropDowns.length - 1; i >= 0; i--) {
				var defaultOption = allDropDowns[i].firstElementChild.text;
				$.each(data, function( key, val ) {
					if (val != defaultOption)
					{
						var newOption = document.createElement("option");
						newOption.innerHTML = val;
						allDropDowns[i].appendChild(newOption);
					}	
				});
			}
		}
	});		
});