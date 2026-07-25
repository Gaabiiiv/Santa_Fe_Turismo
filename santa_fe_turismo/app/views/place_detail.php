<?php require 'header.php'; ?>

<h1><?= htmlspecialchars($place['name']) ?></h1>

<?php if($place['image']): ?>

<img
src="/santa_fe_turismo/public/uploads/<?= $place['image'] ?>"
width="400"
>

<?php endif; ?>

<p><?= htmlspecialchars($place['description']) ?></p>

<p>📍 <?= htmlspecialchars($place['location']) ?></p>

<div
id="placeMap"
style="
height:400px;
margin-top:20px;
border-radius:10px;
">
</div>

<script>

const placeMap = L.map('placeMap')
.setView(
[
<?= $place['latitude'] ?>,
<?= $place['longitude'] ?>
],
15
);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
attribution: '&copy; OpenStreetMap'
}
).addTo(placeMap);

L.marker([
<?= $place['latitude'] ?>,
<?= $place['longitude'] ?>
])
.addTo(placeMap)
.bindPopup(
'<?= htmlspecialchars($place['name']) ?>'
);

</script>


<h3>
Valoración del lugar <?= round($average,1) ?> ⭐
</h3>

<?php if(isset($_SESSION['user'])): ?>

<form method="POST"
action="index.php?action=rate">

<input
type="hidden"
name="place_id"
value="<?= $place['id'] ?>"
>

<input
type="number"
name="score"
placeholder= "Introduzca su valoracion del lugar del 1 al 5"
min="1"
max="5"
required
>

<textarea
name="comment"
placeholder="Comentario"
></textarea>

<button>Enviar</button>

</form>

<?php endif; ?>

<hr>

<?php foreach($ratings as $r): ?>

<div class="place-card">

<strong><?= $r['score'] ?> ⭐</strong>

<p><?= htmlspecialchars($r['comment']) ?></p>

</div>

<?php endforeach; ?>

<?php require 'footer.php'; ?>
