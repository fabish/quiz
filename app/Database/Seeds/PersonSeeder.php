<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'pkPhone'    => 7121634970,
            'person'     => 'Josue Fabian',
            'firstName'  => 'Zaragoza',
            'lastName'   => 'Suarez',
        ];
        
        // Simple Queries
        $this->db->query('INSERT INTO persons (pkPhone, person, firstName, lastName) VALUES (:pkPhone:, :person:, :firstName:, :lastName:)', $data);
        
        // Using Query Builder
        $this->db->table('persons')->insert($data);
        
    }
}
