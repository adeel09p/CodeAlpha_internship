<?php 
include_once('dbconnect.php');
$idupdate= $_GET['id'];
$cmd111= "select * from recepies where id=$idupdate";
$show_data = mysqli_query($con ,$cmd111);
$arrdata = mysqli_fetch_array($show_data);
if (isset($_POST['submit'])) {
    $folder = "images/";
    // Check if a new image is selected
    if (!empty($_FILES['new_image']['name'])) {
        // Delete the old image
        $old_image_path = $folder . $arrdata['file'];
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        // Upload and save the new image
        $image_file = $_FILES['new_image']['name'];
        $file = $_FILES['new_image']['tmp_name'];
        $target_file = $folder . basename($image_file);
        $timestamp = time();
        $image_file = $timestamp . '_' . $image_file;
        $target_file = $folder . basename($image_file);
        move_uploaded_file($file, $target_file);
    } else {
        // Keep the existing image if no new image is selected
        $image_file = $arrdata['file'];
    }
  $name= $_POST['name'];
  $ing = $_POST['ingredients'];
  $method = $_POST['method'];
  $time = $_POST['duration'];

//   $sql ="insert into recepies(name , ingredient , method , file , duration)values('$name','$ing', '$method','$image_file','$time')";
$sql ="UPDATE recepies SET name ='$name', ingredient = '$ing',file ='$image_file' , method='$method', duration='$time' where id ='$idupdate'";
if(mysqli_query($con , $sql)){
  header('location:index.php?status=true');
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
<header>
        <div class="start">
        <div class="logo">
            <img src="images/logo.jpg" alt="" width="100px;" height="100px" style="border-radius: 50%;">
            <h4>Flavors Haven</h4>

        </div>
        <div class="menu-icon">
        <svg width="30" height="30" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
    <path fill="black" d="M0 1h16v3H0V1zm0 5h16v3H0V6zm0 5h16v3H0v-3z"/>
</svg>

        </div>
        </div>
   
       
        <div class="menu">
            <ul>
                <li> <a href="index.php"><h4>Home</h4></a></li>
                 <li><a href="add-recipe.php"><h4>Add Recepies</h4></a></li>
                <li><a href="edit.php"><h4>Edit Recepies</h4></a></li>
            </ul>
        </div>

    </header>
    <section class='form'>
    <div class="recipe-form">
        <h2>Update Recipe</h2>
        <form id="addRecipeForm" method="POST" enctype="multipart/form-data">
            <label for="recipeName">Name:</label>
            <input type="text" id="recipeName" name="name" required value="<?php echo $arrdata['name'] ?>">

            <label for="ingredients">Ingredients:</label>
            <input type="text" id="ingredients" name="ingredients" class="ingredients" required
                value="<?php echo $arrdata['ingredient'] ?>">

            <label for="method">Method:</label>
            <input type="text" id="method" class="method" name="method" required value="<?php echo $arrdata['method'] ?>">

            <input type="text" name="current_file" value="<?php echo $arrdata['file']; ?>" readonly hidden>
            <input type="file" name="new_image">

            <label for="recipeDuration">Duration (minutes):</label>
            <input type="number" id="recipeDuration" name="duration" min="1" required
                value="<?php echo $arrdata['duration'] ?>">

            <button type="submit" name="submit" id="sub">Update Recipe</button>
        </form>
    </div>
</section>
    <script src="js/script1.js"></script>
</body>
</html>
