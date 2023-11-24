<?php
    include "configure.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        // Delete the record for the selected ID
        $sql = "DELETE FROM contact WHERE id = $id";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "Contact deleted successfully!";
        } else {
            echo "Error deleting contact: " . $conn->error;
        }
    } else {
        echo "Invalid request";
    }

    // Close the database connection
    $conn->close();
?>
