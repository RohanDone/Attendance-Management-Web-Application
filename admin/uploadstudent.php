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
        <h2>UPLOAD SUBJECT</h2>
    </div>
    <form method="post" class="designform" enctype="multipart/form-data">
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
        <div class="form-control">
            <input type="file" id="filehiddenbtn" name="uploaddata" hidden>
        </div>
        <img src="../assets/folder.png" class="uploadfile" id="uploadfile" alt="">
        <button type="submit" class="submitbtn">Upload</button>
    </form>

    <script>
        const image = document.getElementById("uploadfile");
const fileUpload = document.getElementById("filehiddenbtn");

image.addEventListener("click", function() {
  fileUpload.click();
});
    </script>


<?php
                    
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $semname = $_POST['semname'];
                    $file =  $_FILES['uploaddata']['tmp_name'];
                    $handle = fopen($file,"r");
                    $table = $semname.'uploadstu';
                    $i = 0;

                    while(($cont = fgetcsv($handle,1000,",")) !== false)
               {
                   if($i==0)
                   {
                    $Roll_no = $cont[0];
                    $sub = $cont[1];
                    $i++;
                    continue;
                   }
                   else
                   {
                        $query = "INSERT INTO $table VALUES('','$cont[0]','$cont[1]','$cont[2]')";
                   }
                   $i++;
                   $conn->query($query);
                   
               }
                    $table1 = $semname.'uploadsub';
                    $sql2 = "SELECT * FROM $table1";
                    $result2 = $conn->query($sql2);
   
                    while($row1 = $result2->fetch_assoc())
                     {
                    $table = $semname.'uploadstu';
                           $sql2 = "SELECT * FROM $table";
                           $result = $conn->query($sql2);
   
                           while($row = $result->fetch_assoc())
                           {
                              if(str_contains($row['Subject'] , $row1['subName']))
                                {
                                    $table = $semname.$row1['subName'];
                                   $que = "INSERT INTO $table VALUES (''," . $row['Roll_No'] .",'".$row['Name']."')";
                                   $conn->query($que);
                                }
                           }
                     }
                    }
?>

</body>
</html>