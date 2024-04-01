<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prossions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pkProfession' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => false,
            ],
            'Profession' => [
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
        $this->forge->addKey('pkProfession', true);
        $this->forge->createTable('professions');
    }

    public function down()
    {
        $this->forge->dropTable('professions');
    }
}
