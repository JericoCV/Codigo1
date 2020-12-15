<?php
namespace App\Controladores;
include_once "includes/autoload.php";

class ControladorProfesor
{
    public function guardar(String $Nombre, String $idioma): void{
        $facultad = new Profesor();
        $facultad->setNombre($Nombre);
        $facultad->setidioma($idioma);
        $filas = $facultad->insertar();

        if($filas!=0){
            echo "Profesor guardado";
        }else{
            echo "Error: Informarcion no guardada";
        }
    }
}