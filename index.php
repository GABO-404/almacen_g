<?php
    require_once __DIR__ .'/includes/functions.php';
    $instrumentos = obtenerInstrumentos();
    if (isset($_GET["mensaje"])){
        $message = $_GET["mensaje"];
    }
    if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
        $count = eliminarInstrumento($_GET['id']);
        $mensaje = $count > 0 ? "Instrumento eliminado con éxito." : "No se pudo eliminar el instrumento.";
        header("Location: index.php?mensaje=$mensaje");
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de instrumentos</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
       <CENTER> <h1>Instrumentos</h1>

        <?php if (isset($message)): ?>
            <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <script>
                alert("<?php echo $message; ?>");
                window.location.href = "index.php";
            </script>
            </div>
        <?php endif; ?>

        <a href="agregar_instrumento.php" class="button">Agregar Nuevo Instrumento</a>

        <h2>Lista de Instrumentos</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Disponible</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($instrumentos as $instrumento): ?>
            <tr>
                <td><?php echo htmlspecialchars($instrumento['nombre']); ?></td>
                <td><?php echo htmlspecialchars($instrumento['descripcion']); ?></td>
                <td><?php echo htmlspecialchars($instrumento['tipo']); ?></td>
                <td><?php echo htmlspecialchars($instrumento['precio']); ?></td>
                <td><?php echo htmlspecialchars($instrumento['stock']); ?></td>
                <td><?php echo htmlspecialchars($disponible = $instrumento['stock'] > 0 ? 'SI' : 'NO'); ?></td>
                <td class="actions">
                <a href="editar_instrumento.php?id=<?php echo $instrumento['_id']; ?>" class="button">Editar</a>
                    <a href="index.php?accion=eliminar&id=<?php echo $instrumento['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar este instrumento?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table></CENTER>
    </div>
</body>
</html>