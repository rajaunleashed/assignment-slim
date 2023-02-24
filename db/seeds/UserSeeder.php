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
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $user = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email'     => $faker->email
            ];
            array_push($data, $user);
        }

        $users = $this->table('users');
        $users->insert($data)
            ->saveData();
    }
}
