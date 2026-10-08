<?php require APP_PATH . '/views/layout/header.php'; ?>
<div class="card" style="max-width:600px;margin:auto">
  <h2><?= !empty($product['id']) ? '✏️ Editar producto' : '✨ Nuevo producto' ?></h2>
  <p class="subtitle">Completa los datos del producto</p>

  <?php foreach ($errors as $err): ?><div class="error"><?= e($err) ?></div><?php endforeach; ?>

  <form method="POST" action="<?= BASE_URL . '/' . $action ?>">
    <label>Nombre</label>
    <input type="text" name="nombre" value="<?= e($product['nombre'] ?? '') ?>" required>

    <label>Descripción</label>
    <textarea name="descripcion" rows="3"><?= e($product['descripcion'] ?? '') ?></textarea>

    <label>Precio</label>
    <input type="number" step="0.01" min="0" name="precio" value="<?= e($product['precio'] ?? '') ?>" required>

    <label>Stock</label>
    <input type="number" min="0" name="stock" value="<?= e($product['stock'] ?? '') ?>" required>

    <button class="btn primary" type="submit">💾 Guardar</button>
    <a class="btn gray" href="<?= BASE_URL ?>/product/index">Cancelar</a>
  </form>
</div>
<?php require APP_PATH . '/views/layout/footer.php'; ?>