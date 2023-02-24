<?php


use Phinx\Seed\AbstractSeed;

class TransactionSeeder extends AbstractSeed
{
    protected $faker;
    protected $table;
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
        $this->faker = Faker\Factory::create();
        $this->table = $this->table('transactions');

        for ($i = 1; $i <= 12; $i++) {
           $this->seedTransactions($i);
        }


    }

    private function seedTransactions($index = 1)
    {
        $data = [];

        for ($i = $index; $i <= 10000; $i++) {
            $random = rand(1, 100);
            $transaction = [
                'amount'      => rand(12, 57) / 10,
                'date'      => $this->faker->date('Y-m-d'),
                'user_id'   => $random,
                'location_id'   => $random,
            ];
            array_push($data, $transaction);
        }

        $this->table->insert($data)
            ->saveData();
    }
}
