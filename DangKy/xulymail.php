<?php
    session_start(); 
    if(isset($_POST['verify'])&&$_POST['code']==$_SESSION['verify'])
    {
        header('Location:xulydangky.php?kq=1');
    }
?>