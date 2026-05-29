<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Santa Fe Turismo</title>

<style>

body{
    font-family:Arial;
    margin:0;
    background:#f5f5f5;
}

header{
    background:#0077cc;
    color:white;
    padding:15px;
}

nav a{
    color:white;
    margin-right:15px;
    text-decoration:none;
}

.container{
    width:90%;
    margin:20px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

.place-card{
    border:1px solid #ddd;
    padding:15px;
    margin-bottom:15px;
    border-radius:10px;
}

input,
textarea,
button{
    width:100%;
    padding:10px;
    margin-top:10px;
}

button{
    background:#0077cc;
    color:white;
    border:none;
}

img{
    border-radius:10px;
}

</style>

</head>

<body>

<header>

<h1>🌎 Santa Fe Turismo</h1>

<nav>

<a href="index.php?action=places">Inicio</a>

<?php if(isset($_SESSION['user'])): ?>

<span>
Bienvenido <?= $_SESSION['user']['username'] ?>
</span>

<a href="index.php?action=logout">
Cerrar sesión
</a>

<?php else: ?>

<a href="index.php?action=login">Login</a>

<a href="index.php?action=register">
Registro
</a>

<?php endif; ?>

</nav>

</header>

<div class="container">
