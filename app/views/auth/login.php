<?php require APP_PATH . '/views/layout/header.php'; ?>
<div class="auth-wrap">
  <div class="card auth-card">
    <div class="logo">🔐</div>
    <h2>¡Bienvenido!</h2>
    <p class="subtitle">Inicia sesión para administrar tus productos</p>

    <?php if ($error): ?><div class="error"><?= e($error) ?></div><?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/auth/login">
      <label>Usuario</label>
      <input type="text" name="username" placeholder="Tu usuario" required autofocus>
      <label>Contraseña</label>
      <input type="password" name="password" placeholder="••••••••" required>
      <button class="btn primary" type="submit">Entrar</button>
    </form>
  </div>
</div>
<?php require APP_PATH . '/views/layout/footer.php'; ?>