<?php

namespace App\Controllers;
use App\Models\CustomerModel;

class CeoController extends BaseController
{
    public $session=null;
	public function __construct(){
		helper('form');
		$this->session= \Config\Services::session();
	}
    public function index()
    {
        $data = [
            'tittle' => 'Vista del Ceo',
            
        ];
        
        return view('CeoVIew', $data);
       /* if($this->session->has('user') 
        && $this->session->has('tipo') 
        && $this->session->get('tipo') == 1) {
            $userModel = new UserModel();
            $users = $userModel->findAll();
            
            $data = [
                'tittle' => 'Vista del Ceo',
                'users' => $users
            ];
            
            return view('CeoVIew', $data);
        } else {
            return view('welcome_message');
*/        
    }
/*public function crear(){

    $datos = [
        "pkPhone"   => $_POST['pkPhone'],
        "name"      => $_POST['name'],
        "firstName" => $_POST['firstName'],
        "lastName"  => $_POST['lastName'],
        "level"     => $_POST['level']
    ];
    $customerModel = new CustomerModel();
    $respuesta = $customerModel->insertar($datos);

    if ($respuesta > 0) {
        return redirect()->to(base_url().'admin');
    } else {
        return redirect()->to(base_url().'admin');
    }
}
public function actualizar(){
    $datos = [
        "pkPhone"   => $_POST['pkPhone'],
        "name"      => $_POST['name'],
        "firstName" => $_POST['firstName'],
        "lastName"  => $_POST['lastName'],
        "level"     => $_POST['level']
    ];
    $pkPhone = $_POST['pkPhone'];
    $customerModel = new CustomerModel();
    $respuesta = $customerModel->actualizar($datos,$pkPhone);
    if ($respuesta) {
        return redirect()->to(base_url().'admin');
    } else {
        return redirect()->to(base_url().'admin');
    }
    
}
public function obtenerUserName($pkPhone){
    $datos = ["pkPhone" => $pkPhone];
    $customerModel = new CustomerModel();
    $respuesta = $customerModel->obtenerUserName($datos);
    $datos = [
        'tittle'  => 'Vista de Edicion',
        "datos" => $respuesta
    ];
    return view('admin/Actualizar', $datos);
}
public function eliminar($pkPhone){
    $customerModel = new CustomerModel();
    $data = ["pkPhone" => $pkPhone];
    $respuesta = $customerModel->eliminar($data);

    if ($respuesta) {
        return redirect()->to(base_url().'admin');
    } else {
        return redirect()->to(base_url().'admin');
    }
}*/

}
