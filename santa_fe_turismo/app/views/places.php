
<?php require 'header.php'; ?>

<h1>¡ Los lugares mas Bonitos estan en Santa Fe ! </h1>

<?php if(isset($_SESSION['user'])): 
?>


<?php endif; ?>

<input
type="text"
id="search"
placeholder="Buscar lugares..."
style="
padding:10px;
width:100%;
margin:20px 0;
"
>


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
src="/santa_fe_turismo/public/uploads/<?= $p['image'] ?>"
class="place-image"
>

<?php endif; ?>

<p><?= htmlspecialchars($p['location']) ?></p>

</div>

<?php endforeach; ?>

<div
id="map"
style="
height:400px;
margin-top:20px;
border-radius:10px;
">
</div>

<script>

const map = L.map('map')
.setView([-31.6333, -60.7000], 13);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
attribution: '&copy; OpenStreetMap'
}
).addTo(map);

let marker;

map.on('click', function(e){

const lat = e.latlng.lat;
const lng = e.latlng.lng;

document.getElementById('latitude').value = lat;
document.getElementById('longitude').value = lng;

if(marker){
map.removeLayer(marker);
}

marker = L.marker([lat, lng])
.addTo(map);

});

</script>


<script>

navigator.geolocation
.getCurrentPosition(pos => {

const lat =
pos.coords.latitude;

const lng =
pos.coords.longitude;

L.marker([lat,lng])
.addTo(map)
.bindPopup('Tu ubicación');

});

</script>


<?php require 'footer.php'; ?>

<script>

const search =
document.getElementById('search');

search.addEventListener('keyup', () => {

const text =
search.value.toLowerCase();

document
.querySelectorAll('.place-card')
.forEach(card => {

const content =
card.innerText.toLowerCase();

card.style.display =
content.includes(text)
? 'block'
: 'none';

});

});

</script>



<script>

const imageInput =
document.querySelector(
'input[type=file]'
);

const preview =
document.getElementById('preview');

imageInput.addEventListener(
'change',
e => {

const file =
e.target.files[0];

if(file){

preview.src =
URL.createObjectURL(file);

preview.style.display =
'block';

}

});

</script>
