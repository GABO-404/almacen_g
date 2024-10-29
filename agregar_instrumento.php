<?php
require_once __DIR__ . '/includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = crearInstrumento($_POST['nombre'], $_POST['descripcion'], $_POST['tipo'], $_POST['precio'], $_POST['stock']);
    if ($id) {
        header("Location: index.php?mensaje=Instrumento creado con éxito");
        exit;
    } else {
        $error = "No se pudo crear el instrumento.";
    }
}
?>
<?php if (isset($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Instrumento</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Agregar Nuevo Instrumento</h1>
        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" required></label>
            <label>Descripción: <textarea name="descripcion" required></textarea></label>
            <label>
                Tipo:
                <select name="tipo" id="tipo" required> 
                    <option value="Viento">Intrumento de viento</option>
                    <option value="Percución">Intrumento de percución</option>
                    <option value="Cuerda">Intrumento de cuerda</option>
                </select>
            </label>
            <label>Precio: <input type="number" name="precio" required></label>
            <label>Stock: <input type="number" name="stock" required></label>
            <input type="submit" value="Agregar Producto">
        </form>
        <a href="index.php" class="button">Volver a la lista de instrumentos</a>
    </div>
</body>

</html>