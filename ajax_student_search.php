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

			serverPage = 'student_search.php?text='+given_text;
			xmlHttp.open("GET",serverPage);
			xmlHttp.onreadystatechange = function(){

				if(xmlHttp.readyState == 4 && xmlHttp.status == 200){


					document.getElementById(objID).innerHTML = xmlHttp.responseText;
				}



			}
			xmlHttp.send(null);


		}

		function ajax_update(id){
			var mobile_number = document.getElementById('mobile_number'+id).innerHTML;
			//alert(mobile_number);

			serverPage = 'student_search.php?id='+id+'&mobile_number='+mobile_number;
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

<h2> Student search</h2>

<input type="text" name="" id="given_text" onkeyup="makerequest(this.value,'res');">

<br>
<br>
<hr>

<span id="res"></span>

</body>
</html>