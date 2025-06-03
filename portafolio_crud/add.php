<?php
include 'auth.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $url_github = $_POST['url_github'];
  $url_produccion = $_POST['url_produccion'];

  $imagen = $_FILES['imagen']['name'];
  $tmp = $_FILES['imagen']['tmp_name'];
  move_uploaded_file($tmp, "uploads/$imagen");

  $sql = "INSERT INTO proyectos (titulo, descripcion, url_github, url_produccion, imagen) 
          VALUES ('$titulo', '$descripcion', '$url_github', '$url_produccion', '$imagen')";

  $conn->query($sql);
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Proyecto</title>
  <link rel="stylesheet" href="./assets/css/add.css">
</head>
<body>
  <div class="form-container">
    <h2>Nuevo Proyecto</h2>
    <form method="post" enctype="multipart/form-data" class="styled-form">
      <input type="text" name="titulo" placeholder="Título" required>
      
      <textarea name="descripcion" maxlength="200" placeholder="Descripción (máx 200 palabras)" required></textarea>
      
      <input type="url" name="url_github" placeholder="URL GitHub">
      
      <input type="url" name="url_produccion" placeholder="URL Producción">
      
      <input type="file" name="imagen" required>
      
      <button type="submit">Guardar</button>
      <br>
      <button type="button" onclick="location.href='index.php'" class="btn">Volver al inicio</button>

    </form>
  </div>
</body>
</html>
