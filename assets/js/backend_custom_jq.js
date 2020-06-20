console.log("loading ea-social-networks-jqui.js...");

(function( $ ) {
$(this).on("load change",function() {
  console.log( "Handler for .change() called." );
	let iconList = $('ul#sortable'), icons = iconList.children('li');
	
	icons.detach().sort(function(a, b) {
	      	let astts = parseInt ( $(a).find('input[type=hidden]').attr('value') );
		//parseInt //$(a).find('input[type=hidden]').attr('value')
	      	let bstts = parseInt ( $(b).find('input[type=hidden]').attr('value') );
	      	return (astts > bstts) ? (astts > bstts) ? 1 : 0 : -1;
	});
	
	iconList.append(icons);
});
// DONT DELETE SORTABLE() CALL IT BINDS THE LIBRARY TO THE DOM ELEMENT////////////////////
    $( "#sortable" ).sortable({
	start:  function( event, ui ) {console.log("start event...")},
	change: function( event, ui ) {console.log("change event...")},
    	update: function (event, ui)  {console.log("update event...")}

    });
// DONT DELETE SORTABLE() CALL IT BINDS THE LIBRARY TO THE DOM ELEMENT////////////////////
    $( "#sortable" ).on( "sortupdate", function( event, ui ) {
 	console.log("sortupdate...");
	$( "#sortable li" ).each(function( index ) {
		$( this ).find('input[type=hidden]').attr('value', (index+1) );
	});

	let social = []; 
	$( "#sortable li" ).each(function( i, e ) {
		social.push( { "name" : $( this ).find('input[type=text]').attr('id') + "_order" ,  "value" : $( this ).find('input[type=hidden]').attr('value') } );
	});



	// serialize the form data
	let ajax_form_data = $("#easnw_admin_form").serialize();
	
	//ajax_form_data=ajax_form_data+'&submit=Submit+Form';
	$.ajax({
	        url:    ajaxTest.ajax_url, 
	        type:   'post',                
	        data:   { action: 'save_order', ajax_form_data }
	})
	            
        .done( function( response ) { // response from the PHP action
	        $(" #ea_form_feedback ").html( "<h2>The request was successful </h2><br>" + response );
	})
	            
	// something went wrong  
	.fail( function(error) {
	       	$(" #ea_form_feedback ").html( "<h2>Something went wrong.</h2>"+JSON.stringify(error)+"<br>" );                  
	 })

    })


})( jQuery );



