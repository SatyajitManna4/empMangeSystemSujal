<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

use function PHPSTORM_META\type;

class CreateEmployeeMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'name' =>[
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'email' =>[
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => false,
                'unique' => true
            ],
            'phone' =>[
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],
            'designation' =>[
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'salary' =>[
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'access_level' =>[
                'type' => 'ENUM',
                'constraint' => ['admin', 'manager', 'employee'],
                'null' => false
            ],
            'status' =>[
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default' => 'active'
            ],
            'created_at' =>[
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
