<?php

use Illuminate\Database\Seeder;

class UserProposals extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {
        $faker = Faker\Factory::create('ro_RO');
        for ($i = 1; $i <= 3; $i++) {
            $data = [
                'title' => $faker->text(35),
                'description' => $faker->realText(200),
                'user_id' => 1,
                'number_approvals' => $faker->numberBetween(10, 60)
            ];
            \App\Models\User\Proposal::query()->create($data);
        }
    }
}
