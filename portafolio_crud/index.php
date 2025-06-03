<?php
include 'auth.php';
include 'db.php';
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Proyectos</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>


  <header class="top-bar">
    <h1>PORTAFOLIO</h1>
    <nav>
      <a href="add.php" class="btn-agregar">+ Agregar Proyecto</a>
      <a href="logout.php" class="btn-salir">Cerrar sesión</a>
    </nav>
  </header>

  <main class="contenido">
    <h2>Proyectos</h2>
<div class="conProyectos">
    <?php while($row = $result->fetch_assoc()): ?>
      <article class="proyecto">
        <header>
          <h3><?= htmlspecialchars($row['titulo']) ?></h3>
        </header>

        <p><?= nl2br(htmlspecialchars($row['descripcion'])) ?></p>

        <?php if (!empty($row['imagen'])): ?>
          <img src="./uploads/<?= htmlspecialchars($row['imagen']) ?>" alt="Imagen del proyecto" width="150">
        <?php endif; ?>

        <div class="botones">
  <a class="btn" href="<?= htmlspecialchars($row['url_github']) ?>" target="_blank">GitHub</a>
  <a class="btn" href="<?= htmlspecialchars($row['url_produccion']) ?>" target="_blank">Enlace</a>
  <a class="btn edit" href="edit.php?id=<?= $row['id'] ?>">Editar</a>
  <a class="btn delete" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este proyecto?')">Eliminar</a>
</div>

      </article>
    <?php endwhile; ?>
</div>
  </main>

</body>
<footer>Todos los derechos resservados 2025</footer>
</html>
