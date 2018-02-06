<?php 
	ini_set('display_errors', 'On');

	// recebe do form
	$URL = $_POST['url'];

	// para acesso da api : http://code.google.com/apis/console/
	$apiKey = 'AIzaSyD6eN6E1NngCk2NhujEfprIuVtkYROif1M';

	$postData = array('longUrl' => $URL, 'key' => $apiKey);
	$jsonData = json_encode($postData);

	$curlObj = curl_init();

	curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);
	curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curlObj, CURLOPT_HEADER, 0);
	curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
	curl_setopt($curlObj, CURLOPT_POST, 1);
	curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

	$response = curl_exec($curlObj);

	// Altere a string de resposta json para objeto
	$json = json_decode($response);

	curl_close($curlObj);

	echo '<a href="'.$json->id.'" target="_blank" style="text-decoration: none">'.$json->id.'</a>';
?>