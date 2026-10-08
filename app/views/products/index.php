<?php require APP_PATH . '/views/layout/header.php'; ?>

<div class="stats">
  <div class="stat">
    <div class="num"><?= count($products) ?></div>
    <div class="label">📦 Productos registrados</div>
  </div>
  <div class="stat">
    <div class="num"><?= array_sum(array_column($products, 'stock')) ?></div>
    <div class="label">📊 Unidades en stock</div>
  </div>
</div>

<div class="card">
  <div class="section-head">
    <div>
      <h2>Productos</h2>
      <p class="subtitle" style="margin:0">Administra tu inventario</p>
    </div>
    <a class="btn primary" href="<?= BASE_URL ?>/product/create">＋ Nuevo producto</a>
  </div>

  <div class="table-wrap">
    <table>
      <thead>
        <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr>
      </thead>
      <tbody>
      <?php foreach ($products as $p): ?>
        <?php
          $stock = (int) $p['stock'];
          $badge = $stock === 0 ? 'zero' : ($stock <= 5 ? 'low' : 'ok');
        ?>
        <tr>
          <td>#<?= e($p['id']) ?></td>
          <td><strong><?= e($p['nombre']) ?></strong></td>
          <td><?= e($p['descripcion']) ?></td>
          <td class="price">$<?= number_format($p['precio'], 2) ?></td>
          <td><span class="badge <?= $badge ?>"><?= $stock ?></span></td>
          <td>
            <a class="btn warn btn-sm" href="<?= BASE_URL ?>/product/edit/<?= (int) $p['id'] ?>">✏️ Editar</a>
            <form class="inline" method="POST" action="<?= BASE_URL ?>/product/delete/<?= (int) $p['id'] ?>"
                  onsubmit="return confirm('¿Eliminar este producto?')">
              <button class="btn danger btn-sm" type="submit">🗑️ Eliminar</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
      <?php if (!$products): ?>
        <tr><td colspan="6" class="empty">✨ No hay productos todavía. ¡Crea el primero!</td></tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require APP_PATH . '/views/layout/footer.php'; ?>