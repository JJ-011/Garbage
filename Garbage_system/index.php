<?php 
    require('utility/utility.php');
    ConnectDB();
    if(isset($_POST['btn1'])){
        header('Location: login1.php');
        exit(); 
    } elseif(isset($_POST['btn2'])){ 
        header('Location: login2.php');
        exit(); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตัวเลือก</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

<div class="wrapper">
    <div class="form-box login">
        <h2>ระบบกำจัดเศษอาหาร</h2><br>
        <h3>โปรดเลือก</h3><br>
        <form method="POST" action="#">
            <button name="btn1" class="btn  p-3 w-100 mt-3" type="submit">ผู้มีขยะ</button>
            <br>
            <br>
            <button name="btn2" class="btn  p-3 w-100 mt-3" type="submit">ผู้กำจัดขยะ</button>
        </form>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>