<?php 
include_once('dbconnect.php');
if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];
    $cmdSelect = "SELECT * FROM recepies WHERE id = $idToDelete";
    $resultSelect = mysqli_query($con, $cmdSelect);
    $recipeToDelete = mysqli_fetch_array($resultSelect);
    // Delete the associated image file
    $folder = "images/";
    $imageToDelete = $folder . $recipeToDelete['file'];
    if (file_exists($imageToDelete)) {
        unlink($imageToDelete);
    }
    // Delete the recipe from the database
    $cmdDelete = "DELETE FROM recepies WHERE id = $idToDelete";
    $resultDelete = mysqli_query($con, $cmdDelete);
    if ($resultDelete) {
        header('location: recepie.php?status=delete_success');
    } else {
        header('location: recepie.php?status=delete_error');
    }
} else {
    // Handle the case where 'id' is not set
    header('location: recepie.php');
} ?>