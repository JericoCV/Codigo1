<?php
namespace App\Clases;
use Includes\ConexionBD as Conexion;
include_once "includes/autoload.php";

class Usuario{
    private $id;
    private $nombres;
    private $apellidos;
    private $codigo;
    private $password;
    private $tipo;
    private $id_pa;

    public function mostrarPorCodigo($codigo)
    {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM usuarios WHERE codigo=$codigo";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            //$resultado = $stmt->fetchAll();

            $conexionDB->cerrarConexion();
            return $stmt;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insertar(int $codigo, String $password, String $tipo, int $id_pa,String $nombres, String $apellidos){
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO usuarios(codigo, pass, tipo, id_pa, nombres, apellidos)
                    VALUES(?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $codigo, \PDO::PARAM_INT);
            $stmt->bindParam(2, $password, \PDO::PARAM_STR);
            $stmt->bindParam(3, $tipo, \PDO::PARAM_STR);
            $stmt->bindParam(4, $id_pa, \PDO::PARAM_INT);
            $stmt->bindParam(5, $nombres, \PDO::PARAM_STR);
            $stmt->bindParam(6, $apellidos, \PDO::PARAM_STR);
            $stmt->execute();
            $filas = $stmt->rowCount();

            $conexionDB->cerrarConexion();
            return $filas;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function mostrarEstudiante(){
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM usuarios WHERE tipo='estudiante'";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            //$resultado = $stmt->fetchAll();

            $conexionDB->cerrarConexion();
            return $stmt;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function eliminarEstudiante(){
        try {
            $conexionDB = new Conexion($id);
            $conn = $conexionDB->abrirConexion();
            $sql = "DELETE FROM usuarios WHERE id=$id";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            //$resultado = $stmt->fetchAll();

            $conexionDB->cerrarConexion();
            return $stmt;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getIdPa()
    {
        return $this->id_pa;
    }

    /**
     * @param mixed $id_pa
     */
    public function setIdPa($id_pa): void
    {
        $this->id_pa = $id_pa;
    }

}
