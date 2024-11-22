<?php
session_start();
if (!isset($_SESSION['usuario'])){
    echo '
        <script>
            alert("PRIMERO INICIA SESION!");
            window.location = "../index.php";
        </script>
    ';
    session_destroy();
    die();
}

// Obtener el dni_viajero de los datos GET
$dni_viajero = $_GET['dni_viajero'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Turismo</title>
    <link rel="icon" href="../assets/images/logo.ico">
    <link rel ="stylesheet" href="../assets/css/style.css">
    <!-- Agrega aquí tus enlaces a CSS, scripts, etc. -->
</head>
<body>
    
<header id="main-header">
    <i><a id="logo-header" href="#">
        <span class="site-name">TURYBUS</span>
        <span class="site-desc">turismo / Viajes / Experiencias </span>
    </a></i>
    <br>
    <a href="cerrar_sesion.php" class="shadow-effect">SALIR</a><br>
</header>

<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto_final";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

<?php
$sql = "SELECT folleto.*, servicios_diarios.ruta AS nombre_ruta
FROM folleto
JOIN servicios_diarios ON folleto.id_ruta = servicios_diarios.id_ruta";
$result = mysqli_query($conn, $sql);
echo "<br><h1>FOLLETO </h1>";
echo "<table style='border: 1px solid #000; border-collapse: collapse;'>";
echo "<tr>
        <th style='border: 1px solid #000; padding: 10px;'>ruta</th>
        <th style='border: 1px solid #000; padding: 10px;'>dias_programados</th>
      </tr>";

while ($mostrar = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td style='border: 1px solid #000; padding: 10px;'>".$mostrar['nombre_ruta']."</td>";
    echo "<td style='border: 1px solid #000; padding: 10px;'>".$mostrar['dias_programados']."</td>";
    echo "</tr>";
}

echo "</table>";
?>

<br><br>
<a href="datosCL.php?dni_viajero=<?php echo $dni_viajero; ?>" target="_blank" class="shadow-effect">BILLETE O TIKECT</a>
<br><br>

<!-- Aquí puedes agregar el resto del contenido de tu página -->
<?php
$rows = mysqli_query($conn, "SELECT * FROM tb_images");
if ($rows && mysqli_num_rows($rows) > 0) {
    while ($row = mysqli_fetch_assoc($rows)) : ?>
        <div style="margin-bottom: 20px;">
            <p><b>Descripción: </b><?php echo $row["name"]; ?></p>
            <div style="display: flex; justify-content: center;">
                <?php
                // Decodificamos el campo de imagen JSON
                $images = json_decode($row["image"]);
                if (is_array($images)) {
                    foreach ($images as $image) : ?>
                        <!-- Contenedor para centrar la imagen -->
                        <div style="text-align: center;">
                            <!-- Aquí está la imagen -->
                            <img src="uploads/<?php echo $image; ?>" width="800" style="margin-right: 10px;">
                        </div>
                    <?php endforeach;
                }
                ?>
            </div>
        </div>
    <?php endwhile;
} else {
    echo "No se encontraron imágenes.";
}
?>

<BR><BR><BR><BR><BR>

<footer>
    <div class="container">
        <div class="row">
            <div class="col" id="company">
                <img src="img/logo.png" alt="" class="logo">
                <p>Conéctate con nosotros en nuestras redes sociales y descubre destinos inolvidables</p>
                <div class="social">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="col" id="services">
                <h3>servicios</h3>
                <div class="links">
                    <a href="#">- Experiencias de Viaje Inolvidables</a>
                    <a href="#">- Líderes en la Industria Turística</a>
                    <a href="#">- Planificación Personalizada de Vacaciones</a>
                    <a href="#">- Experiencias Únicas y Memorables</a>
                </div>
            </div>
            <div class="col" id="useful-links">
                <h3>Politicas</h3>
                <div class="links">
                    <a href="#">Seguridad</a>
                    <a href="#">Integridad</a>
                    <a href="#">Transparencia</a>
                    <a href="#">Autenticidad</a>
                </div>
            </div>
            <div class="col" id="contact">
                <h3>Contacto y Ubicación</h3>
                <div class="contact-details">
                    <i class="fa fa-location"></i>
                    <p>Maicao-La Guajira <br> COLOMBIA </p>
                </div>
                <div class="contact-details">
                    <i class="fa fa-phone"></i>
                    <p>+1-8755856858</p>
                </div>
            </div>
        </div>

        <br><br><br>

        <p>&copy; 2024 <a href="http://fturisBus.com">turisBus.com</a></p>
    </div>
</footer>
</body>
</html>
