<?php
if(!(isset($_SESSION['lgid']) && !empty($_SESSION['lgid']))) {
    header("location:../Index/");
}
?>