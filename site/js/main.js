var teller = 4444;

$(document).ready(function(){
	$(".question").hide();
	$("#_1").show();
});

function sendData(trueorfalse,number){
	if(trueorfalse == 'yes'){
		$(".antwoordHidden").val("1");
		$.get("http://www.pieterreuse.be/tools/knelkiezer/getvraag.php?vraag="+number+"&antwoord=1");
	}
	else{
		$(".antwoordHidden").val("0");
		$.get("http://www.pieterreuse.be/tools/knelkiezer/getvraag.php?vraag="+number+"&antwoord=0");
	}
	$("#_"+number).css("z-index", ""+teller);
	teller++;
	var number2 = number +1;
	
	
	//$.get("http://www.pieterreuse.be/tools/knelkiezer/getvraag.php", { vraag: number, antwoord: $("#f_"+number).serializeArray() } );
	$.ajax({
			/*type: "POST",
			url: "postvraag.php",
			data: "vraag="+$("#f_"+number).serializeArray()+,*/
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
			
	//$.get("getvraag.php", { vraag: number, antwoord: $("#f_"+number).serializeArray() } );
	
}
