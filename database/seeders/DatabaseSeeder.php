<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $this->call([
                BloodSeeder::class,
                NationalitieSeeder::class,
                religionSeeder::class,

            ]
            );

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
