<!--
File Name: logout.php

Author's Name: Sukhdeep Singh

Web Site Name: My Portfolio

File Description: This page logs the user out of the business contacts page and closes all connections
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Logging Out....</title>
		
		<script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
	</head>
	<body>
		
			<?php

//access current session
session_start();

//evaluate the user_id stored in the session that was set on validate.php
if (empty($_SESSION['user_id'])) {
			?>
			<script>
				$.mobile.changePage("login.php#login", {
					transition : "slidefade"
				});
			</script>
			<?php
			}
			else{
			//access the existing session object
			session_start();

			//remove all the variables from existing session
			session_unset();

			//get rid of current session
			session_destroy();
			?>
			<!--redirect to the login page-->
			<script>
				$.mobile.changePage("login.php#login", {
					transition : "slidefade"
				});
			</script>
			<?php } ?>
			
	</body>
</html>