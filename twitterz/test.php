<?php 
	$url = 'https://api.twitter.com/oauth2/token';

	define('cKey', rawurldecode('WB3QP25mopTGpynhqrobg'));
	define('cSecret', rawurldecode('IBD4hLYn4cm4MXuYaCJVz3GJSsH4pQBRM2JhfpxdA'));

	$credentials = base64_decode(cKey.":".cSecret);

	$post_headers = array(
		'POST /oauth2/token HTTP/1.1',
		'Host: api.twitter.com',
		'User-Agent: My Twitter App v1.0.23',
		'Authorization: Basic '.$credentials,
		'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
		'Content-Length: 29',
		'Accept-Encoding: gzip'
	);

	$data = 'grant_type=client_credentials';

	$curl = curl_init($url);

		curl_setopt($curl,CURLOPT_URL, $url);

		curl_setopt($curl,CURLOPT_POST,true);   				// send POST request

		curl_setopt($curl,CURLOPT_HTTPHEADER,$post_headers);	// indicate POST headers

	    curl_setopt($curl,CURLOPT_POSTFIELDS,$data);   			// indicate data to send

	    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);   			// return as a string instead of outputting directly.

	    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);		// don't verify

	    $result = curl_exec($curl);   							// perform curl

    curl_close($curl);

    $arr = json_decode($result);

    echo '<PRE>';
    var_dump($arr); die();

   

    

?>