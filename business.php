<!--
File Name: business.php

Author's Name: Sukhdeep Singh

Web Site Name: My Portfolio

File Description: This page show the list of my business contacts and registered users and has the ability to edit or delete 
contacts and the registered users
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<title>Business Contacts</title>

		<!-- Font Family -->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">

		<!-- Extra Codiqa features -->
		<link rel="stylesheet" href="css/codiqa.ext.css">

		<!--themeroller css-->
		<link rel="stylesheet" href="themes/myPortfolio.css" />

		<!-- jQuery and jQuery Mobile -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

	</head>
	<body>
		<div data-role="page" id="business" data-theme="b">
			<div data-role="header" data-position="inline" data-theme="b">
				<a href="logout.php" data-role="button" data-direction="reverse" data-transition="slidefade" data-icon="arrow-l" data-iconpos="left" data-inline="true">Logout</a>
				<h1>Business Contacts</h1>
			</div>
			<div data-role="content" data-theme="b">

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
				} else {
				//1 Write our sql command to get the list of Contacts
				$sql = "SELECT * FROM business_contacts order by name;";
				//2. Connect to the databse
				$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die(mysqli_error());
				//3. excecute our query & store the results in a variable
				$result = mysqli_query($conn, $sql);
				//4. crate our table and header row with html tags
				echo '<table><tr><th>Name</th></tr>';
				//5 Loop through the result from the query and output them 1 at a time to the page
				//<tr> creates a new row
				//<td> creates a new column
				while ($row = mysqli_fetch_array($result)) {
				echo '<tr><td><a href="#" class="alert" onclick="alert(\'Name: ' . $row['name'] . ',  Phone:  ' . $row['phone'] . ',  Address:  ' . $row['address'] . ',  Position:  ' . $row['position'] . '\')";>' . $row['name'] . '</a></td></tr>';
				}
				//6. close the table
				echo '</table>';
				}
				
				mysqli_close($conn);
				?>
			</div>
			<div data-theme="b" data-role="footer" data-position="fixed">
				<h3>©2013 Sukhdeep Singh</h3>
			</div>
		</div>
	</body>
</html>