<!--
	Author : Ms.ambari
	Tools  : CMS Detector V.1.0
	Date   : 2018-12-21/08:26:53
	Github : https://github.com/Ranginang67
	YouTube: Ms.ambari
-->

<!DOCTYPE html>
<html>
<head>
	<title>CMS Detector</title>
	<style>
		
		body {

			background: url("image/image.jpg");
			background-attachment: fixed;
			background-size: cover;
		}

		.bat {

			border:none;
			background-color: #00C9FF;
			border-radius: 100px;
			outline:none;
			display: inline-block;
			margin: 4px 324px;
			padding: 10px 10px;
			position: absolute;
		}

		.bat:hover {
			background-color: #34D4FF;
			cursor: pointer;
		}
		.bat:active {
			background-color: #00C9FF;
			cursor: pointer;
		}

		.in {
			border:solid;
			outline:none;
			border-color: #00C9FF;
			border-radius: 20px;
			padding: 10px 100px;
			opacity: 1;
			box-shadow: 3px 5px 40px #00C9FF;
			background-color: #F1F3F4;
			box-sizing: border-box;
			position:absolute;
			margin: 1px 1px;
			
		}

		.text {
			color: #00C9FF;
			font-size: 30px;
			text-align: center;
			font-family: Courier;
			margin: 150px;
			text-shadow: 2px 13px 15px #00C9FF;
		}

		.author {
			color: #CACACA;
			font-family: Courier;
			text-align: center;
			font-size: 10px;
			margin: 210px;
		}

		div.counter {
			width: 360px;
			margin:auto;
		}
	</style>
</head>
<body>
	<div class="text">[+] CMS DETECTOR [+]</div>
	<div class="counter">
		<form method="post" action="">
			<input class="in" name="target">
			<button class="bat"><b>start</b></button>
			<?php
			function message($mes) {
				echo "
				<script>
					alert(\"".$mes."\");
				</script>
				";
			}

			if (isset($_POST["target"])) {
				$site = $_POST["target"];
				if (!empty($site)) {
					$ch = curl_init($site);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					$response_content = curl_exec($ch);
					if (preg_match_all("/content=\"Word(.*)\"|wp-content/", $response_content, $meks)) {
						message("Wordpress Detected!");
					}
					if (preg_match_all("/content=\"[a-zA-Z]*oomla(.*)\"|com_content/", $response_content, $meks)) {
						message("Joomla Detected!");
					}
					if (preg_match_all("/content=\"Drupal[\D0-9]*drupal.org\)\"/", $response_content, $meks)) {
						message("Drupal Detected!");
					}
				}else {
					message("No input broo!");
				}
			}
			?>
		</form>
	</div>
	<div class="author">Copyright 2018 - Ms.ambari</div>
</body>
</html>
