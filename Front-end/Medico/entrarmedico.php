<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="../CSS/signin.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../../Recursos/favicon.png">

    <title>Clínica Benessere | Entrar do Médico</title>
</head>

<body class="text-center">
    <form action="" method="POST" class="form-signin">
        <img class="mb-4" src="../../Recursos/medico.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Por favor, entre</h1>
        <label for="inputEmail" class="sr-only">Endereço de e-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Insira seu e-mail" required
            autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Insira a sua senha"
            required>
        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Entrar</button>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "benessere";

        $connection = new mysqli($servername, $username, $password, $dbname);
        session_start(); // Inicia a sessão
        
        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $connection->real_escape_string($_POST['email']);
            $password = $connection->real_escape_string($_POST['password']);

            $sql_code = "SELECT * FROM medico WHERE email = '$email' AND senha = '$password'";
            $sql_query = $connection->query($sql_code) or die("Falha na execução do código SQL:" . $connection->error);

            $quantidade = $sql_query->num_rows;

            if ($quantidade == 1) {
                $usuario = $sql_query->fetch_assoc();

                $_SESSION['medico_id'] = $usuario['medico_id'];
                $_SESSION['nome_completo'] = $usuario['nome_completo'];

                header("Location: medico.php");
                exit();
            } else {
                echo
                "<div class='alert alert-danger mt-4 text-center' role='alert'>
                    E-mail ou senha incorretos
                </div>";
            }
        }

        // Fecha a conexão
        $connection->close();
        ?>

        <div class="text-center mt-4">
            <a href="../index.html">Voltar para a página anterior</a>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; 2023 Clínica Benessere</p>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>