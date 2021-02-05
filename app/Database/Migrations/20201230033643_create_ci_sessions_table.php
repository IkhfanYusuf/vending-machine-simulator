<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_create_ci_sessions_table extends Migration
{

	public function up()
	{
		$this->forge->addField([
			'id'         => [
				'type'       => 'int',
				'constraint' => 5,
				'unsigned'   => true,
                'auto_increment' => true,
				'null'       => false
			],
			'uname' => [
				'type'       => 'VARCHAR',
				'constraint' => 45,
				'null'       => false
			],
			'pass'  => [
				'type'       => 'VARCHAR',
				'constraint' => 150,
				'null'       => false
			],
			// 'login'  => [
			// 	'type'       => 'VARCHAR',
			// 	'constraint' => 150,
			// 	'null'       => false
			// ],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('login', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('login', true);
	}
}
