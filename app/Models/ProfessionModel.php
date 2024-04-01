<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class ProfessionModel extends Model
    {
        protected $table = 'professions';
        protected $primaryKey = 'pkProfession';
        protected $allowedFields = ['pkProfession', 'Profession'];
    }
    
?>