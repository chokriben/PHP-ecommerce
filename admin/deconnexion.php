<?php
session_start();
if(isset ($_SESSION['zWu123']) ){
    $_SESSION['zWu123'].array();
    session_destroy();
    header("location: ../");

}
else{
    header("location: ../login.php");
}
?>