<?php
namespace App\clases;

include_once "./Practica_2/includes/autoload.php";
class Estudiante{
    private $id;
    private $nombre;
    private $email;
    private $idLeccion;

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
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getidLeccion()
    {
        return $this->idLeccion;
    }

    public function setidLeccion($idLeccion)
    {
        $this->idLeccion = $idLeccion;
    }

    public function insertar(){
        try{
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO estudiante
                    VALUES(?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $stmt->bindParam(1, $this->email, PDO::PARAM_STR);
            $stmt->bindParam(1, $this->idLeccion, PDO::PARAM_INT);
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
            $sql = "SELECT * FROM estudiante";

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
