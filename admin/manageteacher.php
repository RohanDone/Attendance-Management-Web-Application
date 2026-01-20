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
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <div class="contentbox">
        <h2>MANAGE TEACHERS</h2>
    </div>
    <div class="box-container" style="padding: 10% 0% 20% 0%;">

    <table style="width: 90%; margin-left: auto; margin-right: auto;">
        <thead>
            <tr class="thead-dark">
                <th>Sr.No</th>
                <th>Teacher Code</th>
                <th>Teacher Name</th>
                <th>Subjects</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $bdname = $_GET['semname'].'teachersub';
            $sql = "SELECT * FROM `$bdname` LEFT JOIN `teacherlogin` ON $bdname.teachercode = teacherlogin.teachercode";
            $res = mysqli_query($conn, $sql);
            $i = 1;
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
                    <td data-label="Sr.No">1</td>
                    <td data-label="Teacher Code"><?php echo $row['teachercode']; ?></td>
                    <td data-label="Teacher Name"><?php echo $row['Name']; ?></td>
                    <td data-label="Subjects"><?php echo strtoupper($row['sub']); ?></td>
                </tr>
                <?php
                $i++;
            }
?>
        </tbody>
    </table>
    </div>
</body>
</html>