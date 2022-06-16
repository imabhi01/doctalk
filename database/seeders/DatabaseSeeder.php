<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(!User::find(1)){
            User::create([
                'id' => 1,
                'name' => 'Sokil',
                'email' => 'admin@admin.com',
                'password' => bcrypt('secret'),
                'role' => 'admin'
            ]);
        }
        Product::factory(15)->create();
        User::factory(15)->create();
    }
}
