<?php
    require('utility/utility.php');
    ConnectDB();
    $err = '';
    if(isset($_POST['btn1'])){
        $sql = 'SELECT * FROM address2 WHERE name_disposal="'.$_POST['name_disposal'].'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)!=0){$err = '<div class="alert alert-danger">ชื่อผู้ใช้นี้มีอยู่แล้ว</div>';}

        if($_POST['name_disposal']=="admin"){$err = '<div class="alert alert-danger">ไม่สามารถใช้ชื่อนี้ได้</div>';}

        if($err == ''){
            $sql = 'INSERT INTO address2 (name_disposal,password,name,est,tel,mail,house_no,village_no,alley,road,sub_area,district,Province,postal_code,latitude,longitude)
            VALUES ("'.$_POST['name_disposal'].'",
                    "'.md5($_POST['password']).'",
                    "'.$_POST['name'].'",
                    "'.$_POST['est'].'",
                    "'.$_POST['tel'].'",
                    "'.$_POST['mail'].'",
                    "'.$_POST['house_no'].'",
                    "'.$_POST['village_no'].'",
                    "'.$_POST['aliiey'].'",
                    "'.$_POST['road'].'",
                    "'.$_POST['sub_area'].'",
                    "'.$_POST['district'].'",
                    "'.$_POST['Province'].'",
                    "'.$_POST['postal_code'].'",
                    "'.$_POST['latitude'].'",
                    "'.$_POST['longitude'].'")';
            mysqli_query($GLOBALS['conn'],$sql);
            header("Location:./login2.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน ผุ้มีขยะ</title>
    <link rel="stylesheet" href="css/register1.css">
</head>

<body>

<div class="wrapper">
    <div class="form-box register">
        <h2>ลงทะเบียน</h2>
        <form action="#" method="post">
            <div class="input-box">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <input type="text" name="name_disposal" required>
                <label class="label">ชื่อผู้ใช้</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" name="password" required>
                <label class="label">Password</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="text" name="name" required>
                <label class="label">ชื่อ-นามสกล</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="text" name="est" required>
                <label class="label">สถานประกอบการ เช่น โรงเเรม หมู่บ้าน</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="text" name="tel" required maxlength="10">
                <label class="label">เบอร์โทรศัพท์</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="email" name="mail" required>
                <label class="label">E-mail</label>
            </div>
                <h4>ที่อยู่</h4>
            <div class="flex-container">
            <div class="input-box">
                <input type="text" name="house_no" required>
                <label class="label">บ้านเลขที่</label>
            </div>
            <div class="input-box">
                <input type="text" name="village_no" required>
                <label class="label">หมู่</label>
            </div>
            <div class="input-box">
                <input type="text" name="alley" required>
                <label class="label">ซอย</label>
            </div>
            <div class="input-box">
                <input type="text" name="road" required>
                <label class="label">ถนน</label>
            </div>
            <div class="input-box">
                <input type="text" name="sub_area" required>
                <label class="label">ตำบล</label>
            </div>
            <div class="input-box">
                <input type="text" name="district" required>
                <label class="label">อำเภอ</label>
            </div>
            <div class="input-box">
                <input type="text" name="Province" required>
                <label class="label">จังหวัด</label>
            </div>
            <div class="input-box">
                <input type="text" name="postal_code" required>
                <label class="label">เลขไปรษณีย์</label>
            </div>
            </div>
            <br>
            <h4>ละติจูด ลองจิจูดของสถานที่ตั้งใน google map</h4>
            <div class="flex-container">
            <div class="input-box">
                <input type="text" name="latitude" required>
                <label class="label">ละติจูด</label>
            </div>
            <div class="input-box">
                <input type="text" name="longitude" required>
                <label class="label">ลองจิจูด</label>
            </div>
        </div>
        <br><br>
            <button name="btn1" type="submit" class="btn" >ลงทะเบียน</button>
            <div class="login-register">
                <p>คุณต้องการยกเลิกใช่ไหม?  <a href="login1.php" class="login-link" >ยกเลิก</a></p>
            </div>
            <?php echo $err; ?>
        </form>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>