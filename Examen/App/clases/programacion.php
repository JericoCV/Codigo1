<?php
namespace App\clases;

include_once "./Practica_2/includes/autoload.php";
class Estudiante{
    private $id;
    private $inicio;
    private $tipo;
    private $idprof;

    public function getinicio()
    {
        return $this->inicio;
    }

    public function setinicio($inicio)
    {
        $this->inicio = $inicio;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function gettipo()
    {
        return $this->tipo;
    }

    public function settipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getidprof()
    {
        return $this->idprof;
    }

    public function setidprof($idprof)
    {
        $this->idprof = $idprof;
    }

    public function insertar(){
        try{
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO programacion
                    VALUES(?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->inicio, PDO::PARAM_STR);
            $stmt->bindParam(1, $this->tipo, PDO::PARAM_STR);
            $stmt->bindParam(1, $this->idprof, PDO::PARAM_INT);
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
            $sql = "SELECT * FROM programacion";

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
