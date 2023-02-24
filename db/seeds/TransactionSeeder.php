<?php


use Phinx\Seed\AbstractSeed;

class TransactionSeeder extends AbstractSeed
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

        for ($i = 1; $i <= 10000; $i++) {
            $random = rand(1, 100);
            $transaction = [
                'amount'      => rand(12, 57) / 10,
                'date'      => $faker->date('Y-m-d'),
                'user_id'   => $random,
                'location_id'   => $random,
            ];
            array_push($data, $transaction);
        }

        $transactions = $this->table('transactions');
        $transactions->insert($data)
            ->saveData();
    }
}
