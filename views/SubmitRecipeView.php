<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Envio de Receita</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/public/base/css/BaseStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="" style="height: 100vh;">

<?php
    
    require_once '../config/modelsConfig.php';

    $Category->getAllCategory();
?>

<?php include('nav.php'); ?>
<div class="bg-light d-flex justify-content-center align-items-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">Envie uma Receita</h1>
                <?php
                    if (isset($_SESSION['error_message'])) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $_SESSION['error_message'];
                        echo '</div>';
                        unset($_SESSION['error_message']);
                    }
                ?>
                <form action="../scripts/SubmitRecipeScript.php" method="post" class="form-inline" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipeImage">Imagem da Receita:</label>
                        <input type="file" class="form-control" id="recipeImage" name="recipeImage" accept="image/*">
                    </div>
                
                    <div class="form-group">
                        <label for="recipeName">Nome da Receita:</label>
                        <input type="text" class="form-control" id="recipeName" name="recipeName" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="ingredientQuantity">Quantidade:</label>
                            <input type="number" class="form-control" id="ingredientQuantity" >
                        </div>
                        <div class="form-group col-md-5">
                            <label for="ingredientName">Nome do Ingrediente:</label>
                            <input type="text" class="form-control" id="ingredientName" >
                        </div>

                        <button type="button" class="btn btn-primary col-md-3 mt-4" style="height: 38px;" onclick="adicionarIngrediente()">Adicionar Ingrediente</button>
                    </div>

                    <!-- Lista de ingredientes (campo oculto) -->
                    <input type="hidden" id="ingredientListInput" name="ingredientList">

                    <div class="form-group">
                        <label>Lista de Ingredientes:</label>
                        <ul class="list-group mt-3" id="ingredientList"></ul>
                    </div>

                    <div class="form-group">
                        <label for="instructions">Instruções:</label>
                        <textarea class="form-control" id="instructions" name="instructions" rows="5" required></textarea>
                    </div>

                    <!-- Adicione o campo dropdown para seleção de categorias -->
                    <div class="form-group">
                        <label for="category">Categoria:</label>
                        <select class="form-control" id="category" name="category">
                            <?php foreach ($Category->getAllCategory() as $category) { ?>
                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cookingTime">Tempo de Cozimento (minutos):</label>
                            <input type="number" class="form-control" id="cookingTime" name="cookingTime" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="servingSize">Porções:</label>
                            <input type="number" class="form-control" id="servingSize" name="servingSize" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Enviar Receita</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script>
function adicionarIngrediente() {
    const ingredientName = document.getElementById('ingredientName').value;
    const ingredientQuantity = document.getElementById('ingredientQuantity').value;

    if (!ingredientName || !ingredientQuantity) {
        alert('Por favor, preencha o nome e a quantidade do ingrediente.');
        return;
    }

    const ingredientList = document.getElementById('ingredientList');
    const listItem = document.createElement('li');
    listItem.classList.add('list-group-item');
    listItem.textContent = `${ingredientQuantity}x - ${ingredientName}`;

    // Adicionando botão para remover o ingrediente
    const removeButton = document.createElement('button');
    removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'float-end');
    removeButton.textContent = 'Remover';
    removeButton.addEventListener('click', function() {
        listItem.remove();
        updateIngredientList();
    });

    listItem.appendChild(removeButton);
    ingredientList.appendChild(listItem);

    // Atualizar o campo oculto com a lista de ingredientes em JSON
    updateIngredientList();

    // Limpar os campos após adicionar o ingrediente
    document.getElementById('ingredientName').value = '';
    document.getElementById('ingredientQuantity').value = '';
}

function updateIngredientList() {
    const ingredients = Array.from(document.getElementById('ingredientList').children)
        .map(item => item.textContent.replace('Remover', '').trim());
    document.getElementById('ingredientListInput').value = JSON.stringify(ingredients);
}
</script>

</div>
</body>
</html>
