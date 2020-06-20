console.log("loading frontend_custom_jq...");
// https://riptutorial.com/jquery/example/11477/sorting-elements
(function( $ ) {

	let iconList = $('ul#social_networks'), icons = iconList.children('li');
	
	icons.detach().sort(function(a, b) {
	            let astts = $(a).data('order');
	            let bstts = $(b).data('order')
	            return (astts > bstts) ? (astts > bstts) ? 1 : 0 : -1;
	        });
	
	iconList.append(icons);

})( jQuery );
