<?php include_once '../scripts/VerifyAuth.php'?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Categorias
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
       
    <h1>Categorias</h1>
    <hr>
</div>

<?php        

    require_once '../config/modelsConfig.php';

    $allCategory = $Category->getAllCategory();


    // echo $_COOKIE['recipes'];
    // echo '
    // <a href="receita1.php">
    //     <h3>'.$recipes["name"].'</h3>
    // </a>
    // ';
    
    foreach ($allCategory as $cat) {
        echo '<section class="recipe" onclick="redirectToCategory(\'' . $cat["id"] . '\')">';
        echo '<div class="recipe-details">';
        echo '<h3>';
        echo $cat['name'];  
        echo '</h3>';
        echo '</div>';
        echo '</section>';
    }
    
?>

    </div>

    <footer>
        <p>&copy; 2023 Gousteu's</p>
    </footer>


    <script src="/public/js/script.js"></script>
    <script>
        function redirectToCategory(recipeID) {
            window.location.href = '../scripts/ShowCategoryScript.php?category=' + recipeID;
        }
    </script>

</body>

</html>