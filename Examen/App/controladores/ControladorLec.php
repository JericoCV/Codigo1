<?php
namespace App\Controladores;
include_once "includes/autoload.php";

class ControladorLeccion
{
    public function guardar(int $numero, string $state,int $idprog, string $comentario_profesor, string $comentario_estudiante): void{
        $facultad = new Leccion();
        $facultad->setNumero($numero);
        $facultad->setstate($state);
        $facultad->setidprog($idprog);
        $facultad->setcomentario_profesor($comentario_profesor);
        $facultad->setcomentario_estudiante($comentario_estudiante);
        $filas = $facultad->insertar();

        if($filas!=0){
            echo "guardado";
        }else{
            echo "Error: Informarcion no guardada";
        }
    }
}