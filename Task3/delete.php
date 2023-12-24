<?php 
include_once('dbconnect.php');
if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];
    $cmdSelect = "SELECT * FROM issue WHERE id = $idToDelete";
    $resultSelect = mysqli_query($con, $cmdSelect);
    $issueToDelete = mysqli_fetch_array($resultSelect);
    // Delete the associated image file
    $folder = "images/";
    $imageToDelete = $folder . $issueToDelete['file'];
    if (file_exists($imageToDelete)) {
        unlink($imageToDelete);
    }
    // Delete the recipe from the database
    $cmdDelete = "DELETE FROM issue WHERE id = $idToDelete";
    $resultDelete = mysqli_query($con, $cmdDelete);
    if ($resultDelete) {
        header('location: index.php?status=delete_success');
    } else {
        header('location: index.php?status=delete_error');
    }
} else {
    // Handle the case where 'id' is not set
    header('location: index.php');
} ?>