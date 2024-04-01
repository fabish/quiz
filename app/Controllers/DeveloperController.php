<?php

namespace App\Controllers;
use App\Models\CustomerModel;

class DeveloperController extends BaseController
{
    public $session=null;
	public function __construct(){
		helper('form');
		$this->session= \Config\Services::session();
	}
    public function test(){
        return view('test');
    }
    public function table(){
        return view('tabeview');
    }
    public function form(){
        return view('formview');
    }
    public function index()
    {
        
    if ($this->session->has('user') && $this->session->has('tipo') && $this->session->get('tipo') == 4) {
        
        $developer = [
            'tittle'  => 'Vista de Developer',
        ];
        
        return view('DeveloperView', $developer);
    } else {
        
        return view('welcome_message');
    }
      /*  $developer =[
            'tittle'  => 'Vista de Developer',
        ];
        return view('DeveloperVIew', $developer);*/
    }
    public function register(){
        $customerModel = new CustomerModel();
       
        $person = [
            "pkPhone" => $_POST['pkPhone'],
            "name" => $_POST['name'],
            "firstName" => $_POST['firstName'],
            "lastName" => $_POST['lastName']
        ];

        $statusCustomer = $customerModel->insert($person);
        $personAll = $customerModel->findAll();
            //print_r($personAll);
             
        for ($i = 0; $i<count($personAll); $i++){
            $data []= [    
                    
                'pkPhone' => $personAll[$i]['pkPhone'],
                'name' => $personAll[$i]['name'],
                'firstName' => $personAll[$i]['firstName'],
                'lastName' => $personAll[$i]['lastName']
                    
            ];    
        }    
            print_r(json_encode($data));
        
    }
    public function AllData(){
        $customerModel = new CustomerModel();
        $personAll = $customerModel->findAll();
            //print_r($personAll);
             
        for ($i = 0; $i<count($personAll); $i++){
            $data []= [    
                    
                'pkPhone' => $personAll[$i]['pkPhone'],
                'name' => $personAll[$i]['name'],
                'firstName' => $personAll[$i]['firstName'],
                'lastName' => $personAll[$i]['lastName']
                    
            ];    
        }    
        print_r(json_encode($data));
        //echo json_encode($personAll);

    }    


}
