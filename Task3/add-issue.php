<?php 
include_once('dbconnect.php');
if (isset($_POST['submit'])) 
{
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
  $desc = $_POST['description'];
  $priority = $_POST['selectedop'];
  $sql = "INSERT INTO issue (name, descr, priority, file) VALUES ('$name', '$desc', '$priority', '$image_file')";

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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
<header>
        <div class="start">
        <div class="logo">
            <img src="images/logo.jpg" alt="" width="100px;" height="100px" style="border-radius: 50%;">
            <h4>Issue Tracker</h4>

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
                 <li><a href="add-recipe.php"><h4>Add Issues</h4></a></li>

            </ul>
        </div>

    </header>
    <section class= 'form'>
    <div class="issue-form">
  <h2>Add Issue</h2>
  <form  method="POST" enctype="multipart/form-data">
    <label for="Name">Name:</label>
    <input type="text"  name="name" required>
    <label for="Desc">Description:</label>
    <textarea  name="description" rows="4" required></textarea>
    <label for="options">Choose an option:</label> 
    <select id="options" name="selectedop">
        <option value="low">Low</option>
        <option value="moderate">Moderate</option>
        <option value="high">High</option>
    </select>
    <input type="file" name="image" >    
    <button type="submit" name="submit" id="sub">Save data</button>
  </form>
</div>
    </section>
    <script src="js/script1.js"></script>
</body>
</html>