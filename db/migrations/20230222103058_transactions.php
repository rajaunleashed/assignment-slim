<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Transactions extends AbstractMigration
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
        $table = $this->table('transactions', ['signed' => true]);
        $table
            ->addColumn('transaction_hash', 'string')
            ->addColumn('amount', 'double')
            ->addColumn('date', 'datetime')
            ->addColumn('location_id', 'integer')
            ->addColumn('user_id', 'integer')
            ->addForeignKey('location_id', 'locations', 'id', ['delete'=> 'cascade', 'update'=> 'cascade'])
            ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'cascade', 'update'=> 'cascade'])
            ->addTimestamps()
            ->create();
    }
}
