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

    
    <div class="container mt-3">
        <main>
            <section>

                <h1><?php 
                        $recipe = json_decode($_COOKIE['recipe'], true);
                        $ingredients = json_decode($_COOKIE['ingredients'], true);
                        echo $recipe['name'];
                    ?></h1>
                    <hr>
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
            </section>
            <!-- Outras seções com destaque ou informações adicionais podem ser adicionadas aqui -->

        </main>
    </div>



    <script src="/public/js/script.js"></script>
</body>

</html>