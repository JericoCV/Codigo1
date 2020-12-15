<?php
namespace App\clases;

include_once "./Practica_2/includes/autoload.php";
include_once "./Practica_2/includes/ConexionBD.php";
class Profesor{
    private $id;
    private $nombre;
    private $idioma;

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getidioma()
    {
        return $this->idioma;
    }

    public function setidioma($idioma)
    {
        $this->idioma = $idioma;
    }

    public function insertar(){
        try{
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO profesor
                    VALUES(?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $stmt->bindParam(1, $this->idioma, PDO::PARAM_STR);
            $stmt->execute();
            $filas = $stmt->rowCount();

            $conexionDB->cerrarConexion();
            return $filas;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function mostrar()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM profesor";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
