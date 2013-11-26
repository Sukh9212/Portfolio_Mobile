<!--
File Name: update.php

Author's Name: Sukhdeep Singh

Web Site Name: My Portfolio

File Description: This page takes the input from the edit.php page and makes the updation in the databse
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
             session_start();
             //to make sure that this page cannot be accesed without logging into the control panel
            if (empty($_SESSION['user_id'])) {
                    header('Location:login.php');
            }
            else {
                //use the mysqli_real_escape_string function to encapsulate the inputs. this function is neccesary because if there is ' in the input, you will get update error.
                $conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server.');
                $name = mysqli_real_escape_string($conn,$_POST['name']);
                $phone = mysqli_real_escape_string($conn,$_POST['phone']);
				$address = mysqli_real_escape_string($conn,$_POST['address']);
				$position = mysqli_real_escape_string($conn,$_POST['position']);
                $id = mysqli_real_escape_string($conn,$_POST['id']);
                //make sure the id is valid numeric
                if (is_numeric($id)) {
                    ///write the sql update statement
                    $sql = "UPDATE `business_contacts` SET `name` = '$name', `phone` = '$phone', `address` = '$address', `position` = '$position' WHERE id = '$id'";
                    //excecute the query
                    mysqli_query($conn, $sql) or die('Error updating database.');
                    mysqli_close($conn);
                    //redirect back to the admins page
                    header('Location: business.php');
                    }
                    else {
                         echo 'Invalid ID.  Click <a href="javascript:history.go(-1)">HERE</a> to go back.';
                    }
            }
        ?>
    </body>
</html>
