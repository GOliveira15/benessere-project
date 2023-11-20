<?php
include("config.php");

$connection = mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or die("Erro na conexão com o servidor! " . mysqli_connect_error());