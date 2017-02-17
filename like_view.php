<!DOCTYPE html>
<html>
<head>
	<title>Ajax Search </title>

	<script type="text/javascript">
		
		var xmlHttp = false;

		try{
			xmlHttp = new ActiveXObject('Msxml2.XMLHTTP');
		}catch(e){
			try{
				xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
			}catch(E){
				xmlHttp = false;

			}
		}

		if(!xmlHttp && XMLHttpRequest != 'undefined'){
			xmlHttp = new XMLHttpRequest();

			//alert("you are not in IE browser");
		}

		function makerequest(given_text,objID){

			serverPage = 'like.php';
			xmlHttp.open("GET",serverPage);
			xmlHttp.onreadystatechange = function(){

				if(xmlHttp.readyState == 4 && xmlHttp.status == 200){


					document.getElementById(objID).innerHTML = xmlHttp.responseText;
				}



			}
			xmlHttp.send(null);


		}

			function update_like(id,objID){

			serverPage = 'like.php?id='+id;
			xmlHttp.open("GET",serverPage);
			xmlHttp.onreadystatechange = function(){

				if(xmlHttp.readyState == 4 && xmlHttp.status == 200){


					document.getElementById(objID).innerHTML = xmlHttp.responseText;
				}



			}
			xmlHttp.send(null);


		}


			function update_unlike(pp,objID){

			serverPage = 'like.php?pp='+pp;
			xmlHttp.open("GET",serverPage);
			xmlHttp.onreadystatechange = function(){

				if(xmlHttp.readyState == 4 && xmlHttp.status == 200){


					document.getElementById(objID).innerHTML = xmlHttp.responseText;
				}



			}
			xmlHttp.send(null);


		}

		
	</script>
</head>
<body onload="makerequest('','res')">

<h2> Social Media</h2>



<br>
<br>
<hr>

<span id="res"></span>

</body>
</html>