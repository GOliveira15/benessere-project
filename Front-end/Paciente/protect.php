<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['paciente_id'])) {

    header("location:entrarpaciente.php");
    die();
}