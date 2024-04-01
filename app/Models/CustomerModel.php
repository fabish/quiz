<?php
    namespace App\Models;
    use CodeIgniter\Model;
    

    class CustomerModel extends Model{
        protected $table = 'persons';
        protected $primaryKey = 'pkPhone';
        protected $allowedFields = ['pkPhone', 'name', 'firstName', 'lastName'];
    }
?>