<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'first_name'    => 'admin',
                'last_name'     => 'admin',
                'username'      => 'admin',
                'password'      => hash('sha256', 'admin123'),
                'email'         => 'admin@admin.com',
                'is_admin'      => true
            ]
        ];

        $users = $this->table('users');
        $users->insert($data)
            ->saveData();
    }
}
