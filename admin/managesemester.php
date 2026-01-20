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
        <h2>MANAGE SEMESTER</h2>
    </div>
    <div class="box-container" style="padding: 10% 0% 20% 0%;">
        <form method = "post">
            <table>
                <thead>
                    <th>
                        Semester
                    </th>
                    <th>
                        State
                    </th>
                </thead>
                <tbody>

                <?php

                $sql = "SELECT * FROM `semlist`";
                $res = mysqli_query($conn, $sql);
                $x = 1;

                while ($row  = mysqli_fetch_assoc($res)){
                
                ?>
                    <tr>
                        <td>
                            <?php
                            echo $row['semname'];
                            ?>
                        </td>
                        <td>
                            <nav>
                                <input type="radio" name="x" id="x<?php echo "$x"; ?>" <?php if($row['state'] == "active"){echo "checked";} ?> value="<?php echo $row['srNo']; ?>"/>
                                <label for="x<?php echo "$x"; ?>">Activate</label>
                            </nav>
                        </td>
                    </tr>
                    <?php $x++; } ?>
                </tbody>
            </table>
            <input type="submit" class="submitbtn" name="" id="" placeholder="Submit">
        </form>
        <a href="createsem.php" class="linkbtn">Add Semester</a>
<br>
        <a href="index.php" class="backbtn"><img src="../assets/back-button.png" alt="" srcset=""></a>

    </div>

    <?php

    $sql = "SELECT * FROM `semlist`";
    $res = mysqli_query($conn, $sql);

   if($_SERVER['REQUEST_METHOD'] =="POST" ){
    while ($row  = mysqli_fetch_assoc($res)){
        $val = $row['srNo'];
        if($_POST['x'] == $val){

            $sql = "UPDATE `semlist` SET `state` = 'active' WHERE `srNo` = $val";
        if(mysqli_query($conn, $sql)){
            echo "<script>location.href = 'managesemester.php'</script>";
        }


        }else{
            $sql = "UPDATE `semlist` SET `state` = '' WHERE `srNo` = $val";
        mysqli_query($conn, $sql);

        }

    }
   }

?>
</body>
</html>