<!-- formulario de alta de tarea -->

<?php function showCategorias(){ 

    require_once 'templates/header.php';  ?>

    <body>
    <div class="container mt-5">

        <h2>Carga categoria</h2>
        <form action="addItem" method="POST">
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
                <label for="Ubicacion" class="form-label">Ubicacion</label>
                <input type="text" class="form-control" id="Ubicacion" name="Ubicacion">
            </div>
            <div class="mb-3">
                <label for="Material" class="form-label">Material</label>
                <input type="text" class="form-control" id="material" name="material">
            </div>
            <div class="mb-3">
                <label for="disponible" class="form-label">Disponible</label>
                <input type="number" class="form-control" id="disponible" name="disponible">
            </div>
            <div class="mb-3">
                <label for="motor" class="form-label">Motor</label>
                <input type="text" class="form-control" id="motor" name="motor">
            </div>
            <div class="mb-3">
                <label for="imagenCategoria" class="form-label">Imagen Categoria</label>
                <input type="text" class="form-control" id="imagenCategoria" name="imagenCategoria">
            </div>
            <button type="submit" class="btn btn-primary">Guardar categoria</button>
        </form>
    </div>

    <?php

    require_once 'templates/footer.php'; 

 }