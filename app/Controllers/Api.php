<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\CustomerModel;
use App\Models\ProfessionModel;

class Api extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $customerModel = new CustomerModel();
        $lastInserted = $customerModel->orderBy('create_ad', 'DESC')->first();
    
        if ($lastInserted) {
            return $this->respond($lastInserted);
        } else {
            return $this->failNotFound('No se encontraron datos insertados');
        }
    }
    
    public function insertData()
{
    $validation = $this->validate([
        'phone' => 'required',
        'name' => 'required',
        'firstName' => 'required',
        'lastName' => 'required',
        'pkUser' => 'required',
        'profession' => 'required'
    ]);

    if (!$validation) {
        return $this->failValidationErrors($this->validator->getErrors());
    }

    $professionModel = new ProfessionModel();
    $userModel = new UserModel();
    $customerModel = new CustomerModel();
    $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

    $customer = [
        "pkPhone" => $this->request->getPost('phone'),
        "name" => $this->request->getPost('name'),
        "firstName" => $this->request->getPost('firstName'),
        "lastName" => $this->request->getPost('lastName')
    ];

    $user = [
        "pkUser" => $this->request->getPost('pkUser'),
        "fkPhone" => $this->request->getPost('phone'),
        "fKLevel" => 0,
        "fkProfession" => $this->request->getPost('profession'),
        "password" => $hashedPassword,
        "locked" => 1,
        "inSession" => 0
    ];

    if ($statusCustomer && $statusUser) {
        return $this->respond([
            'status' => 200,
            'message' => 'Data inserted successfully'
        ]);
    } else {
        return $this->respond([
            'status' => 500,
            'error' => 'Failed to insert data'
        ]);
    }
}
public function getUser($pkUser)
{
    $userModel = new UserModel();
    $user = $userModel->find($pkUser);

    if ($user) {
        return $this->respond($user);
    } else {
        return $this->failNotFound('User not found');
    }
}
public function getCustomer($pkPhone)
{
    $customerModel = new CustomerModel();
    $user = $customerModel->find($pkPhone);

    if ($user) {
        return $this->respond($user);
    } else {
        return $this->failNotFound('User not found');
    }
}
/*public function login()
{
    $phone = $this->request->getPost('phone');
    $password = $this->request->getPost('password');

    $userModel = new UserModel();
    $user = $userModel->where('fkPhone', $phone)
                      ->first();

    if ($user && password_verify($password, $user['password'])) {
        $personModel = new CustomerModel();
        $person = $personModel->where('pkPhone', $phone)
                              ->first();

        if ($person) {
            $response = [
                'name' => $person['name'],
                'firstName' => $person['firstName'],
                'lastName' => $person['lastName'] 
            ];
            return $this->respond($response);
        }
    }

    return $this->failUnauthorized('Invalid phone or password');
}*/

public function login()
{
    $phone = $this->request->getPost('phone');
    $password = $this->request->getPost('password');

    $userModel = new UserModel();
    $user = $userModel->where('fkPhone', $phone)
                      ->first();

    if ($user && password_verify($password, $user['password'])) {
        unset($user['password']); 
        return $this->respond($user);
    } else {
        return $this->failUnauthorized('Invalid phone or password');
    }
}
    
}
