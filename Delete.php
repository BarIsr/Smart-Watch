<?php

include 'SqlController.php';

if (isset($_GET['id']))
    $id = $_GET['id']; // get id through query string

$sql_query = "DELETE FROM clock_set WHERE id = $id";

$del = mysqli_query($conn, $sql_query); // delete query

if ($del) {
    mysqli_close($conn); // Close connection
    header("location:Settings.php"); // redirects to all records page
    exit;
} else {
    echo "Error deleting record"; // display error message if not delete
}
