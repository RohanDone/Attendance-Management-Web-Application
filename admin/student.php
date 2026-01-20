<?php
session_start();
if(!isset($_SESSION['userlogged'])){
    $_SESSION['userlogged'] = "";
}
if($_SESSION['userlogged'] != "true"){
    echo '<script>location.href ="../include/login.php" </script>';
}

include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="contentbox">
        <h2>MANAGE STUDENTS</h2>
    </div> 
    <form method="get" action="managestudents.php" class="designform">
    <div class="form-control">
            <label>Select Semester</label>
            <select name="semname"> 
            <?php

$sql = "SELECT * FROM `semlist`";
$res = mysqli_query($conn, $sql);
$x = 1;

while ($row  = mysqli_fetch_assoc($res)){

    echo '<option value="'.$row['semname'].'">'.$row['semname'].'</option>';
}
?>
                
                
            </select>
        </div>
        <button type="submit" class="submitbtn">VIEW STUDENTS</button>
    </form>

    <button type="submit" class="externalbtn" onclick="redirect()">UPLOAD STUDENTS</button>

<script>
    function redirect(){
        location.href= "uploadstudent.php"
    }
</script>
</body>
</html>