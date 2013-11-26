<!--
File Name: validate.php

Author's Name: Sukhdeep Singh

Web Site Name: My Portfolio

File Description: This page takes the credentials entered by the user in the login.php page
and checks in the database if the credentials are correct and logs the user in otherwise gives
and error message showing that email or password is incorrect
-->
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Logging In..</title>

		<script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
	</head>
	<body>
		
			<?php
$email = $_POST['email'];
//hash the password
$password = sha1($_POST['password']);
//check that the email entered is a proper valid email address
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');

$sql = "SELECT id FROM admin WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql) or die('Error querying database.');
$count = mysqli_num_rows($result);
if ($count == 1) {
while ($row = mysqli_fetch_array($result)) {
//access the existing session created by the web server
session_start();
//store the user id in the session object
$_SESSION['user_id'] = $row['id'];
?>
			<script>
				$.mobile.changePage("business.php#business", {
					transition : "slidefade"
				});
			</script>
			<?php

			}
			} else {
			?>
			<script>
				alert("Access Denied..!!   Username or Password is incorrect!!");
				$.mobile.changePage("login.php#login", {
					transition : "slidefade"
				});
			</script>
			<?php
			}
			}
			else {
			?>
			<script>
				alert("Access Denied..!!   Incorrect Email Address..!!");
				$.mobile.changePage("login.php#login", {
					transition : "slidefade"
				});
			</script>
			<?php
			}
			?>
		
	</body>
</html>
