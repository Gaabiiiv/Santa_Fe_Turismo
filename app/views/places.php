<?php require 'header.php'; ?>

<h1>Lugares</h1>

<?php if(isset($_SESSION['user'])): ?>

<form
method="POST"
action="index.php?action=create_place"
enctype="multipart/form-data"
>

<input name="name" placeholder="Nombre" required>

<input name="location"
placeholder="Ubicación"
required>

<textarea
name="description"
placeholder="Descripción"
></textarea>

<input
type="file"
name="image"
accept="image/*"
>

<button>Guardar</button>

</form>

<?php endif; ?>

<hr>

<?php foreach($places as $p): ?>

<div class="place-card">

<h3>

<a href="index.php?action=place&id=<?= $p['id'] ?>">

<?= htmlspecialchars($p['name']) ?>

</a>

</h3>

<?php if($p['image']): ?>

<img
src="uploads/<?= $p['image'] ?>"
width="250"
>

<?php endif; ?>

<p><?= htmlspecialchars($p['location']) ?></p>

</div>

<?php endforeach; ?>

<?php require 'footer.php'; ?>
