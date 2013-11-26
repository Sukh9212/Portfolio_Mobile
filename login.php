<!--
File Name: login.php

Author's Name: Sukhdeep Singh

Web Site Name: My Portfolio

File Description: This is the login page for the business contacts page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<title>Login</title>

		<!-- Font Family -->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">

		<!-- Extra Codiqa features -->
		<link rel="stylesheet" href="css/codiqa.ext.css">

		<!--themeroller css-->
		<link rel="stylesheet" href="themes/myPortfolio.css" />

		<!-- jQuery and jQuery Mobile -->
		<script src="https://d10ajoocuyu32n.cloudfront.net/jquery-1.9.1.min.js"></script>
		<script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

	<body>
		
		
		<div data-role="page" id="login" data-theme="b">
			<?php

		session_start();
		//so that the page cannot be accessed without logging into the control panel
		if (!(empty($_SESSION['user_id']))) {
			?>
			<script>
			$.mobile.changePage("business.php#business", { transition: "slidefade"} );
			</script>
			<?php } ?>
		
			<div data-role="header" data-position="inline" data-theme="b">
				<a href="index.html" data-role="button" data-direction="reverse" data-transition="slidefade" data-icon="arrow-l" data-iconpos="left" data-inline="true">Back</a>
				<h1>Log In</h1>
			</div>
			<div data-role="content" data-theme="b">
				<!-- user login form -->
			<form method="post" action="validate.php">
				<div>
					<label>Email</label>
					<input name="email" type="email"required />
				</div>
				<div>
					<label>Password</label>
					<input name="password" type="password" required />
				</div>
				<input type="submit"value="Login" />
			</form>
			</div>
			<div data-theme="b" data-role="footer" data-position="fixed">
				<h3>©2013 Sukhdeep Singh</h3>
			</div>
		</div>
	</body>
</html>