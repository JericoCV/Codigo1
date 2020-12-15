<?php
    declare(strict_types=1);
    use App\Controladores\ControladorProfesor;
    include_once "includes/autoload.php";
?>
<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="text" name="nombre" placeholder="Ingrese nombres"><br>
    <input type="text" name="idioma" placeholder="Ingrese idioma"><br>
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(isset($_POST["submit"])){
    $nombre = $_POST["nombre"];
    $idioma = $_POST["idioma"];

    $controladorprof = new ControladorProfesor();
    echo $controladorprof->guardar($nombre, $idioma);
}
