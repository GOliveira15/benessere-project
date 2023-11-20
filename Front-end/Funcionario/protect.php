<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['funcionario_id'])) {

    header("location:entrarfuncionario.php");
    die();
}