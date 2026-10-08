<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestión de Productos</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
<body>
<nav>
  <span class="brand">🛍️ Gestión de Productos</span>
  <?php if (Auth::check()): ?>
    <div class="nav-user">
      <span class="avatar">👤 <?= e($_SESSION['username']) ?></span>
      <a href="<?= BASE_URL ?>/auth/logout">Cerrar sesión</a>
    </div>
  <?php endif; ?>
</nav>
<div class="container">