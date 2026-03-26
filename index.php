<?php
	$key = "xxx";
	$org = "org-FUOhDblZb1pxvaY6YylF54gl";
	$url = "https://api.openai.com/v1/chat/completions";  

	$headers = [
	    "Authorization: Bearer " . $key,
	    "OpenAI-Organization: " . $org, 
	    "Content-Type: application/json"
	];

	$messages = [];
	$obj = [];
	$obj["role"] = "user";
	$obj["content"] = "Give me a JSON object with one property. The property should be named 'fact'. Its value should be a string. This should be a Chuck Norris 'fact', relating either to internet, email or software. An Example would be 'Chuck Norris can divide by zero.'.";
	$messages[] = $obj;
		
	$data = [];
	$data["model"] = "gpt-3.5-turbo";
	$data["messages"] = $messages;
	$data["max_tokens"] = 500;

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($curl);
	if (curl_errno($curl)) 
	{
	    echo 'Error:' . curl_error($curl);
	} 

	curl_close($curl);	

	$result = json_decode($result);
	$content = $result->choices[0]->message->content;
	$content = json_decode($content);

	$fact = $content->fact;	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>In Memory of Chuck Norris</title>

		<style>
			body
			{
				background: url(chucknorris.jpg) left top no-repeat;
				background-size: cover;
				font-size: 60px;
				font-family: georgia;
				text-shadow: -2px -2px 2px rgb(255, 255, 255), 2px -2px 2px rgb(255, 255, 255), -2px  2px 2px rgb(255, 255, 255), 2px  2px 2px rgb(255, 255, 255);
			}

			.number
			{
				font-weight: bold;
				width: 10em;
				float: left;
			}

			.fact
			{
				width: 20em;
				float: left;
				display: none;
			}

			.rip
			{
				font-size: 0.5em;
				height: 1.5em;
			    position: fixed;
			    bottom: 0;
			    right: 0;
			}			
		</style>

		<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
		<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

		<script>
			$(document).ready(function() {
				$( ".number" ).effect( "bounce", { times: 5}, 1000 );
				$( ".fact" ).fadeIn(5000);
			});
		</script>
	</head>

	<body>
		<div class="number">Fact #<?php echo rand(100, 100000); ?>:</div>
		<br />
		<div class="fact"><?php echo $fact; ?></div>
		<div class="rip">R.I.P 19th March 2026</div>
	</body>
</html>
