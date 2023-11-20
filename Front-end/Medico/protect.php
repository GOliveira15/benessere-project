<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['medico_id'])) {

    header("location:entrarmedico.php");
    die();
}