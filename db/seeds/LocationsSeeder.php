<?php


use Phinx\Seed\AbstractSeed;

class LocationsSeeder extends AbstractSeed
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
            $location = [
                'name'      => $faker->streetName,
                'city'      => $faker->city,
                'state'     => $faker->state,
                'zip'       => $faker->postcode,
                'country'   => $faker->country,
                'user_id'   => $i + 1
            ];
            array_push($data, $location);
        }

        $locations = $this->table('locations');
        $locations->insert($data)
            ->saveData();
    }
}
