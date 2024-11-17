<?php
session_start();

$successMessage = $_SESSION['success'] ?? "";
$errorMessage = $_SESSION['error'] ?? "";
$registeredData = $_SESSION['data'] ?? [];
unset($_SESSION['success'], $_SESSION['error'], $_SESSION['data']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <h1>Formulario de Registro</h1>

    <!-- Mensajes de éxito o error -->
    <?php if ($errorMessage): ?>
        <div class="alert error"><?php echo htmlspecialchars($errorMessage); ?></div>
    <?php endif; ?>
    <?php if ($successMessage): ?>
        <div class="alert success"><?php echo htmlspecialchars($successMessage); ?></div>
    <?php endif; ?>

    <!-- Mostrar datos registrados -->
    <?php if (!empty($registeredData)): ?>
        <section class="registered-data">
            <h2>Datos registrados:</h2>
            <p><strong>Nombre completo:</strong> <?php echo htmlspecialchars($registeredData['name']); ?></p>
            <p><strong>Edad:</strong> <?php echo htmlspecialchars($registeredData['age']); ?></p>
            <p><strong>Correo electrónico:</strong> <?php echo htmlspecialchars($registeredData['email']); ?></p>
            <p><strong>Curso de interés:</strong> <?php echo htmlspecialchars($registeredData['course']); ?></p>
            <p><strong>Género:</strong> <?php echo htmlspecialchars($registeredData['gender']); ?></p>
            <p><strong>Áreas de interés:</strong> <?php echo htmlspecialchars($registeredData['interests']); ?></p>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="button">Registrar otro</a>
        </section>
    <?php else: ?>
        <!-- Formulario -->
        <form action="process.php" method="POST">
            <label for="name">Nombre completo:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Edad:</label>
            <input type="number" id="age" name="age" min="18" max="60" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="course">Curso de interés:</label>
            <input type="text" id="course" name="course" required>

            <label for="gender">Género:</label>
            <div class="gender">
                <label for="male">Masculino</label>
                <input type="radio" id="male" name="gender" value="Masculino" required>

                <label for="female">Femenino</label>
                <input type="radio" id="female" name="gender" value="Femenino">
            </div>

            <label for="interests">Áreas de interés:</label>
            <div class="interests">
                <label for="tech">Tecnología</label>
                <input type="checkbox" id="tech" name="interests[]" value="Tecnología">

                <label for="science">Ciencia</label>
                <input type="checkbox" id="science" name="interests[]" value="Ciencia">

                <label for="art">Arte</label>
                <input type="checkbox" id="art" name="interests[]" value="Arte">
            </div>

            <button type="submit">Registrar</button>
        </form>
    <?php endif; ?>
</main>
</body>
</html>
