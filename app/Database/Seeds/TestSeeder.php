<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        $this->call('LevelSeeder');
        //$this->call('PersonSeeder');
        //$this->call('JobSeeder');
    }
}
