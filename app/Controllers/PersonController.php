<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\PersonModel;
use App\Models\UserModel;

class PersonController extends BaseController
{
    
    public function index()
    {
        $personModel = new PersonModel();
        $datos = $personModel->listarCustomers();

        $admin =[
            'tittle'  => 'Vista de Admin',
            "datos"   => $datos
        ];
        return view('AdminVIewPerson', $admin);
        
    }
   
public function crear(){

    $datos = [
        "pkPhone"   => $_POST['pkPhone'],
        "name"      => $_POST['name'],
        "firstName" => $_POST['firstName'],
        "lastName"  => $_POST['lastName']
        
    ];
    $personModel = new PersonModel();
    $respuesta = $personModel->insertar($datos);

    if ($respuesta > 0) {
        return redirect()->to(base_url('type/person'));
    } else {
        return redirect()->to(base_url('type/person'));
    }
}
public function actualizar(){
    $datos = [
        "pkPhone"   => $_POST['pkPhone'],
        "name"      => $_POST['name'],
        "firstName" => $_POST['firstName'],
        "lastName"  => $_POST['lastName']
    ];
    $pkPhone = $_POST['pkPhone'];
    $personModel = new PersonModel();
    $respuesta = $personModel->actualizar($datos,$pkPhone);
    if ($respuesta) {
        return redirect()->to(base_url('type/person'));
    } else {
        return redirect()->to(base_url('type/person'));
    }
    
}
public function obtenerUserName($pkPhone){
    $datos = ["pkPhone" => $pkPhone];
    $personModel = new PersonModel();
    $respuesta = $personModel->obtenerUserName($datos);
    $datos = [
        'tittle'  => 'Vista de Edicion de Person',
        "datos" => $respuesta
    ];
    return view('ActualizarPerson', $datos);
}
public function eliminar($pkPhone){
    $personModel = new PersonModel();
    $data = ["pkPhone" => $pkPhone];
    $respuesta = $personModel->eliminar($data);

    if ($respuesta) {
        return redirect()->to(base_url('type/person'));
    } else {
        return redirect()->to(base_url('type/person'));
    }
}

}
