<!--
File Name: edit.php

Author's Name: Sukhdeep Singh

Web Site Name: My Portfolio

File Description: This page edits the details of the selected contacts from the database
-->
<?php
include_once('header.php');
echo'<div class="container marketing">';
	echo'<h1>Edit Contacts</h1>';
	echo'<hr class="featurette-divider">';

            session_start();
            //so that the page cannot be accessed without logging into the control panel
            if (empty($_SESSION['user_id'])) {
                header('Location:login.php');
            }

            else{
                $conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server.');
                //grab the selected is from the url
                $id = $_GET['id'];
                //sql statement to select the user to edit based on the id passed in the url
                $sql = "SELECT * FROM business_contacts WHERE id = $id";
                $result = mysqli_query($conn, $sql) or die('Error querying database.');
                //fetch the information from the database and hold it in variables to display later
                while ($row = mysqli_fetch_array($result)) {
                    $name = $row['name'];
					$phone = $row['phone'];
					$address = $row['address'];
					$position = $row['position'];
                    $id = $row['id'];
                } 

                mysqli_close($conn);
             }
        ?>

        <form method="post" action="update.php">
        <div>
                <label>Name</label>
                <input name="name" value="<?php echo $name?>">
        </div>
        <div>
                <label>Phone</label>
                <input name="phone" value="<?php echo $phone?>">
        </div>
        <div>
                <label>Address</label>
                <input name="address" value="<?php echo $address?>">
        </div>
        <div>
                <label>Position</label>
                <input name="position" value="<?php echo $position?>">
        </div>
        <!--This is required to send the id to the next page, this should be hidden because we don't want to change the id-->
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="submit" value="Save" >

        </form>
<?php
include_once('footer.php');
?>