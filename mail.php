<?php 
    $secret = "6LcCOzsUAAAAAKo-rN9q6j1S_-RfegdV3KR3vCEx";
    $response = null;
	if ($_POST["g-recaptcha-response"]) {
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array('secret' => $secret, 'response' => $_POST["g-recaptcha-response"]);
		
		$myCurl = curl_init();
		curl_setopt_array($myCurl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($myCurl));
		curl_close($myCurl);
		
		var_dump($response);
	}
	
	
	if ($response != null && $response->success) {
		if ($_POST['name'] == ""){
			exit();
		}

		$to  = "mos-avia-cargo@mail.ru" ; 


		$subject = "Заявка с MosaviaCargo"; 

		$message = ' 
		<html> 
			<head> 
				<title>Заявка</title> 
			</head> 
			<body> 
				
				<h2>Привет, Юль</h2>
				<p>Тут, какой-то хрен, отправил тебе заявку с сайта mosaviacargo.ru</p>
				<div>
					<strong>Имя:</strong>
						 <em>'.$_POST['name'].'</em>
				</div>
				<div>
					<strong>Электронная почта:</strong>
						 <em>'.$_POST['email'].'</em>
				</div>
				<div>
					<strong>Город:</strong>
						 <em>'.$_POST['city'].'</em>
				</div>
				<div>
					<strong>Сообщение:</strong>
						 <em>'.$_POST['message'].'</em>
				</div>
				<p>
					<em>С уважением, <br /> твой робот Mosaviacargo</em>
				</p>
			</body> 
		</html>'; 

		$headers  = "Content-type: text/html; charset=UTF-8 \r\n"; 
		$headers .= "From: robot@mosaviacargo.ru\r\n"; 

		if (mail($to, $subject, $message, $headers)){
			echo true;
		} else {
			echo false;
		}
	} else {
		echo false;
	}
?>