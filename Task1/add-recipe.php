<?php 
include_once('dbconnect.php');
if (isset($_POST['submit'])) {
  $folder = "images/";
  $image_file = $_FILES['image']['name'];
  $file = $_FILES['image']['tmp_name'];
  $path = $folder . $image_file;
  $target_file = $folder . basename($image_file);
  $imagefileType = pathinfo($target_file, PATHINFO_EXTENSION);
  $timestamp = time();
  $image_file = $timestamp . '_' . $image_file;
  $target_file = $folder . basename($image_file);
  move_uploaded_file($file, $target_file);
  $name = $_POST['name'];
  $ing = $_POST['ingredients'];
  $method = $_POST['method'];
  $time = $_POST['duration'];

  $sql = "INSERT INTO recepies (name, ingredient, method, file, duration) VALUES ('$name', '$ing', '$method', '$image_file', '$time')";

  if (mysqli_query($con, $sql)) {
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
    <section class= 'form'>
    <div class="recipe-form">
  <h2>Add Recipe</h2>
  <form id="addRecipeForm"  method="POST" enctype="multipart/form-data">
    <label for="recipeName">Name:</label>
    <input type="text" id="recipeName" name="name" required>

    <label for="ingredients">Ingredients:</label>
    <textarea id="ingredients" name="ingredients" rows="4" required></textarea>

    <label for="method">Method:</label>
    <textarea id="method" name="method" rows="4" required></textarea>

    <input type="file" name="image" >

    <label for="recipeDuration">Duration (minutes):</label>
    <input type="number" id="recipeDuration" name="duration" min="1" required>
    
    <button type="submit" name="submit" id="sub">Save data</button>
  </form>
</div>
    </section>
    <script src="js/script1.js"></script>
</body>
</html>
