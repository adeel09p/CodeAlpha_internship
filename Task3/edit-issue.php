<?php 
include_once('dbconnect.php');
$idupdate= $_GET['id'];
$cmd111= "select * from issue where id=$idupdate";
$show_data = mysqli_query($con ,$cmd111);
$arrdata = mysqli_fetch_array($show_data);
if (isset($_POST['submit'])) {
    $folder = "images/";
    // Check if a new image is selected
    if (!empty($_FILES['new_image']['name'])) 
    {
        // Delete the old image
        $old_image_path = $folder . $arrdata['file'];
        if (file_exists($old_image_path)) 
        {
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
  $desc = $_POST['Description'];
  $priority = $_POST['selectedop'];
$sql ="UPDATE issue SET name ='$name', descr = '$desc',file ='$image_file' , priority='$priority' where id ='$idupdate'";
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
                 <li><a href="add-issue.php"><h4>Add Issues</h4></a></li>
            </ul>
        </div>

    </header>
    <section class='form'>
    <div class="issue-form">
        <h2>Update Issues</h2>
        <form  method="POST" enctype="multipart/form-data">
            <label for>Name:</label>
            <input type="text"  name="name" required value="<?php echo $arrdata['name'] ?>">

            <label for="ingredients">Description:</label>
            <input type="text" id="Description" name="Description" class="Description" required
                value="<?php echo $arrdata['descr'] ?>">

                <label for="options">Choose an option:</label>
        <select id="options" name="selectedop">
            <option value="low" <?php echo ($arrdata['priority'] == 'low') ? 'selected' : ''; ?>>Low</option>
            <option value="moderate" <?php echo ($arrdata['priority']  == 'moderate') ? 'selected' : ''; ?>>Moderate</option>
            <option value="high" <?php echo ($arrdata['priority']  == 'high') ? 'selected' : ''; ?>>High</option>
            <option value="issue Closed" <?php echo ($arrdata['priority']  == 'issue Closed') ? 'selected' : ''; ?>>Issue Closed</option>
        </select>
            <input type="text" name="current_file" value="<?php echo $arrdata['file']; ?>" readonly hidden>
            <input type="file" name="new_image">
            <button type="submit" name="submit" id="sub">Update Issues</button>
        </form>
    </div>
</section>
    <script src="js/script1.js"></script>
</body>
</html>