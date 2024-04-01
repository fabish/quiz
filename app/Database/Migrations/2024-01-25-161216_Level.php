<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Level extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'pkLevel' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => false,
            ],
            'level' => [
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
        $this->forge->addKey('pkLevel', true);
        $this->forge->createTable('levels');
    }

    public function down()
    {
        $this->forge->dropTable('levels');
    }
}
