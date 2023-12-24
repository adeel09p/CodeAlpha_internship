<?php
include_once('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
<div class="tbl">
<table class="table"  width="100%" >
    <thead>
      <tr>
        <th style="text-align:center;">id</th>
        <th style="text-align:center;">Name</th>
        <th style="text-align:center;">Description</th>
        <th style="text-align:center;">Priority</th>
        <th style="text-align:center;">File</th>
        <th style="text-align:center;">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $sql= "select* from issue ";
        $res = mysqli_query($con, $sql);
        while($data1 = mysqli_fetch_assoc($res))
        {
          $priorityClass = 'priority-' . strtolower($data1["priority"]);
            
        echo '
            <tr>
            <td style="text-align:center;" data-label="Id">'.$data1["id"].'</td>
            <td style="text-align:center;" data-label="Name">'.$data1["name"].'</td>
            <td style="text-align:center;" data-label="Description">'.$data1["descr"].'</td>
            <td style="text-align:center;" data-label="Priority" class="priority">'.$data1["priority"].'</td>
            <td style="text-align:center;"data-label="File"> <a href="images/' . $data1['file'] . '" target="_blank" rel="noopener noreferrer" style="text-decoration:none" class="badge alert alert-primary p-1 px-2">View File</a>   </td>
            <td style="text-align:center; " data-label="Action"> <a href="edit-issue.php?id='.$data1['id'].'" style="text-decoration:none" class="badge alert alert-primary p-1 px-2">Edit</a>|<a href="delete.php?id='.$data1['id'].'" style="text-decoration:none" class="badge alert alert-danger p-1 px-2">Delete</a>  </td>
            </tr>';
        }
        ?>
    </tbody>
  </table>
</div>
<script src="js/script1.js"></script>
</body>
</html>