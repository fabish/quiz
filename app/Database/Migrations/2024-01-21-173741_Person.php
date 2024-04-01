<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Person extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'pkPhone' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'person' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'firstName' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lastName' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'create_ad' => [
                'type' => 'DATETIME',
                'null'   => false,
            ],
            'update_ad' => [
                'type' => 'DATETIME',
                'null'   => true,
            ],
        ]);
        $this->forge->addKey('pkPhone', true);
        $this->forge->createTable('persons');
         
    }

    public function down()
    {
        
        $this->forge->dropTable('persons');
        
    }
}
