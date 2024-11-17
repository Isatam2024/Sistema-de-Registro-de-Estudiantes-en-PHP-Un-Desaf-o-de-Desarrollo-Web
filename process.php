<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $age = trim($_POST["age"]);
    $email = trim($_POST["email"]);
    $course = trim($_POST["course"]);
    $gender = $_POST["gender"] ?? "";
    $interests = $_POST["interests"] ?? [];


    if (empty($name) || empty($age) || empty($email) || empty($course) || empty($gender)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "El correo electrónico no es válido.";
    } elseif (!is_numeric($age) || $age < 18 || $age > 60) {
        $_SESSION['error'] = "La edad debe estar entre 18 y 60 años.";
    } elseif (empty($interests)) {
        $_SESSION['error'] = "Debe seleccionar al menos un área de interés.";
    } else {
        $_SESSION['success'] = "Registro exitoso.";
        $_SESSION['data'] = [
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'course' => $course,
            'gender' => $gender,
            'interests' => implode(", ", $interests),
        ];
    }


    header("Location: index.php");
    exit;
}
?>
