<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CustomerModel;

class Home extends BaseController
{
    public $session=null;
    public function __construct(){
        helper('form');
        $this->session= \Config\Services::session();
    }
    public function index()
    {
        $login =[
            'tittle' => 'Quiz UPA'
        ];
        return view('welcome_message', $login);

        /*$seeder = \Config\Database::seedar();
        $seeder->call('PersonSeeder');*/
    }

    public function validation(){
        
    }
    public function checkUser(){
        $validation = $this->validate([
            'password' => 'required|exact_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/]',
            'fkPhone'  => 'required|numeric|exact_length[10]'
        ]);
        
        if (!$validation) {
            return redirect()->to(base_url())->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $fkPhone  = $this->request->getPost('fkPhone');
        $password = $this->request->getPost('password');
        
        $userModel = new UserModel();
        $user = $userModel->where('fkPhone', $fkPhone)->first();
        
        if (empty($user)) {
            
        } elseif ($user['fkPhone'] == $fkPhone && password_verify($password, $user['password']) && $user['locked'] == 1 && $user['inSession'] == 1) {
        
            $userData = [
                'user' => $user['fkPhone'],
                'tipo' => $user['fkLevel']
            ];
        
            $this->session->set($userData);
            $vist = $this->userLevel($user);
            return redirect()->to(base_url($vist));
        } else {
            
            $this->session->setFlashdata('error', 'Credenciales no válidas. Por favor, verifica tu número de teléfono y contraseña.');
            return redirect()->to(base_url());
        }
       /* $validation = $this->validate([
            'password'=> 'required|exact_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/]',
            'fkPhone'   => 'required|numeric|exact_length[10]'
        ]);
        
        if (!$validation) {
            
            return redirect()->to(base_url())->withInput()->with('errors', $this->validator->getErrors());
        }
        
        
        $fkPhone = $this->request->getPost('fkPhone');
        $password = $this->request->getPost('password');
        
        $userModel = new UserModel();
        $user = $userModel->where('fkPhone', $fkPhone)->first();
        
        if (empty($user)) {
            
        } elseif ($user['fkPhone'] == $fkPhone && $user['password'] == $password && $user['locked'] == 1 && $user['inSession'] == 1) {
            
            $userData = [
                'user' => $user['fkPhone'],
                'tipo' => $user['fkLevel']
            ];
        
            $this->session->set($userData);
            $vist = $this->userLevel($user);
            return redirect()->to(base_url($vist));
        } else {
            $this->session->setFlashdata('error', 'Credenciales no válidas. Por favor, verifica tu número de teléfono y contraseña.');
            return redirect()->to(base_url()); 
        }*/
        
    }
    public function userLevel($user){
        $levelUser = $user['fkLevel'];
         
        switch($levelUser){
            case 1:
                echo "nivel 1";
                $vista = "type/admin";
                
                break;
            case 2: 
                echo "nivel 2";
                $vista = "type/ceo";
                break;
            case 3:
                echo "nivel 3";
                $vista = "type/customer";
                break;                
            case 4: 
                echo "nivel 4";
                $vista = "type/developer";
                break;
            case 5:
                echo "nivel 5";
                $vista = "type/ingeniero";
                break;
            case 6:
                echo "nivel 6";
                $vista = "type/supervisor";
                break;
            case 7:
                echo "nivel 7";
                $vista = "type/guest";
                break;
            case 8:
                echo "nivel 5";
                $vista = "user/view";
                break;
            default:
                echo "Level no admitido";        
        }
        return $vista;
    }
    public function viewUser(){
        echo "view user";
        echo view('ViewUser');
    }
      
}
