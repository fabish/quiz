<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use App\Models\CustomerModel;
use App\Models\ProfessionModel;

class RegisterController extends BaseController
{
    public function index()
    {        
       
    $professionModel = new ProfessionModel();
    $professions = $professionModel->findAll(); 

    $register = [
        'title' => 'Registro de usuarios' 
    ];

    return view('RegisterView', ['professions' => $professions] + $register);
       
    }
    public function registerAccount(){
        $validation = $this->validate([
            'phone'           => 'trim|required|numeric|matches[confirm_phone]|exact_length[10]|is_unique[persons.pkPhone]',
            'confirm_phone'   => 'trim|required|exact_length[10]|matches[phone]',
            'name'            => 'trim|required|alpha',
            'firstName'       => 'trim|required|alpha',
            'profession'      => 'trim|required',
            'lastName'        => 'trim|required|alpha',
            'pkUser'          => 'trim|required|numeric|matches[confirm_pkUser]|exact_length[10]|is_unique[users.pkUser]',
            'confirm_pkUser'  => 'trim|required|exact_length[10]|matches[pkUser]',
            'password'        => 'trim|required|exact_length[8]|matches[confirm_password]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/]',
            'confirm_password'=> 'trim|required|exact_length[8]|matches[password]'
        ]);

        if ($this->request->getPost() && $validation) {
            $professionModel = new ProfessionModel();
            $userModel = new UserModel();
            $customerModel = new CustomerModel();
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $customer = [
                "pkPhone" => $_POST['phone'],
                "name" => $_POST['name'],
                "firstName" => $_POST['firstName'],
                "lastName" => $_POST['lastName']
            ];
            $user = [
                "pkUser" => $_POST['pkUser'],
                "fkPhone" => $this->request->getPost('phone'),
                "fKLevel" => 0,
                "fkProfession" => $_POST['profession'],
                "password" => $hashedPassword,
                "locked" => 1,
                "inSession" => 0
            ];
            
            $professions = $professionModel->findAll();
            $statusCustomer = $customerModel->insert($customer);
            $statusUser  = $userModel->insert($user);

            if ($statusCustomer && $statusUser) {
                // Si el registro es exitoso, redirige
                session()->remove('old'); // Elimina los valores anteriores de la sesión
                return redirect()->to(base_url('user/register'));
            } else {
                // Si hay algún problema en el registro, redirige con mensaje de error
                $errorMessage = "Hubo un problema al registrar el usuario.";
                return redirect()->back()->withInput()->with('error', $errorMessage);
            }
        } else {
            // Si hay errores de validación, redirige de vuelta con los errores
            session()->setFlashdata('old', $this->request->getPost()); // Almacena los valores anteriores en la sesión
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
   /* public function registerAccount(){
        $validation = $this->validate([
            'phone'           => 'trim|required|numeric|matches[confirm_phone]|exact_length[10]|is_unique[persons.pkPhone]',
            'confirm_phone'   => 'trim|required|exact_length[10]|matches[phone]',
            'name'            => 'trim|required|alpha',
            'firstName'       => 'trim|required|alpha',
            'profession'      => 'trim|required',
            'lastName'        => 'trim|required|alpha',
            'pkUser'          => 'trim|required|numeric|matches[confirm_pkUser]|exact_length[10]|is_unique[users.pkUser]',
            'confirm_pkUser'  => 'trim|required|exact_length[10]|matches[pkUser]',
            'password'        => 'trim|required|exact_length[8]|matches[confirm_password]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/]',
            'confirm_password'=> 'trim|required|exact_length[8]|matches[password]'
        ]);
        
        if ($this->request->getPost() && $validation) {
            $professionModel = new ProfessionModel();
            $userModel = new UserModel();
            $customerModel = new CustomerModel();
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $customer = [
                "pkPhone" => $_POST['phone'],
                "name" => $_POST['name'],
                "firstName" => $_POST['firstName'],
                "lastName" => $_POST['lastName']
            ];
            $user = [
                "pkUser" => $_POST['pkUser'],
                "fkPhone" => $this->request->getPost('phone'),
                "fKLevel" => 0,
                "fkProfession" => $_POST['profession'],
                "password" => $hashedPassword,
                "locked" => 1,
                "inSession" => 0
            ];
            
            $professions = $professionModel->findAll();
            $statusCustomer = $customerModel->insert($customer);
            $statusUser  = $userModel->insert($user);
            
            if ($statusCustomer && $statusUser) {
                
                session()->remove('old');
                return redirect()->to(base_url('user/register'));
            } else {
                $errorMessage = "Hubo un problema al registrar el usuario.";
                return redirect()->back()->withInput()->with('error', $errorMessage);
            }
        } else {
            
            session()->setFlashdata('old', $this->request->getPost());
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
      
    }*/

}
    
   

