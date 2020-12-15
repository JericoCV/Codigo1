<?php
namespace App\Controladores;
include_once "includes/autoload.php";

class ControladorProgramacion
{
    public function guardar(String $inicio, String $tipo, int $idprof): void{
        $facultad = new Programacion();
        $facultad->setinicio($inicio);
        $facultad->settipo($tipo);
        $facultad->setidprof($idprof);
        $filas = $facultad->insertar();

        if($filas!=0){
            echo "Programa guardado";
        }else{
            echo "Error: Informarcion no guardada";
        }
    }
}