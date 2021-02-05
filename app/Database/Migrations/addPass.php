<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class addPass extends Migration
{

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'uname'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'pass'        => [
                                'type'           => 'VARCHAR',
                                
                        ],
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('login');
        }

        public function down()
        {
                $this->forge->dropTable('login');
        }
}