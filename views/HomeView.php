<!DOCTYPE html>
<html>

<head>
    <title>
        Home
    </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/public/base/css/BaseStyle.css">
    <link rel="stylesheet" type="text/css" href="/public/home/css/HomeStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<header>
    <?php include('nav.php'); ?>
</header>

<div class="text-center">
  <img src="https://media.self.com/photos/622912847b959736301bfb91/16:9/w_2111,h_1187,c_limit/GettyImages-1301412050.jpg" class="img-fluid" id="banner" alt="Responsive image">
  <div class="middle-title">
    Bem-Vindo ao Gousteu's
  </div>
</div>

    <div class="container mt-3">
        <main>
            <section>
                <h2>Explore nossas receitas deliciosas</h2>
                <p>Descubra uma variedade de receitas incríveis para experimentar e desfrutar.</p>
            </section>
            <!-- Outras seções com destaque ou informações adicionais podem ser adicionadas aqui -->

        </main>
    </div>
    <div class="container">
        <?php
            $recipes = json_decode($_COOKIE['recipes'], true);
            
            foreach ($recipes as $recipe) {
                echo '<section class="recipe" onclick="redirectToRecipe(\'' . $recipe["id"] . '\')">';
                echo '<h3><i class="fas fa-utensils"></i>' . $recipe["name"] . '</h3>';
                echo '<div class="recipe-details">';
                echo '<p><img src="../public/images/wall-clock.png" alt="" style="width: 1.5rem;"> <b>Tempo de preparo:</b> ' . $recipe["cookingTime"] . ' minutos</p>';
                echo '<p><img src="../public/images/restaurant.png" alt="" style="width: 1.5rem;"> <b>Serve:</b> ' . $recipe["servingSize"] . ' Porção</p>';
                echo '<p><img src="../public/images/do-utilizador.png" alt="" style="width: 1.5rem;"> <b>Feito por:</b> '. $recipe['user'] .'</p>';
                
                echo '</div>';
                echo '</section>';
            }
        ?>
    </div>
    <script>
        function redirectToRecipe(recipeID) {
            window.location.href = '../scripts/ShowRecipeScript.php?recipeID=' + recipeID;
        }
    </script>

    <footer>
        <p>&copy; 2023 Gousteu's</p>
    </footer>


    <script src="/public/js/script.js"></script>
</body>

</html>