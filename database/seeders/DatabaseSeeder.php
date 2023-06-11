<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Driver;
use App\Models\Type;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Driver::create([
            'name' => 'Gate',
            'phone' => '',
            'carno' => ''
        ]);
        Address::create([
            'name' => 'လွိုင်လင်'
        ]);
        Address::create([
            'name' => 'ပင်လုံ'
        ]);

        Type::create([
            'name' => 'ဦး'
        ]);
    }
}
