<!-- formulario de alta de tarea -->

<?php function showFormCategory(){ 

    require_once 'templates/header.php';  ?>
    <body>

    <div class="container mt-5">
        <h2>Carga de Categoria</h2>

        <form action="addCategory" method="POST">
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control" id="idCategoria" name="categoria">
            </div>
            <div class="mb-3">
                <label for="material" class="form-label">Material</label>
                <input type="text" class="form-control" id="nombreProducto" name="material">
            </div>
            <div class="mb-3">
                <label for="disponible" class="form-label">Disponible</label>
                <input type="number" class="form-control" id="precio" name="disponible">
            </div>
            <div class="mb-3">
                <label for="motor" class="form-label">Motor
                <input type="text" class="form-control" id="motor" name="motor">
            </div>
            <div class="mb-3">
                <label for="imagenCategoria" class="form-label">Imagen de la categoria</label>
                <input type="text" class="form-control" id="imagenCategoria" name="imagenCategoria">
            </div>
            <button type="submit" class="btn btn-primary">Guardar categoria</button>
        </form>
    </div>

    <?php

    require_once 'templates/footer.php'; 

 }