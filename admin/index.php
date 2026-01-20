<?php
session_start();
if(!isset($_SESSION['userlogged'])){
    $_SESSION['userlogged'] = "";
}
if($_SESSION['userlogged'] != "true"){
    echo '<script>location.href ="../include/login.php" </script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="contentbox">
        <div class="profile">
            <img src="../assets/profile.png">
            <h2>ADMIN</h2>
        <a href="logout.php" class="logoutbtn">Logout</a>

        </div>
        <div class="box-container" style="
        display: flex;
        flex-wrap: wrap;">
            <a href="managesemester.php" class="options">
                <div class="box">
                    <img src="../assets/semester.png" alt="">
                </div>
            </a>
            <a href="teacher.php" class="options">
                <div class="box">
                    <img src="../assets/instructor.png" alt="">
                </div>
            </a>
            <a href="subjects.php" class="options">
                <div class="box">
                <img src="../assets/text-books.png" alt="">
            </div>
            <a href="student.php" class="options">
                <div class="box">
                <img src="../assets/students.png" alt="">
            </div>
        </a>
        </div>

    </div>
</body>
</html>