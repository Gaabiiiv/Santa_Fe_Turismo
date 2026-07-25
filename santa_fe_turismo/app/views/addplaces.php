<?php require 'header.php'; ?>

<h1>Añada un lugar para visitar en la ciudad de Santa Fe !!</h1>

<?php if(isset($_SESSION['user'])): ?>

<form
method="POST"
action="index.php?action=create_place"
enctype="multipart/form-data"
>

<input name="name" placeholder="Nombre del lugar turistico" required>

<input name="location"
placeholder="Ubicación (Calle y Numero)"
required>

<input name="latitude"
placeholder="Ingrese latitud"
required>

<input name="longitude"
placeholder="Ingrese longitud"
required>

<textarea
name="description"
placeholder="Descripción informativa del lugar"
></textarea>

<input
type="file"
name="image"
accept="image/*"
>

<button>Guardar Lugar</button>

</form>
<?php else: ?>
    <!-- Mensaje que se muestra si NO inició sesión -->
    <p>Por favor, inicie sesión para ver este contenido.</p>
<?php endif; ?>

<hr>





<?php require 'footer.php'; ?>
