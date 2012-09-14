var teller = 4444;

$(document).ready(function(){
	$(".question").hide();
	$("#_1").show();
});

function sendData(trueorfalse,number){
	if(trueorfalse == 'yes'){
		$(".antwoordHidden").val("1");
	}
	else if(trueorfalse == 'false'){
		$(".antwoordHidden").val("0");
	}
	$("#_"+number).css("z-index", ""+teller);
	teller++;
	var number2 = number +1;
	
	$.ajax({
				type: "POST",
				url: "postvraag.php",
				data: $("#f_"+number).serializeArray(),
				success: function(data){
					if(number != 7){
						$("#_"+number2).show();
						$("#_"+number).fadeOut(300);
					}
					else{
						window.location.href = 'result.php';
					}
					
				},
				error: function(){
					window.alert("Er is een probleem opgetreden.");
				}
			});
	
}

