<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class LevelModel extends Model
    {
        protected $table = 'levels';
        protected $primaryKey = 'pkLevel';
        protected $allowedFields = ['pkLevel', 'level'];   
    }
    
?>