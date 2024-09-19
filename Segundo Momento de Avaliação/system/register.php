<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <title>Registro de Utilizador</title>
    <style>


        body {
            font-family: 'Arial', sans-serif;
            background: url('register.jpg') center/cover no-repeat; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .form-container {
            width: 25%;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
        }

        input,
        select {
            margin-bottom: 16px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <?php
            // Verificar se o formulário foi enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Conectar ao banco de dados
                $host = 'localhost';
                $user = 'root';
                $pass = '';
                $db = 'testy';

                $conn = new mysqli($host, $user, $pass, $db);

                // Verificar a conexão
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Processar os dados do formulário
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
                $age = $_POST["age"];

                // Verificar se o e-mail já existe
                $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
                $result = $conn->query($checkEmailQuery);

                if ($result->num_rows > 0) {
                    echo "Erro: Email já existe. Por favor, escolha um email diferente.";
                } else {
                    // Inserir dados do usuário na tabela 'users'
                    $insertQuery = "INSERT INTO users (name, email, password, age, status, isactive, Registration_Date) VALUES ('$name', '$email', '$password', $age, 0, 1, NOW())";

                    if ($conn->query($insertQuery) === TRUE) {
                        echo "Registro bem-sucedido!";
                    } else {
                        echo "Erro: " . $insertQuery . "<br>" . $conn->error;
                    }
                }

                // Fechar a conexão com o banco de dados
                $conn->close();
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        
                <h2 style="margin-bottom: 10px;">Registrar</h2>
                <label for="name" style="display: block; margin-top: 10px;">Nome:</label>
                <input type="text" name="name" required style="margin-top: 5px; margin-bottom: 10px; padding: 5px;">   
                <label for="email" style="display: block; margin-top: 10px;">Email:</label>
                <input type="email" name="email" required style="margin-top: 5px; margin-bottom: 10px; padding: 5px;">
                <label for="password" style="display: block; margin-top: 10px;">Senha:</label>
                <input type="password" name="password" required style="margin-top: 5px; margin-bottom: 10px; padding: 5px;">
                <label for="age" style="display: block; margin-top: 10px;">Idade:</label>
                <input type="number" name="age" required style="margin-top: 5px; margin-bottom: 10px; padding: 5px;">
                <label for="gender" style="display: block; margin-top: 10px;">Gênero:</label>
                <select name="gender" required style="margin-top: 5px; margin-bottom: 10px; padding: 5px;">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
                <br>
                

                <button type="submit" style="padding: 10px;">Registrar</button>
            </form>
            <br>
            <p style="margin: 0;">Já possui uma conta? <a href="login.php">Faça login aqui</a></p>
        </div>
    </div>
</body>
</html>
