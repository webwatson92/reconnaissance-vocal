(function($){

	var btn=$("#btn");
	var hidden=$('#hidden').val();
	console.log(hidden);
	var result=$("#result");
	var words = null//me servira à mettre espace entre les mots entrés
	//console.log(btn);
	if('webkitSpeechRecognition' in window){
		//Initialisation
		var recognition = new webkitSpeechRecognition();
		recognition.lang = 'fr-FR';
		recognition.continuous = true;
		recognition.interimResults = false;

		btn.click(function(e){
			e.preventDefault();
			recognition.start();
			btn.removeClass('btn-primary');
		});

		recognition.onresult = function(event){
			$("#result").text('');
			for(var i = event.resultIndex; i < event.results.length; i++) {
				if(event.results[i].isFinal){
					var transcript = event.results[i][0].transcript;
					console.log('transcript='+transcript);
					result.text(transcript);
					recognition.stop();
					btn.addClass('btn-primary');
					words=transcript.split(' ');
					console.log(words);
					return true;
					if(words == hidden){
							alert('ok');
					}else{
						    alert('Pas ok');
					}
				}else{
					//recognition.stop();
					$("#result").text($("#result").text() + transcript);	
				}
			}
			console.log(event);
		}

	}else{
		btn.hide();
	}

})(jQuery);