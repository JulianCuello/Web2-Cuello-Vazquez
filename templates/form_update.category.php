<?php function showFormCategoryUpdate($idCategory){
    
    require_once 'templates/header.php';  ?>
    <body>
    <div class="container mt-5">

        <h2>Modificacion de Categoria</h2>
        <form action="updateCategory" method="POST">
            
            <div class="mb-3">
                <label for="idCategoria" class="form-label">ID Categoria</label>
                <input type="text" class="form-control" id="idCategoria" name="idCategoria" value="<?php echo $idCategory?>">
            </div>
            <div class="mb-3">
                <label for="material" class="form-label">Material</label>
                <input type="text" class="form-control" id="material" name="material">
            </div>
            <div class="mb-3">
                <label for="disponible" class="form-label">Disponible </label>
                <input type="number" class="form-control" id="precio" name="disponible">
            </div>
            <div class="mb-3">
                <label for="motor" class="form-label">Motor</label>
                <input type="text" class="form-control" id="motor" name="motor">
            </div>
            <div class="mb-3">
                <label for="imagenCatalogo" class="form-label">imagen de Categoria</label>
                <input type="text" class="form-control" id="imagenCategoria" name="imagenCategoria">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>

    <?php

    require_once 'templates/footer.php'; 

 }