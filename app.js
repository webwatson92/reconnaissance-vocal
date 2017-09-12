(function($){

	var btn=$("#btn");
	var hidden=$('#hidden').val();
	var grammar = [hidden];
	console.log(hidden);
	//console.log(grammar);
	var result=$("#result");
	var words = null//me servira à mettre espace entre les mots entrés
	//console.log(btn);
	if('webkitSpeechRecognition' in window){
		//Initialisation
		//var recognition = new webkitSpeechRecognition();

		var recognition = new webkitSpeechRecognition();
		var speechRecognitionList = new webkitSpeechGrammarList();
		speechRecognitionList.addFromString(grammar, 1);
		recognition.grammars = speechRecognitionList;
		console.log(recognition.grammars);
		//recognition.continuous = false;
		recognition.lang = 'fr-FR';
		recognition.interimResults = false;
		recognition.maxAlternatives = 1;

		//recognition.lang = 'fr-FR';
		recognition.continuous = false;
		//recognition.interimResults = false;

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
					if(transcript){
						//alert(transcript);
						if(transcript.toLowerCase() != hidden){
							alert('non');
						}else{
							alert('ok');
						}
					}
					btn.addClass('btn-primary');
					words=transcript.split(' ');
					console.log(hidden);
					console.log(words);
					return true;
				
				}else{
					//recognition.stop();
					$("#result").text($("#result").text() + transcript);	
				}
			}
			console.log(event);
		}
		recognition.onerror = function(event) {
		  console.log('Speech recognition error detected: ' + event.error);
		}

	}else{
		btn.hide();
	}


			/**/
			function ucfirst(string)
			{
				// console.log(string[0].toUpperCase()+string.substr(1,string.length-1));
				return string[0].toUpperCase()+string.substr(1,string.length-1);
			}

})(jQuery);