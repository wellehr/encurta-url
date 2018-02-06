<!-- 
	Name: Encurtador de URL
	Author: Wellisson Ribeiro
	Version: 1.0
	Api: Google Shortener
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="title" content="Gerador de Danfe">
	<meta name="description" content="">
	<meta name="author" content="Wellisson">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Encurtador de URL</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</head>
<body class="body" style="padding: 0; margin: 0; width: 100%">
	<div class="container" style="padding-top: 5%">
		<div class="row">
			<div class="col-md-12">
				<center>
					<h1 style="font-size: 5em">Encurtar URL</h1>
					<hr>
				</center>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-inline form-group" id="form" action="encurta.php" method="POST" enctype="multipart/form-data">
					<div class="col-lg-12">
						<div class="form-group">
							<input type="text" class="form-control" name="url" id="url" placeholder="Ex: http://www.google.com" style="width: 650px; height: 50px; border-radius: 0; font-size: 30px">
							<br>
							<br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<input type="submit" class="form-control btn btn-success" name="envia" value="Encurtar" style="border-radius: 0">
							<br><br>
						</div>
					</div>
				</form>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class='alert alert-success alert-dismissable' id='send' style='display: none'>
			        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><a href='#' class='alert-link'></a>
			    </div>
			</div>
		</div>
	</div>
	<script>
	    jQuery(document).ready(function($) {
	        $('form#form').submit(function(){

            	var str = $(this).serialize();
            	var input = $("#url");

            	if (input.val() == "") {
            		alert('Por favor insira uma URL válida!');
            		return false;
            	} else {
            		$.ajax({
                	type: "POST",
                	url: "encurta.php",
                	data: str,
                	success: function(data){
                		$("#form input").val("");
                		$('#form input[type = submit]').val("Encurtar");
                		$("#send").addClass("show");
                		$("#send").html(data);
                	}
            	});
            	return false;
            	} 
        	});
	    });
	</script>
</body>
</html>