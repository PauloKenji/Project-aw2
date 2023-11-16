<?php include_once '../scripts/VerifyAuth.php'?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Perfil
    </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/public/profile/css/ProfileStyle.css">
    <link rel="stylesheet" type="text/css" href="/public/base/css/BaseStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<header>
    <?php include('nav.php'); ?>
</header>
<div class="container mt-3">
    
<div class="text-center">
    <div class="middle-title d-flex justify-content-between align-items-center">
        <h1>Olá <?php echo $_COOKIE['auth_token']; ?></h1>
        <div class="add-new-recipe">
            <button type="button" class="btn btn-success">
                <a href="SubmitRecipeView.php" class="add">Adicionar nova receita</a>
            </button>
        </div>
    </div>
    <hr>
    
    <h3>Suas receitas</h3>
</div>

<style>
    .recipe {
        display: flex;
        cursor: pointer;
        margin-bottom: 20px;
    }

    .recipe-content {
        display: flex;
    }

    .recipe-image {
        width: 10rem;
        margin-right: 10px; /* Ajuste o espaçamento entre a imagem e o texto conforme necessário */
    }

    .recipe-text {
        flex-grow: 1;
    }

    .recipe-details {
        /* Adicione estilos conforme necessário */
    }
</style>

<?php        

            $recipes = json_decode($_COOKIE['recipes'], true);

            // echo $_COOKIE['recipes'];
            // echo '
            // <a href="receita1.php">
            //     <h3>'.$recipes["name"].'</h3>
            // </a>
            // ';
            
            foreach ($recipes as $recipe) {
                echo '<section class="recipe" onclick="redirectToRecipe(\'' . $recipe["id"] . '\')">';
                echo '<div class="recipe-content">';
                echo '<img src="../images/' . $recipe["image_name"] . '" alt="" class="recipe-image">';
                echo '<div class="recipe-text">';
                echo '<h3><i class="fas fa-utensils"></i>' . $recipe["name"] . '</h3>';
                echo '<div class="recipe-details">';
                echo '<p><img src="../public/images/wall-clock.png" alt="" style="width: 1.5rem;"> <b>Tempo de preparo:</b> ' . $recipe["cookingTime"] . ' minutos</p>';
                echo '<p><img src="../public/images/restaurant.png" alt="" style="width: 1.5rem;"> <b>Serve:</b> ' . $recipe["servingSize"] . ' Porção</p>';
                echo '</div>';
                echo '</div>'; // Fechar div.recipe-text
                echo '</div>'; // Fechar div.recipe-content
                echo '</section>';
            }
            
            
        ?>



    </div>

    <footer>
        <p>&copy; 2023 Gousteu's</p>
    </footer>


    <script src="/public/js/script.js"></script>
    <script>
        function redirectToRecipe(recipeID) {
            window.location.href = '../scripts/ShowRecipeScript.php?recipeID=' + recipeID;
        }
    </script>

</body>

</html>