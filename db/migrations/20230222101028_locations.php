<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Locations extends AbstractMigration
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
        $table = $this->table('locations', ['signed' => true]);
        $table
            ->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('city', 'string', ['limit' => 30])
            ->addColumn('state', 'string', ['limit' => 40])
            ->addColumn('zip', 'string', ['limit' => 100])
            ->addColumn('country', 'string')
            ->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'cascade', 'update'=> 'NO ACTION'])
            ->addTimestamps()
            ->create();
    }
}
