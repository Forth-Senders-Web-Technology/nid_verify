<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quickbd</title>
</head>
	<body>
		
		<center>
			<h1 style="font-size: 50px; "> Welcome </h1>


			<!-- <a href="reg_form" style="border: 2px solid green; padding: 10px; border-radius: 10px; color: black; text-decoration:none; font-weight:bold; margin: 5px; "> Ragistration </a> -->


			<a href="login" style="border: 2px solid green; padding: 10px; border-radius: 10px; color: black; text-decoration:none; font-weight:bold; margin: 5px; "> Login </a>
		</center>






		<!-- Load Facebook SDK for JavaScript -->
			<div id="fb-root"></div>
			<script>
				window.fbAsyncInit = function() {
				FB.init({
					xfbml            : true,
					version          : 'v10.0'
				});
				};

				(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>

			<!-- Your Chat Plugin code -->
			<div class="fb-customerchat"
				attribution="setup_tool"
				page_id="112734127017784">
			</div>
		<!-- Load Facebook SDK for JavaScript -->

</body>
</html>


