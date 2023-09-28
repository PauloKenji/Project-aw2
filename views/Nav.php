<link rel="stylesheet" type="text/css" href="/public/base/css/BaseStyle.css">

<nav class="navbar navbar-expand-lg navbar-light" style="padding-left: 20px; padding-right: 20px;">
        <a class="navbar-brand p-2" href="../scripts/HomeScript.php">Gousteu's</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link" href="CategoryView.php">Categorias</a>
            </div>
            
        </div>
        <?php
        session_start();

        if(isset($_COOKIE['auth_token'])){
            echo '<div class="navbar-nav float-right">
            <a class="nav-item nav-link" href="../scripts/LogoutScript.php">Logout</a>
            <a class="nav-item nav-link">|</a>
            <a class="nav-item nav-link" href="../scripts/GetRecipesScript.php">'. $_COOKIE['auth_token'] .'</a>
            </div>';
        }
        else{
            echo '<div class="navbar-nav float-right">
            <a class="nav-item nav-link" href="LoginView.php">Login</a>
            <a class="nav-item nav-link">|</a>
            <a class="nav-item nav-link" href="RegisterView.php">Cadastro</a>
        </div>';
        }
        ?>
    </nav>