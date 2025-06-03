<?php
include 'auth.php';
include 'db.php';

$id = $_GET['id'];
$proyecto = $conn->query("SELECT * FROM proyectos WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $url_github = $_POST['url_github'];
  $url_produccion = $_POST['url_produccion'];

  if ($_FILES['imagen']['name']) {
    $imagen = $_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/$imagen");
    $img_sql = ", imagen='$imagen'";
  } else {
    $img_sql = "";
  }

  $sql = "UPDATE proyectos SET titulo='$titulo', descripcion='$descripcion', url_github='$url_github', url_produccion='$url_produccion' $img_sql WHERE id=$id";
  $conn->query($sql);
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Proyecto</title>
  <link rel="stylesheet" href="./assets/css/edit.css">
</head>
<body>
  <div class="form-container">
    <h2>Editar Proyecto</h2>
    <form method="post" enctype="multipart/form-data" class="styled-form">
      <input type="text" name="titulo" value="<?= htmlspecialchars($proyecto['titulo']) ?>" required>
      
      <textarea name="descripcion" maxlength="200" required><?= htmlspecialchars($proyecto['descripcion']) ?></textarea>
      
      <input type="url" name="url_github" value="<?= htmlspecialchars($proyecto['url_github']) ?>">
      
      <input type="url" name="url_produccion" value="<?= htmlspecialchars($proyecto['url_produccion']) ?>">
      
      <input type="file" name="imagen">
      
      <button type="submit">Actualizar</button>
      <br>
      <button type="button" onclick="location.href='index.php'" class="btn">Volver al inicio</button>
    </form>
  </div>
</body>
</html>
