<?php 
    require('utility/utility.php');
    ConnectDB();
    $err='';
    if(isset($_POST['btn1'])){
        $sql = 'SELECT * FROM address1 WHERE name_garbage="'.$_POST['name_garbage'].'" AND password = "'.md5($_POST['password']).'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        $data = mysqli_fetch_assoc($rs);
        if(mysqli_num_rows($rs)==1){
            $_SESSION['user'] = $data;
            header('Location:home1.php');
        }else{
            $err='<div class="alert">เกิดข้อผิดพลาด</div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ของผู้กำจัดขยะ</title>
    <link rel="stylesheet" href="css/login1.css">
</head>

<body>

<header>
    <h2 class="logo" >ระบบกำจัดเศษอาหาร</h2>
    <nav class="navigation">
            <a href="index.php" class="btnLogin-popup" style="text-align: center; display: block; padding-top: 10px; ">กลับ</a>
        </nav>
</header>
<div class="wrapper">
    <div class="form-box login">
        <h2>Login ผู้มีขยะ</h2>
        <form method="POST" action="#">
            <div class="input-box">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <input type="text" name="name_garbage" required>
                <label class="label">ชื่อผู้ใช้</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" name="password" required>
                <label class="label">รหัสผ่าน</label>
            </div>
            <button name="btn1" class="btn  p-3 w-100 mt-3" type="submit">Log in</button>
            <div class="login-register">
                <p>ยังไม่ลงทะเบียนใช่ไหม?<a href="register1.php" class="register-link" >  ลงทะเบียน</a></p>
            </div>
            <?php echo $err; ?>
        </form>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>