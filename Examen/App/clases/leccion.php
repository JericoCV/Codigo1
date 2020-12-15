<?php
namespace App\clases;

include_once "./Practica_2/includes/autoload.php";
class Leccion{
    private $id;
    private $numero; 
    private $state;
    private $idprog; 
    private $comentario_profesor;
    private $comentario_estudiante;

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getstate()
    {
        return $this->state;
    }

    public function setstate($state)
    {
        $this->state = $state;
    }

    public function getidprog()
    {
        return $this->idprog;
    }

    public function setidprog($idprog)
    {
        $this->idprog = $idprog;
    }
    
    public function getcomentario_estudiante()
    {
        return $this->comentario_estudiante;
    }

    public function setcomentario_estudiante($comentario_estudiante)
    {
        $this->comentario_estudiante = $comentario_estudiante;
    }

    public function getcomentario_profesor()
    {
        return $this->comentario_profesor;
    }

    public function setcomentario_profesor($comentario_profesor)
    {
        $this->icomentario_profesor = $comentario_profesor;
    }

    public function insertar(){
        try{
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO leccion
                    VALUES(?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->numero, PDO::PARAM_INT);
            $stmt->bindParam(1, $this->state, PDO::PARAM_STR);
            $stmt->bindParam(1, $this->idprog, PDO::PARAM_INT);
            $stmt->bindParam(1, $this->comentario_profesor, PDO::PARAM_STR);
            $stmt->bindParam(1, $this->comentario_estudiante, PDO::PARAM_STR);
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
            $sql = "SELECT * FROM leccion";

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
