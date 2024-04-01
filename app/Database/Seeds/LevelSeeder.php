<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LevelSeeder extends Seeder
{
    public function run()
    {
        $data = [
            
                'pkLevel'   => '3',
                'level'     => 'ingeniero',
            
        ];
        
        // Simple Queries
        $this->db->query('INSERT INTO levels (pkLevel, level) VALUES (:pkLevel:, :level:)', $data);
        
        // Using Query Builder
        $this->db->table('levels')->insert($data);
    }
}
