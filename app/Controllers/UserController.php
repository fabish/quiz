<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CustomerModel;

class UserController extends BaseController
{
    public $session=null;
	public function __construct(){
		helper('form');
		$this->session= \Config\Services::session();
	}
    public function index()
    {
        $userModel = new UserModel();
        $customerModel = new CustomerModel();
        $datos2 = $userModel->listarNombres();
        $datos = $customerModel->listarCustomers();
        $mensaje = session('mensaje');
        $user =[
            'tittle' => 'Vista de Usuarios',
            'datos'  => $datos2,
            'mensaje'=> $mensaje
        ];
        return view('user/UserView', $user);
    }
    public function crear(){

        $data = [
            "username"   => $_POST['username'],
            "fkPhone"    => $_POST['fkPhone'],
            "fkLevel"    => $_POST['fkLevel'],
            "password"   => $_POST['password'],
            "locked"     => $_POST['locked'],
            "inSession"  => $_POST['inSession'],
            "Salario"    => $_POST['Salario']
        ];
        $userModel = new UserModel();
        $respuesta = $userModel->insertar($data);
    
        if ($respuesta>0) {
            return redirect()->to(base_url().'user')->with('mensaje', '1');
        }else {
            return redirect()->to(base_url().'user')->with('mensaje', '0');
        }
    }
    public function actualizar(){
        
    }
    public function obtenerUserName($username){
    
    }
    public function eliminar($username){
    
    }
}
