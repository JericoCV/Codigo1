<?php
    declare(strict_types=1);
    use App\Controladores\ControladorEstudiante;
    include_once "includes/autoload.php";
?>
<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="text" name="nombre" placeholder="Ingrese nombres"><br>
    <input type="text" name="email" placeholder="Ingrese email"><br>
    <input type="number" name="idleccion" placeholder="leccion"><br>
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(isset($_POST["submit"])){
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $idLeccion = $_POST["idleccion"];
    $controladorprof = new ControladorEstudiante();
    echo $controladorprof->guardar($nombre, $email, $idLeccion);
}
