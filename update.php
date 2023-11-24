<?php
    include "configure.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        // Fetch the data for the selected ID
        $sql = "SELECT * FROM contact WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Display a form with the fetched data for editing
            echo "<form action='update.php' method='post'>
                    <h3>UPDATE CONTACTS<h3>  
                <fieldset>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    NAME:<br>
                    <input type='text' name='Name' value='".$row['Name']."'>
                    <br>
                    EMAIL:<br>
                    <input type='text' name='email' value='".$row['email']."'>
                    <br>
                    PHONE:<br>
                    <input type='text' name='phone' value='".$row['phone']."'>
                    <br>
                    TITLE:<br>
                    <input type='text' name='title' value='".$row['title']."'>
                    <br>
                    Created:<br>
                    <input type='text' name='created' value='".$row['title']."'>
                    <br>
                    <input type='submit' name='submit' value='Update'>
                    </fieldset>


                </form>";
        } else {
            echo "No data found for the selected ID";
        }
    } else {
        echo "Invalid request";
    }

    // Close the database connection
    $conn->close();
?>
