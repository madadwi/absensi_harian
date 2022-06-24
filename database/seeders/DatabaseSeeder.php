<?php

namespace Database\Seeders;

use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        for ($i=1; $i <= 5; $i++) {
            Rombel::create([
                'rombel' => 'RPL XI-' . $i
            ]);
        }

        for ($i=1; $i <= 5; $i++) {
            Rayon::create([
                'rayon' => 'Ciawi ' . $i
            ]);
        }

        $this->call(AdminSeeder::class);
    }
}
