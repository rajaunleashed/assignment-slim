<?php

use Phinx\Migration\AbstractMigration;

final class Users extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('users', ['signed' => true]);
        $table
            ->addColumn('first_name', 'string', ['limit' => 30])
            ->addColumn('last_name', 'string', ['limit' => 30])
            ->addColumn('username', 'string', ['limit' => 40])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('password', 'string')
            ->addColumn('dob', 'string')
            ->addColumn('is_admin', 'boolean', ['default' => false])
            ->addIndex(['username', 'email'], ['unique' => true])
            ->addTimestamps()
            ->create();

    }
}
