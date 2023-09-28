<?php
// session_start();

// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get user input
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     // Validate user input (you can add more validation as needed)
//     if (empty($username) || empty($password)) {
//         $_SESSION["error"] = "Por favor, preencha todos os campos.";
//     } else {
//         // Store user data in the session
//         $_SESSION["username"] = $username;
//         $_SESSION["password"] = $password;

//         // Redirect to a success page or display a success message
//         header("Location: HomeView.php");
//         exit();
//     }
// }
// ?>


<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <style>
        /* Reset de estilos padrão do navegador */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos gerais da página */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Estilizando o contêiner do formulário com gradiente de fundo */
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            text-align: center;
            margin: 20px auto; /* Centraliza verticalmente e mantém margem em relação à parte superior */
        }

        /* Estilizando o título do formulário */
        h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        /* Estilizando os rótulos dos campos de entrada */
        label {
            font-size: 1rem;
            color: #555;
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        /* Estilizando os campos de entrada */
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            border-radius: 4px;
            width: 100%;
        }

        /* Estilizando o botão de login */
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Estilizando o botão de login quando em hover */
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <?php
            session_start();
            if (isset($_SESSION['error_message'])) {
                echo '<p style="color: black;">' . $_SESSION['error_message'] . '</p>';
                unset($_SESSION['error_message']);
            }
        ?>
        <form action="../scripts/RegisterScript.php" method="POST">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="confirmPassword">Confirmar senha:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>
            <input type="submit" value="Cadastrar">
        </form>
      <br>
      <p>Já possui cadastro? <a href="LoginView.php">Login</a></p>
    </div>
</body>
</html>
