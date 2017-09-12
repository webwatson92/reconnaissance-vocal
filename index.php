<?php 
require 'database.php';

  $result=$db->query("SELECT * FROM exo");

  $result->execute();
  $table=$result->fetchAll(); 
   		$reponse=$table[0]['reponse'];
 ?>

<html>
	<head></head>
	<body>

		<!-- <textarea cols="50" id="speech" ></textarea>
		<input style="width:15px;height:20px;border:0px;bacground-color:transparent;"
		  id="mic" onwebkitspeechchange="transcribe(this.value)" x-webkit-speech> -->
		  <div class="container">
		  	<div class="row">
		  		<div class="span12">
		  			
		  		</div>
		  	</div>
		  </div>
		  <h1>Reconnaissance vocale</h1>
		  <input type="text" name="test" x-webkit-speech>
		  <input type="hidden" id="hidden" value="<?= $table[0]['reponse']; ?>">
		  <button id="btn">Demarer</button>
		  <h2 id="result"></h2>
	</body>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
	<script type="text/javascript" src="app.js"></script>
		<script type="text/javascript">
		
			  function transcribe(words) {
			    document.getElementById("speech").value = words;
			    document.getElementById("micro").value = "";
			    document.getElementById("speech").focus();
			  }
			  
			//   "permissions": {
			//   "audio-capture" : {
			//     "description" : "Audio capture"
			//   },
			//   "speech-recognition" : {
			//     "description" : "Speech recognition"
			//   }
			// },
			// "type": "privileged"

			
</script>
</html>