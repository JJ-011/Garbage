<?php
    require('utility/utility.php');
    ConnectDB();

    $sql = 'SELECT * FROM status1 WHERE name = "'.$_SESSION['user']['name'].'" ORDER BY No DESC';
    $rs = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าผู้มีขยะ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
    <div class="col-sm-3"> 
        <?php require('./nav.php')?>
    </div>
    <div class="col-sm-9"> 
        <div class="col-sm-14"> 
            <div class="col-10 container mt-4 text-center row">
                <hr>
                <div class="row mb-3">
                </div>
            </div>
        </div>

        <div class="col-sm-9"> 
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>รายการที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ข้อความ</th>
                    <th>สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = mysqli_num_rows($rs); while($row = mysqli_fetch_assoc($rs)){ 
                    $ssql = 'SELECT * FROM status1 WHERE name="'.$row['name'].'"';
                    $srs = mysqli_query($GLOBALS['conn'],$ssql);
                    $srow = mysqli_fetch_assoc($srs);    
                ?>
                <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $srow['name'] ?></td>
                    <td><?php echo $row['text'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                </tr>
                <?php $num--; } ?>
                <tr align="left">
                        <td colspan="6">ท่านมีประวัติการจองเวลารวมทั้งสิ้น <?php echo mysqli_num_rows($rs) ?> รายการ</td>
                    </tr>
                </th>
            </tbody>
        </table>
            
        </div>
    </div>
</div>
</body>
</html>