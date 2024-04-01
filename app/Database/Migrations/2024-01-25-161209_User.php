<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'pkUser' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'fkPhone' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'fkLevel' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'fkProfession' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'locked' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'inSession' => [
                'type' => 'INT',
                'constraint' => 11,
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
        $this->forge->addKey('pkUser', true);
        $this->forge->addForeignKey('fkPhone', 'persons', 'pkPhone', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('fkLevel', 'levels', 'pkLevel', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('fkProfession', 'professions', 'pkProfession', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('users');  
        $this->db->enableForeignKeyChecks(); 
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
