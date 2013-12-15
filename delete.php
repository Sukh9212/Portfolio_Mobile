<!--
File Name: delete.php

Author's Name: Sukhdeep Singh

Web Site Name: My Portfolio

File Description: This page deletes the selected contacts from the database
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Delete Admin</title>
    </head>
    <body>
        <?php
            //access current session
            session_start();

            //evaluate the user_id stored in the session that was set on validate.php
            if(empty($_SESSION['user_id']))
            {
                    header('Location:login.php');
            }

            $conn = mysqli_connect('webdesign4','dbxxxxxxxxx','xxxxx','dbxxxxxxxxx') or die('Connect Error');
            //grab the id from url
            $id = $_GET['id'];
            //write the sql
            $sql = "DELETE FROM business_contacts WHERE id = $id";
            //check and ensure that id is numeric 
            if(is_numeric($id))
            {
            //run the deletion 
            mysqli_query($conn,$sql);
            //disconnect
            mysqli_close($conn);
            }
            //redirect to the contacts page
            header('Location:business.php');
        ?>
    </body>
</html>
