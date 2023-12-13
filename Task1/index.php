<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
    <div class="hero">
        <?php  
        include_once('dbconnect.php');
        $sql = "select * from recepies";
        $res = mysqli_query($con , $sql);
        while($row= mysqli_fetch_assoc($res))
        {      
        echo '
        <div class="one" style="margin: 10px;">
            <div class="name" style="text-align: center; "><span><strong>'.$row["name"].'</strong></span></div>
            <div class="imag" ><img src="images/'.$row['file'].'" alt="" ></div>
            <div class="tim" style="text-align: end;"><strong>Duration:</strong> '.$row['duration'].' mins</div>
            <div class="ing">
                <span><strong>Ingredients</strong></span>
                <span hidden class=lissti>  '.$row['ingredient'].'</span>
                <ul class ="myListi">
              
                </ul>
            </div>
            <div class="ing">
                <span><strong>Methods</strong></span>
                <span  class=lisstm>  '.$row['method'].'</span>
                <ol class="myListm">
                </ol>
            </div>

        </div> ';
         } ?>
    </div>
    <script src="js/script1.js"></script>
</body>

</html