<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_mahasiswa extends CI_Migration {

	public function up()
    {
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'nim' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'jurusan' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
		));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('mahasiswa');
    }

    public function down()
    {
		$this->dbforge->drop_table('mahasiswa');
    }
}