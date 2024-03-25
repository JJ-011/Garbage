<?php
    date_default_timezone_set("Asia/Bangkok");
    $GLOBALS['conn']=null;
    session_start();

    function ConnectDB(){
        $GLOBALS['conn'] = mysqli_connect('localhost','root','66309010022','garbage');
        if(mysqli_errno($GLOBALS['conn'])){
            echo '<h1>เชื่อมต่อฐานข้อมูลไม่ได้</h1>';
            exit();
        }
    }
    function checkLogin(){
        if(!isset($_SESSION['user'])){
            if(!isset($_SESSION['technician'])){
                header('Location:../login.php');
            }
        }
    }
?>