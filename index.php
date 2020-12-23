<?php
session_start();
include_once "includes/autoload.php";

$request = $_SERVER['QUERY_STRING'];

switch ($request){
    case "bienvenido":
        include_once "App/vistas/bienvenido.php";
        break;
    case "crear-usuarios":
        include_once "App/vistas/uCrear.php";
        break;
    case "crear-plan-de-estudios":
        include_once "App/vistas/planCrear.php";
        break;
    case "asignar-cursos":
        include_once "App/vistas/cursosAsignar.php";
        break;
    case "login":
        include_once "App/vistas/uLogin.php";
        break;
    case "guardar-usuario":
        include_once "App/vistas/uCrear.php";
        break;
    case "validar":
        $codigo=$_POST["codigo"];
        $controladorUsuario = new ControladorUsuario();
        $controladorUsuario->validar($codigo);
        break;
    case "api/estudiantes":
        $metodo = $_SERVER["REQUEST_METHOD"];
        $controladorUsuario = new \App\Controladores\ControladorUsuario();

        if ($metodo == "GET"){
                $resultados = $controladorUsuario->mostrarEstudiantes();
                $estudiantes[] = null;
                var_dump($resultados);
                foreach ($resultados as $key => $estudiante) {
                    $estudiantes[$key] = array("nombres" => $estudiante["nombres"],
                        "apellidos" => $estudiante["apellidos"]);
                }
                echo json_encode($estudiantes);
        }

        if ($metodo == "POST") {
            $nombres = "Miguel";
            $apellidos = "Garcia";
            $codigo = 10001000;
            $password = "123456";
            $tipo = "estudiante";
            $resultado = $controladorUsuario->crearUsuario($nombres, $apellidos, $codigo, $password, $tipo);
            if($resultado == 'Guardado'){
                echo json_encode(array("codigo"=>"305","status"=>"OK"));
            }else{
                echo json_encode(array("codigo"=>"306","status"=>"Error: No guardado"));
            }
        }

        if($metodo == "PUT"){
            echo "Metodo PUT";
        }

        if ($metodo == "DELETE"){
            $data = file_get_contents("php://input");
            $data = json_decode($data, true);
            $id = $data["id"];
            $controladorUsuario = new \App\Controladores\ControladorUsuario();
            if($controladorUsuario->eliminarEstudiantes($id)!=0){

            }
        }
        break;
    default:
        include_once "App/vistas/uLogin.php";
        break;
}
// curl php get / post