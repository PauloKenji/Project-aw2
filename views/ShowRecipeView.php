<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $recipe['name']; ?>
    </title>
    <style>
        .recipe-instructions {
            word-wrap: break-word;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/public/base/css/BaseStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<header>
    <?php include('nav.php');?>
</header>
<style>
    .recipe-section {
        display: flex;
        align-items: center;
    }

    .recipe-image {
        max-width: 300px; /* Ajuste conforme necessário */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 0 20px rgba(0, 0, 0, 0.1); /* Adiciona uma sombra suave */
        margin-right: 20px; /* Espaçamento entre a imagem e o texto */
        border-radius: 8px; /* Adiciona bordas arredondadas para um visual mais suave */
    }

    .recipe-instructions {
        word-wrap: break-word;
    }
</style>
    
    <div class="container mt-3">
        <main>
            <section>

                <h1><?php 
                        $recipe = json_decode($_COOKIE['recipe'], true);
                        $ingredients = json_decode($_COOKIE['ingredients'], true);
                        echo $recipe['name'];
                    ?></h1>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <img src="../images/<?php echo $recipe['image_name'] ?>" alt="" class="recipe-image" width="100%">
                        </div>
                        <div class="col-4">

                            <p><img src="../public/images/wall-clock.png" alt="" style="width: 1.5rem;"> <b>Tempo de preparo:</b> <?php echo $recipe['cookingTime'] ?> minutos</p>
                            <p><img src="../public/images/restaurant.png" alt="" style="width: 1.5rem;"> <b>Serve:</b> <?php echo $recipe['servingSize'] ?> Porções</p>
                            <h4>Igredientes:</h4>
                            <ul>
                                <?php
                                foreach ($ingredients as $ingredient) {
                                    echo '<li>' . $ingredient["quantity"] . 'x ' . $ingredient["name"] . '</li>';
                                }
                            ?>
                        </ul>
                        <p class="recipe-instructions"><i class="fas fa-info-circle"></i><b> Modo de preparo: </b> <br><?php echo $recipe['instructions'] ?></p>
                    </div>
                </div>
            </section>
            <!-- Outras seções com destaque ou informações adicionais podem ser adicionadas aqui -->
            
        </main>
    </div>
    


    <script src="/public/js/script.js"></script>
</body>

</html>