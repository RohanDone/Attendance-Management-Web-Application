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
        <h2>ADD SEMESTER</h2>
    </div>
    <form action="" method="post"  class="designform">
        <div class="form-control">
            <label>Select Term</label>
            <select name="season" id="season">
                <option value="winter">Winter</option>
                <option value="summer">Summer</option>
            </select>
        </div>
        <div class="form-control">
            <label>Enter Year</label>
            <input name="year" type="number" placeholder="year">
        </div>

        <input type="submit" placeholder="Submit" class="submitbtn">
    </form>

    <?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $season = $_POST['season'];
        $year = $_POST['year'];
        $semname = $season.$year;

        $sql = "INSERT INTO `semlist` (`srNo`, `season`, `year`, `semname`, `state`) VALUES (NULL, '$season', '$year', '$semname', '');";
        mysqli_query($conn, $sql);

        $tablename = $semname.'uploadstu';
        $sql = "CREATE TABLE `$tablename` (
            `srNo` int(255) NOT NULL AUTO_INCREMENT,
            `Roll_No` mediumtext NOT NULL,
            `Name` mediumtext NOT NULL,
            `Subject` varchar(10000) NOT NULL
          )";
        mysqli_query($conn, $sql);
        $sql = "ALTER TABLE `$tablename`
        ADD PRIMARY KEY (`srNo`);";
        mysqli_query($conn, $sql);

        $tablename = $semname.'teachersub';
        $sql = "CREATE TABLE `$tablename` (
            `srNo` int(11) NOT NULL AUTO_INCREMENT,
            `teachercode` varchar(1000) NOT NULL,
            `sub` varchar(1000) NOT NULL
          )";
        mysqli_query($conn, $sql);
        $sql = "ALTER TABLE `$tablename`
        ADD PRIMARY KEY (`srNo`);";
        mysqli_query($conn, $sql);


        $tablename = $semname.'uploadsub';
        $sql = "CREATE TABLE `$tablename` (
            `srNo` int(255) NOT NULL AUTO_INCREMENT,
            `subCode` varchar(1000) NOT NULL,
            `subName` varchar(1000) NOT NULL
          )";
        mysqli_query($conn, $sql);
        $sql = "ALTER TABLE `$tablename`
        ADD PRIMARY KEY (`srNo`);";
        mysqli_query($conn, $sql);


        echo '<script>
        location.href="managesemester.php"
        </script>';
    }

    ?>
</body>
</html>