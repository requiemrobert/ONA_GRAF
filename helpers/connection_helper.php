<?php 

function getWS($dataPost, $urlcurlWS)
{
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $urlcurlWS);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	    'Content-Type: application/json; charset=UTF-8',                                                                                
	    'Content-Length:' . strlen($dataPost))                                                                       
	);

	$response = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	curl_close($ch);
	
	if($httpCode==404){
		
		return FALSE;
	}else{
		return $response;
	}

}
