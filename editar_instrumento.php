<?php
require_once __DIR__ . '/includes/functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$instrumento = obtenerInstrumentoPorId($_GET['id']);

if (!$instrumento) {
    header("Location: index.php?mensaje=Instrumento no encontrado");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarInstrumento($_GET['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['tipo'], $_POST['precio'], $_POST['stock']);
    if ($count > 0) {
        header("Location: index.php?mensaje=Instrumento actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar el instrumento.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Instrumento</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Editar Instrumento</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($instrumento['nombre']); ?>" required></label>
            <label>Descripción: <textarea name="descripcion" required><?php echo htmlspecialchars($instrumento['descripcion']); ?></textarea></label>
            <label>
                Tipo: 
                <select name="tipo" id="tipo" required>
                    <option value="Viento">Intrumento de viento</option>
                    <option value="Percución">Intrumento de percución</option>
                    <option value="Cuerda">Intrumento de cuerda</option>
                    <option selected disabled value=""><?php echo htmlspecialchars($instrumento['tipo']); ?></option>
                </select>
            </label>
            <label>Precio: <input type="number" name="precio" value="<?php echo htmlspecialchars($instrumento['precio']); ?>" required></label>
            <label>Stock: <input type="number" name="stock" value="<?php echo htmlspecialchars($instrumento['stock']); ?>" required></label><br>
            <input type="submit" value="Actualizar Instrumento">
        </form>
        <a href="index.php" class="button">Volver a la lista de productos</a>
    </div>
</body>

</html>