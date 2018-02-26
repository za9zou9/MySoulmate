$(document).ready(function() {
	
$("#form_recherche"	).keyup(function() {
	
 var recherche = $(this).val();
	
	var data = 'motcle=' + recherche;
	
	$.ajax({
    
	type : "POST",
    url	  : "packChoix",
	data : data,
	
	success : function(server_response){
		
		$("#form_recherche").html(server_response).show();
	}
	});
});
	
});





