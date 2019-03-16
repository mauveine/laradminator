<?php


use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ro_RO');


        for ($i = 1; $i <= 1 ; $i++) {
            $data = [
                'name' => 'Leonard Test',
                'email' => 'leonard+laradmin@cloud-us.eu',
                'password' => 'qwert1',
                'role'     => 0,
                'bio'      => $faker->realText(),
                'mobile_phone' => $faker->phoneNumber
            ];
            $user = \App\Models\User::query()->create($data);
            $userAddress = \App\Models\User\Address::query()->create([
                'user_id' => $user->id,
                'is_default' => true,
                'telephone' => $faker->phoneNumber
            ]);
        }

    }
}
