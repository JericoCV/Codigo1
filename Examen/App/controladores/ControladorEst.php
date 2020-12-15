<?php
namespace App\Controladores;
include_once "includes/autoload.php";

class ControladorEstudiante
{
    public function guardar(string $nombre, string $email,int $idLeccion): void{
        $facultad = new Estudiante();
        $facultad->setNombre($nombre);
        $facultad->setEmail($email);
        $facultad->setidLeccion($idLeccion);
        $filas = $facultad->insertar();

        if($filas!=0){
            echo "guardado";
        }else{
            echo "Error: Informarcion no guardada";
        }
    }
}