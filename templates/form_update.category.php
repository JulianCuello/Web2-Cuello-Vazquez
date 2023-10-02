<?php function showFormCategoryUpdate($idCategory){
    
    require_once 'templates/header.php';  ?>
    <body>
    <div class="container mt-5">

        <h2>Modificacion de Categoria</h2>
        <form action="updateCategory" method="POST">
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-select" id="categoria" name="idCategoria">
                    <option value="1">motor</option>
                    <option value="2">carroceria</option>
                    <option value="3">suspension</option>
                    <option value="4">refrigeracion</option>
                    <option value="5">frenos</option>
                    <option value="6">iluminacion</option>
                    <option value="7">interior</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicacion</label>
                <input type="text" class="form-control" id="idProducto" name="ubicacion" value="<?php echo $ubicacion?>">
            </div>
            <div class="mb-3">
                <label for="material" class="form-label">Material</label>
                <input type="text" class="form-control" id="material" name="material">
            </div>
            <div class="mb-3">
                <label for="nombreProducto" class="form-label">Nombre de Producto</label>
                <input type="text" class="form-control" id="nombreProducto" name="nombreProducto">
            </div>
            <div class="mb-3">
                <label for="disponible" class="form-label">Disponible </label>
                <input type="number" class="form-control" id="precio" name="Disponible">
            </div>
            <div class="mb-3">
                <label for="motor" class="form-label">Motor</label>
                <input type="text" class="form-control" id="motor" name="motor">
            </div>
            <div class="mb-3">
                <label for="imagenCatalogo" class="form-label">imagen de catalogo</label>
                <input type="text" class="form-control" id="imagenCatalogo" name="imagenCatalogo">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>

    <?php

    require_once 'templates/footer.php'; 

 }