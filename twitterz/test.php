<?php 
	//url to send POST to
	$url = 'https://api.twitter.com/oauth2/token';

	//Consumer Key and Secret from Twitter API Client
	define('C_KEY', urldecode('WB3QP25mopTGpynhqrobg'));
	define('C_SECRET', urldecode('IBD4hLYn4cm4MXuYaCJVz3GJSsH4pQBRM2JhfpxdA'));

	$credentials = base64_encode(C_KEY.":".C_SECRET);
	
	//POST body
	$data = 'grant_type=client_credentials';
	
	//POST headers
	$post_headers = array(
		'POST /oauth2/token HTTP/1.1',
		'Host: api.twitter.com',
		'User-Agent: Twitter test app v0.1',
		'Authorization: Basic '.$credentials,
		'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
		'Content-Length: '.strlen($data),
		'Accept-Encoding: gzip'
	);

	$curl = curl_init($url);
	    curl_setopt($curl,CURLOPT_POST,true);   			// send POST request
	    curl_setopt($curl,CURLOPT_HTTPHEADER,$post_headers);	// indicate POST headers
	    curl_setopt($curl,CURLOPT_POSTFIELDS,$data);   		// indicate data to send
	    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);   		// return as a string instead of outputting directly.
	    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);		// don't verify
	    $result = curl_exec($curl);   				// perform curl
	curl_close($curl);

    	$arr = json_decode($result);

    	echo '<PRE>';
    	var_dump($arr); die();
?>
