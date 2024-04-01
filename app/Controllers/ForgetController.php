<?php

namespace App\Controllers;
use App\Models\UserModel;
class ForgetController extends BaseController
{
    public function index()
    {
        $forget =[
            'tittle' => 'Forget password'
        ];
        return view('ForgetView', $forget);
    }
    public function forget(){
        $userModel = new UserModel();
        $fkPhone = $_POST['fkPhone'];
        $User  = $userModel->where('fkPhone', $fkPhone)->first($fkPhone);
        $statusUser = !empty($User);    
            if($statusUser == NULL){
                echo "es nulo";
                $error = "datos agregados con exito";
                session()->setFlashdata('mensaje1', $error);
                return redirect()->to(base_url('user/forget'));
            }else if($statusUser == 1){
                $user = $User['fkPhone'];
                echo view('ViewChangePassword', compact('user', 'statusUser'));
            }
    }
    
    public function forgetPassword(){
        $fkPhone = $_POST['fkPhone'];
        $userModel = new UserModel();
        $User  = $userModel->where('fkPhone', $fkPhone)->first($fkPhone);
        $pkUser = $User['pkUser'];
        $dato = [
            "fkPhone" => $User['fkPhone'],
            "fkLevel" => $User['fkLevel'],
            "password" => $_POST['password'],
            "locked" => $User['locked'],
            "inSession" => $User['inSession']
        ];
        $statusUser = 2;
        print_r($dato);
        $userModel->update($pkUser, $dato);
        echo ($statusUser);
        $error = "datos agregados con exito";
        session()->setFlashdata('mensaje', $error);
        return redirect()->to(base_url('user/forget'));
    }
}
